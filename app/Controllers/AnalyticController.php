<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

use \App\Models\ProductsModel;
use \App\Models\CategoryModel;
use \App\Models\SaleModel;
use \App\Models\OrderModel;
use \App\Models\CustomerModel;



class AnalyticController extends BaseController
{
    public function index()
    {
        $data = [];

        $data['view_to_render'] = 'common/analytic_form.php';
        
        $sale_db = new SaleModel();
        $CustomerModel = new CustomerModel();
        $product_db = new ProductsModel();
        $order_db = new OrderModel();
        

        // validation rules for the save sale log 
        $rules = [
            'start_date' => [
                'rules' => "required",
                'label' => "Starting Date",
                'errors' => [
                    'required' => 'Please provide the date which you begin your query',
                ]
            ],
            'end_date' => [
                'rules' => "required",
                'label' => "End Date ",
                'errors' => [
                    'required' => 'Enter the date which you want your repot to stop',
                ]
            ],
        ];

        if($this->request->getMethod() == "post"){

            if(!$this->validate($rules)){
                $data['_validation'] = $this->validation();
            }else{

                // get all the products 
                $start_date = $this->request->getPost('start_date');
                $end_date = $this->request->getPost('end_date');

                // Convert the dates to the correct format (timestamp)
                    $start_date = date('Y-m-d H:i:s', strtotime($start_date));
                    $end_date = date('Y-m-d H:i:s', strtotime($end_date));

                //get all the sales 
                $data['all_sales']  = $sale_db->table('sale_table')
                                            ->select('*')
                                            ->join('products_table', 'products_table.prodId = sale_table._product')
                                            ->where("sale_table.loggedDate >=", $start_date)
                                            ->where("sale_table.loggedDate <=", $end_date)
                                            ->get()
                                            ->getResult();
                
                $data['ld_sale'] = $sale_db->selectSum('_amount')->where('_currency', "LRD")
                                                                ->where("loggedDate >=", $start_date)
                                                                ->where("loggedDate <=", $end_date)
                                                                ->get()->getResult();

                $data['usd_sale'] = $sale_db->selectSum('_amount')->where('_currency', "USD")
                                                                ->where("loggedDate >=", $start_date)
                                                                ->where("loggedDate <=", $end_date)
                                                                ->get()->getResult();
                
                $data['order_log'] = $CustomerModel->table('customer_table')
                                                ->select('customer_table.*, COUNT(order.orderCode) as total_ordered')
                                                ->join('order', 'order.orderCode = customer_table.orderCode')
                                                ->join('delivery_regions', 'customer_table.deliveryRegion = delivery_regions.regionName')
                                                ->where("customer_table.orderDate >=", $start_date)
                                                ->where("customer_table.orderDate <=", $end_date)
                                                ->groupBy('customer_table.orderCode')
                                                ->get()
                                                ->getResult();
            
            $data['view_to_render'] = 'common/analytic_view.php';

            }
        }

        

        return view("admin/analytics", $data);
    }


   
}
