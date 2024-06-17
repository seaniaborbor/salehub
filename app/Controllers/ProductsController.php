<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

use \App\Models\ProductsModel;
use \App\Models\CategoryModel;

class ProductsController extends BaseController
{
    public function __construct() {
       helper(['form', 'text']);
    }

    // view and add product from the admin side 
    public function index()
    {
        // initialize data 
        $data = [];

        $product_db = new ProductsModel();
        $category_db = new CategoryModel();

        $data = [
            'all_products' => $product_db->table('products_table')
                ->select('*')
                ->join('categories', 'categories.categoryId = products_table.prodCategory')
                ->orderBy('products_table.prodId', 'desc')
                ->paginate(10),
            'pager' => $product_db->pager
        ];
        

        // all categories 
        $data['categories'] = $category_db->findAll();
        $data['total_products'] = count($product_db->findAll());


        // set the validation rules 
        $validationRules = [
            'prodName' => [
                'rules' => 'required',
                'error' => 'Please enter a product name.'
            ],
            'prodCategory' => [
                'rules' => 'required',
                'error' => 'Please select a product category.'
            ],
            'prodPrice' => [
                'rules' => 'required|numeric',
                'error' => [
                    'required' => 'Please enter the product price.',
                    'numeric' => 'The product price must be a numeric value.'
                ]
            ],
            'prodCurrency' => [
                'rules' => 'required',
                'error' => [
                    'required' => 'Product currency is a must'
                ]
            ],
            'prodPic' => [
                'rules' => 'uploaded[prodPic]|mime_in[prodPic,image/jpg,image/jpeg,image/png]|max_size[prodPic,2048]',
                'errors' => [
                    'uploaded' => 'Please upload a product picture.',
                    'mime_in' => 'Please upload an image file of type: jpg, jpeg, or png.',
                    'max_size' => 'The product picture size should not exceed 2MB.',
                ]
            ],
            'prodAvailabilityStatus' => [
                'rules' => 'required|in_list[Available,Finished, In-Route]',
                'error' => 'Please select the product availability status.'
            ],
            'prodQty' => [
                'rules' => 'required|numeric',
                'error' => [
                    'required' => 'Please enter the product quantity.',
                    'numeric' => 'The product quantity must be a numeric value.'
                ]
                ],
            'prodSize' => [
                    'rules' => 'required',
                    'error' => [
                        'required' => 'Please enter the product size',
                    ]
                ]
        ];


        //if the request method is post 
        if($this->request->getMethod() == "post"){
            //check if validation is success 
            if($this->validate($validationRules)){

                // Handle file upload
                $prodPic = $this->request->getFile('prodPic');
                $newName = $prodPic->getRandomName();
                //if the product image is uploaded
                if($prodPic->move('public_asset/products/', $newName)){
                    // process the data
                    $productData['prodName'] = $this->request->getPost('prodName');
                    $productData['prodCategory'] = $this->request->getPost('prodCategory');
                    $productData['prodPrice'] = $this->request->getPost('prodPrice');
                    $productData['prodPic'] = $newName;
                    $productData['prodAvailabilityStatus'] = $this->request->getPost('prodAvailabilityStatus');
                    $productData['prodCurrency'] = $this->request->getPost('prodCurrency');
                    $productData['prodQty'] = $this->request->getPost('prodQty');
                    $productData['prodSize'] = $this->request->getPost('prodSize');
                    
                  
                    // save the data in the db 
                    if($product_db->save($productData)){
                       return redirect()->back()->with("success", "You successfully save a product in the database");
                    }else{
                        return redirect()->back()->with('error', "there was an error in the product in the database");
                    }

                }else{
                    // if file upload failed 
                    return redirect()->back()->with("error", "Product failed to upload, try again");
                }

            }else{
                // if validation fails 
                $data['validation'] = $this->validator;
                
            }
        }


        return view("admin/products.php", $data);
    }

    public function edit_product($product_id) {
        // Initialize data
        $data = [];
    
        $product_db = new ProductsModel();
        $category_db = new CategoryModel();
    
        // Fetch product data for editing
        $data['product_to_edit'] = $product_db->table('products_table')
            ->select('*')
            ->join('categories', 'categories.categoryId = products_table.prodCategory')
            ->where('products_table.prodId', $product_id)
            ->get()
            ->getResult();
    
        // Fetch all categories
        $data['categories'] = $category_db->findAll();
        $data['total_products'] = count($product_db->findAll());
    
        // Set the validation rules
        $validationRules = [
            'prodName' => 'required',
            'prodCategory' => 'required',
            'prodPrice' => 'required|numeric',
            'prodCurrency' => 'required',
            'prodAvailabilityStatus' => 'required|in_list[Available,Finished,In-Route]',
            'prodQty' => 'required|numeric',
            'prodSize' => 'required|numeric'
        ];
    
        // Check if the request method is POST
        if ($this->request->getMethod() == 'post') {
            // Check if a product image is being uploaded
            if ($this->request->getFile('prodPic') && $this->request->getFile('prodPic')->isValid()) {
                $validationRules['prodPic'] = 'uploaded[prodPic]|mime_in[prodPic,image/jpg,image/jpeg,image/png]|max_size[prodPic,2048]';
            }
    
            // Validate the input
            if ($this->validate($validationRules)) {
                // Process the form data
                $dataToUpdate = [
                    'prodName' => $this->request->getPost('prodName'),
                    'prodCategory' => $this->request->getPost('prodCategory'),
                    'prodPrice' => $this->request->getPost('prodPrice'),
                    'prodAvailabilityStatus' => $this->request->getPost('prodAvailabilityStatus'),
                    'prodCurrency' => $this->request->getPost('prodCurrency'),
                    'prodQty' => $this->request->getPost('prodQty'),
                    'prodSize' => $this->request->getPost('prodSize')
                ];
    
                // Handle product image upload
                if ($this->request->getFile('prodPic')) {
                    $prodPic = $this->request->getFile('prodPic');
                    $newName = $prodPic->getRandomName();
                    $dataToUpdate['prodPic'] = $newName;
    
                    // Move the uploaded file to the destination folder
                    if (!$prodPic->move('public_asset/products/', $newName)) {
                        return redirect()->back()->with("error", "Failed to upload product image. Please try again.");
                    }
                }
    
                // Update the product data in the database
                if ($product_db->update($product_id, $dataToUpdate)) {
                    return redirect()->to('/dashboard/products')->with("success", "Product updated successfully.");
                } else {
                    return redirect()->back()->with('error', "Failed to update product in the database.");
                }
            } else {
                // If validation fails
                $data['validation'] = $this->validator;
            }
        }
    
        // Render the edit view
        return view('admin/edit_product', $data);
    }

// delete a product from a the database
    public function delete_product($product_id){
        $product_db = new ProductsModel();
        if($product_db->delete($product_id)){
            return redirect()->to('/dashboard/products')->with('success', "You successfully deleted a product from the database");
        }else{
            return redirect()->to('/dashboard/products')->with('error', "Error in deleting a product from the database");
        }
    }
    
}
