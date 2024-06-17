<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

use \App\Models\ProductsModel;
use \App\Models\CategoryModel;
use \App\Models\SaleModel;
use \App\Models\OrderModel;
use \App\Models\CustomerModel;
use \App\Models\DeliveryModel;



class DashboardController extends BaseController
{
    public function index()
    {
        $data = [];
        
        $sale_db = new SaleModel();
        $order_db = new CustomerModel();
        $product_db = new ProductsModel();
        $order_db = new OrderModel();
        
        
        // get all the products 
        $data['products'] = $product_db->findAll();
        //get all orders
        $data['SaleModel'] = $order_db->findAll();
    

        //get all the sales 
        $data['all_sales']  = $sale_db->table('sale_table')
                                    ->select('*')
                                    ->join('products_table', 'products_table.prodId = sale_table._product')
                                    ->get()
                                    ->getResult();
        
        $data['ld_sale'] = $sale_db->selectSum('_amount')->where('_currency', "LRD")->get()->getResult();
        $data['usd_sale'] = $sale_db->selectSum('_amount')->where('_currency', "USD")->get()->getResult();

        // validation rules for the save sale log 
        $rules = [
            '_product' => [
                'rules' => "required",
                'label' => "Product Name",
                'errors' => [
                    'required' => 'Provide the name of the product you sold',
                ]
            ],
            '_quantity' => [
                'rules' => "required",
                'label' => "Quantity of goods ",
                'errors' => [
                    'required' => 'The quantity of goods is required',
                ]
            ],
            '_amount' => [
                'rules' => "required",
                'label' => "Amount",
                'errors' => [
                    'required' => 'The amount received for the goods '
                ]
            ],
            '_currency' => [
                'rules' => "required",
                'label' => "Currency",
                'errors' => [
                    'required' => 'Please provide the currency',
                ]
            ],
        ];

        if($this->request->getMethod() == "post"){

            if(!$this->validate($rules)){
                $data['_validation'] = $this->validation();
            }else{

                //this  done 
                $recordData = [];
                $recordData['_product'] = $this->request->getPost('_product');
                $recordData['_quantity'] = $this->request->getPost('_quantity');
                $recordData['_amount'] = $this->request->getPost('_amount');
                $recordData['_currency'] = $this->request->getPost('_currency');
               // $sale_db->save($recordData);
                if($sale_db->save($recordData)){
                    return redirect()->to('/dashboard')->with("success", "You successfully save a sale record in the database");
                }else{
                    return redirect()->to('/dashboard')->with("error", "Error occured while saving a sale record in the database");
                }

            }
        }

        return view('admin/index', $data);
    }


    public function delete_a_sale($sale_id){
        $sale_db = new SaleModel();
        
        if(!empty($sale_db->find($sale_id)) && $sale_db->delete($sale_id)){
            return redirect()->back()->with('success', "You deleted a sale log successfully");
        }else{
            return redirect()->back()->with('error', "Error occured while deleting a sale record");
        }
    }


   
}
