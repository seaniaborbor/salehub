<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

 //
// let handle any page not found by setting our own 404 page 

// Custom 404 error route
// Custom 404 error route
$routes->set404Override('App\Controllers\Four0Four::pageNotFound');

$routes->get('/', 'Home::index');

// auth/login routes 
$routes->get('/login', 'AdminController::login');
$routes->post('/login', 'AdminController::login');
$routes->get('/logout', 'AdminController::logout');


//order routes 
$routes->get('/add_to_cart/(:any)', 'OrderController::add_to_cart/$1');
$routes->get('/view_cart', 'OrderController::view_cart');
$routes->get('/check_out', 'OrderController::add_to_cart');
$routes->get('/empty_cart', 'OrderController::empty_cart');
$routes->post('/save_order', 'OrderController::save_order');


$routes->get('/products', 'Home::products');// load all the products
$routes->get('/product_view/(:any)', 'Home::product/$1');// view a single products




// both agent and admin can access these routes 
$routes->group("", ['filter'=>'agentProtector'], function($routes){

    $routes->get('/dashboard/users', 'AdminController::list_users'); 
    $routes->get('/dashboard/profile/(:any)', 'AdminController::profile/$1');
    //view delivery or delivery pending
    $routes->get('/dashboard/agent_delivery_log/(:any)', 'AgentsController::agent_delivery_log/$1');
    // get the detail of a particular order
    $routes->get('/dashboard/view_order_detail/(:any)', 'OrderController::view_order_detail/$1');
    //mark as delivered 
    $routes->get('/dashboard/mark_as_delivered/(:any)', 'OrderController::mark_as_delivered/$1');
    //update password 
    $routes->post('/dashboard/update_password', 'AdminController::update_password'); 


}); 


/*
............................
    protected admin routes 
    only admin can access
............................
*/
$routes->group("", ['filter'=>'adminProtector'], function($routes){

// index of admin 
$routes->get('/dashboard', 'DashboardController::index');
$routes->post('/dashboard', 'DashboardController::index'); // save a sale 
$routes->get("/dashboard/delete_sale/(:num)", "DashboardController::delete_a_sale/$1"); // delete a sale 

// delete order
$routes->get('/dashboard/delete_order/(:any)', 'OrderController::drop_order/$1');
// manage products order 
$routes->get('/dashboard/orders', 'OrderController::index');

// delivery regions 
$routes->get('/dashboard/delivery_regions', 'DeliveryRegionsController::index');
$routes->post('/dashboard/delivery_regions', 'DeliveryRegionsController::index');

// manage products 
$routes->get('/dashboard/products', 'ProductsController::index');
$routes->post('/dashboard/products', 'ProductsController::index');
// edit products 
$routes->get('/dashboard/edit_product/(:any)', 'ProductsController::edit_product/$1');
//generate sale report or sale summary  - alytics 
$routes->post('/dashboard/edit_product/(:any)', 'ProductsController::edit_product/$1'); 
// delete products
$routes->get('/dashboard/delete_product/(:any)', 'ProductsController::delete_product/$1'); 

// manage product category
$routes->post('/dashboard/add_category', 'CategoryController::add_category');
// report routes
$routes->get('/dashboard/analytics', 'AnalyticController::index');
$routes->post('/dashboard/analytics', 'AnalyticController::index');


$routes->post('/dashboard/users', 'AdminController::list_users'); 
$routes->post('/dashboard/assign_to_agent', 'AgentsController::assign_order_to_agent'); 

// get or add 
});