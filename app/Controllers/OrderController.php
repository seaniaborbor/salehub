<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

use \App\Models\ProductsModel;
use \App\Models\CategoryModel; 
use \App\Models\DeliveryRegions; 
use \App\Models\OrderModel; 
use \App\Models\CustomerModel; 
use \App\Models\UserModel;
use \App\Models\DeliveryModel;

class OrderController extends BaseController
{
    public function __construct()
    {
        helper(['form', 'url', 'text']);
    }

    // this will load all the orders in the admin dashboard 
    public function index()
    {
      
      $CustomerModel = new CustomerModel();
      $OrderModel = new OrderModel();
      $DeliveryRegions = new DeliveryRegions();

      $data = [];

      $data['order_log'] = $CustomerModel->table('customer_table')
                        ->select('customer_table.*, COUNT(order.orderCode) as total_ordered')
                        ->join('order', 'order.orderCode = customer_table.orderCode')
                        ->join('delivery_regions', 'customer_table.deliveryRegion = delivery_regions.regionName')
                        ->groupBy('customer_table.orderCode')
                        ->get()
                        ->getResult();
    
    $data['unview_orders'] = count($CustomerModel->where('viewStatus', 0)->findAll());
        
   
      return view('admin/orders', $data);
    }

    public function mark_as_delivered($ordered_code) {
        $delivery_db = new DeliveryModel();
    
        // Fetch the specific order by order_code
        $order = $delivery_db->where('order_code', $ordered_code)->get()->getRow();
    
        // Check if the order exists
        if (!$order) {
           return redirect()->back()->with('error', 'Order not found');
        }
    

        // Data to update
        $data_to_update = [
            'isDeliver' => 1, // Assuming you have a 'status' column in your table
            // Add other fields you want to update
            'deliveryDate' => date('Y-m-d'),
        ];
    
        // Update the order
        if ($delivery_db->where('order_code', $ordered_code)->set($data_to_update)->update()) {
            return redirect()->back()->with("error", "Your finally reported to the admin that you have delivered and receive payment successfully");
        } else {
            return redirect()->back()->with("error", "there was an error while tryna submit a delivery. ");
        }
    }
    

// Load order details
public function view_order_detail($orderCode)
{
    $CustomerModel = new CustomerModel();
    $OrderModel = new OrderModel();
    $DeliveryRegions = new DeliveryRegions();
    $user_db = new UserModel();
    $delivery_db = new DeliveryModel();
    
    $data = [];
    $data['assigned_for_delivery'] = false; // this will be used to either display or not delete button

    // Fetch the specific order by order_code
    $order = $delivery_db->where('order_code', $orderCode)->get()->getRow();
    // Check if the order exists
    if ($order) {
        $data['assigned_for_delivery'] = true;
     }




    $data['agents'] = $user_db->where("userRole", "agent")->get()->getResult();

    $data['products_ordered'] = $OrderModel->table('order')
        ->select('order.*, products_table.*,  COUNT(order.orderCode) as total_ordered')
        ->join('products_table', 'products_table.prodId = order.productId')
        ->where('order.orderCode', $orderCode)
        ->groupBy('order.productId')
        ->get()
        ->getResult();

    $customer_profile = $CustomerModel->table('customer_table')
        ->join('delivery_regions', 'customer_table.deliveryRegion = delivery_regions.regionName')
        ->where('customer_table.orderCode', $orderCode)
        ->get()
        ->getResult();

    if (!empty($customer_profile)) {
        $customer_profile[0]->viewStatus = 1; // Update viewStatus
        $customer_id = $customer_profile[0]->id; // Get customer ID

        // Execute update operation
        if ($CustomerModel->update($customer_id, (array)$customer_profile[0])) {
           
        } else {
            echo "Fail to mark this order as view, contact the developer";
            exit();
        }
    } else {
        echo "Customer profile not found.";
        exit();
    }

    $data['customer_profile'] = $customer_profile;

    // Return order details
    return view('admin/order_detail_view', $data);
}


    
    
    public function add_to_cart($productId)
    {
        $location_db = new DeliveryRegions();
        $data['delivery_location'] = $location_db->findAll();
        
        // Start session if not started already
        if (!session()->has('cart')) {
            session()->set('cart', []);
        }

        // Fetch the product
        $product_db = new ProductsModel();
        $product = $product_db->find($productId);

        // Check if the product exists and if the productId is numeric
        if ($product && is_numeric($productId)) {
            // Get the cart from session
            $cart = session()->get('cart');

            // Check if the product is already in the cart
            if (isset($cart[$productId])) {
                // Increase the quantity of the existing product in the cart
                $cart[$productId]['quantity'] += 1;
            } else {
                // Add the product to the cart with a default quantity of 1
                $cart[$productId] = [
                    'id' => $product['prodId'],
                    'name' => $product['prodName'],
                    'unitPrice' => $product['prodPrice'],
                    'currency' => $product['prodCurrency'],
                    'quantity' => 1
                ];
            }

            // Save the updated cart back to session
            session()->set('cart', $cart);
          
        } else {
            // Product does not exist or invalid productId
           return redirect()->to('/view_cart')->with('error', "Product no longer exists in our store, try again");
           exit();
        }
           return redirect()->to('/view_cart')->with('success', "Your product has been added sucessfully");
           exit();
    }

    // view what's in the cart
    public function view_cart(){
        $data = [];

        $location_db = new DeliveryRegions();
        $data['delivery_location'] = $location_db->findAll();

        // page metada 
        $data['page_description'] = "Welcome to the online store"; // page metadata description
        $data['page_title'] = "title.com";
        $data['feature_img'] = "someImg_path";
        $data['page_keywords'] = "purcasing";
        
        

        return view('public/cart', $data);
    }


    public function save_order(){

        $location_db = new DeliveryRegions();
        $customer_db = new CustomerModel();
        $data['delivery_location'] = $location_db->findAll();

        $shopping_cart_to_submit = [];
        
        // check if the cart session is not empty 
        if (session()->has('cart')) {
            $shopping_cart_to_submit = session()->get('cart');
        }else{
            return redirect()->back()->with("error", "Your cart is empty, please add a product and proceed");
            exit();
        }

        $validationRule = [
            'fullName' => [
                'rules' => 'required',
                'error' => 'Provide your name, please'
            ],
            'phoneNo' => [
                'rules' => 'required',
                'error' => 'Provide your phone number'
            ],
            // 'emailAddress' => [
            //     'rules' => 'required',
            //     'error' => 'Email is a must'
            // ],
            'deliveryRegion' => [
                'rules' => 'required',
                'error' => 'We only deliver in one of the regions above, please indicate which one'
            ],
            'deliveryAddress' => [
                'rules' => 'required',
                'error' => 'Provide full address such as community, street, or house number'
            ],
        ];

        if($this->request->getMethod() == "post"){

            if($this->validate($validationRule)){

                // initiate the order modal 
                $order_db = new OrderModel();

                // generate a unique order code 
                $order_code = random_string('alnum', 10);

                $cart_error = false;

                // loop through the cart items and save the products 
                foreach($shopping_cart_to_submit as $crtItem){
                    $product = [];
                    $product['productId'] = $crtItem['id'];
                    $product['productQuantity'] = $crtItem['quantity'];
                    $product['orderCode'] = $order_code;
                    if(!$order_db->insert($product)){
                        $cart_error = true;
                    }
                }

                $customerData['fullName'] = $this->request->getPost('fullName');
                $customerData['phoneNo'] = $this->request->getPost('phoneNo');
                $customerData['deliveryRegion'] = $this->request->getPost('deliveryRegion');
                $customerData['deliveryAddress'] = $this->request->getPost('deliveryAddress');
                $customerData['costLd'] = $this->request->getPost('costLd');
                $customerData['costUsd'] = $this->request->getPost('costUsd');
                $customerData['orderCode'] =  $order_code;
                // now save the delivery address 
                if(!$cart_error && $customer_db->save($customerData)){
                    session()->remove('cart');
                    return redirect()->to('/products')->with("success", "Your order was placed successfully");
                    exit();
                }else{
                    return redirect()->back()->with("error", "Error occured while saving your products");
                }
                
                echo "validation passed successfully";
                exit();

            }else{
                $data['validation'] = $this->validator;
            }

        }else{
            return redirect()->back()->with('error', 'Error try again');
            exit();
        }
        
        // page metada 
        $data['page_description'] = "Welcome to the online store"; // page metadata description
        $data['page_title'] = "title.com";
        $data['feature_img'] = "someImg_path";
        $data['page_keywords'] = "purcasing";
        
        $data['delivery_location'] = $location_db->findAll();

        return view('public/cart', $data);


    }


    public function empty_cart(){

        if(session()->has("cart")){

            session()->remove('cart');
            return redirect()->back()->with('success', "you emptied your shopping cart");
            
        }else{
            return redirect()->back()->with('error', "you had nothing in your cart");
        }
    }

    public function drop_order($order_code){

        $CustomerModel = new CustomerModel();
        $OrderModel = new OrderModel();
        $DeliveryRegions = new DeliveryRegions();

        if($CustomerModel->where('orderCode', $order_code)->delete() && $OrderModel->where('orderCode', $order_code)->delete()){
            return redirect()->to('/dashboard/orders/')->with('success', 'Order deleted successfully');
        }else{
            return redirect()->to('/dashboard/orders/')->with('error', 'Order failed to  deleted ');
        }


    }

}
