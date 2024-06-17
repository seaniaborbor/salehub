<?php

namespace App\Controllers;

use \App\Models\ProductsModel;
use \App\Models\CategoryModel;
use \App\Models\DeliveryRegions;

class Home extends BaseController
{
    public function index()
    {
    $product_db = new ProductsModel();
    $category_db = new CategoryModel();
    $location_db = new DeliveryRegions();
    $data['delivery_location'] = $location_db->findAll();

    // this query all the products that are available in the store 
    $data['all_products'] = $product_db->table('products_table')
                            ->select('*')
                            ->join('categories', 'categories.categoryId = products_table.prodCategory')
                            ->where('products_table.prodAvailabilityStatus', 'Available')
                            ->orderBy('products_table.prodId', 'desc')
                            ->limit(9)
                            ->get()
                            ->getResult();

    // this query gets all the products which are in routes 
    $data['pre_order_products'] = $product_db->table('products_table')
                            ->select('*')
                            ->join('categories', 'categories.categoryId = products_table.prodCategory')
                            ->where('products_table.prodAvailabilityStatus', 'In-Route')
                            ->orderBy('products_table.prodId', 'desc')
                            ->limit(6)
                            ->get()
                            ->getResult();

    // page metada 
    $data['page_description'] = "We sell the latest fashions rainging from footwar, juries, outfits and many more in monrovia."; // page metadata description
    $data['page_title'] = "candyonlinefashionstore.com";
    $data['feature_img'] = "/public_asset/images/logo.png";
    $data['page_keywords'] = "fashion, slippers, sneakers, watches, candy online store, shop, orders, store";

    return view('public/index', $data);

}

public function products(){

        $data = [];

        $product_db = new ProductsModel();
        $category_db = new CategoryModel();
    $location_db = new DeliveryRegions();



        $data = [
            'all_products' => $product_db->table('products_table')
                ->select('*')
                ->join('categories', 'categories.categoryId = products_table.prodCategory')
                ->orderBy('products_table.prodId', 'desc')
                ->paginate(9),
            'pager' => $product_db->pager
        ];

    $data['delivery_location'] = $location_db->findAll();


         // page metada 
         $data['page_description'] = "Welcome to the online store"; // page metadata description
         $data['page_title'] = "title.com";
         $data['feature_img'] = "someImg_path";
         $data['page_keywords'] = "purcasing";

        return view('public/products', $data);
}



public function product($product_id){
    $data = [];

    $product_db = new ProductsModel();
    $category_db = new CategoryModel();
    $location_db = new DeliveryRegions();


    $data['a_product'] = $product_db->table('products_table')
            ->select('*')
            ->join('categories', 'categories.categoryId = products_table.prodCategory')
            ->where('products_table.prodId', $product_id)
            ->get()
            ->getResult();

    $data['delivery_location'] = $location_db->findAll();
    

     // page metada 
     $data['page_description'] = "Welcome to the online store"; // page metadata description
     $data['page_title'] = "title.com";
     $data['feature_img'] = "someImg_path";
     $data['page_keywords'] = "purcasing";

     //print_r($data['a_product']);

     return view('public/view_a_product', $data);

}



}
