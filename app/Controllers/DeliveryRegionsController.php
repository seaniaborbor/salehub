<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

use \App\Models\ProductsModel;
use \App\Models\CategoryModel; 
use \App\Models\DeliveryRegions; 
use \App\Models\OrderModel; 
use \App\Models\CustomerModel; 

class DeliveryRegionsController extends BaseController
{
    public function index()
    {
        //index of the delivery regions 

        $data = [];

        $regions_db = new DeliveryRegions();

        $data['regions'] = $regions_db->findAll();

                // validation rules for the save sale log 
         $rules = [
                    'regionName' => [
                        'rules' => "required",
                        'label' => "Region Name",
                        'errors' => [
                            'required' => 'This is a required field',
                        ]
                    ],
                    'regionDeliveryCost' => [
                        'rules' => "required",
                        'label' => "Delivery Cost ",
                        'errors' => [
                            'required' => 'Tell How Much It cost to deliver at this region',
                        ]
                    ],
            ];

            if($this->request->getMethod() == "post"){

                if(!$this->validate($rules)){
                    $data['_validation'] = $this->validation();
                }else{
                    $form_data = [];

                    $form_data['regionName'] = $this->request->getPost('regionName');
                    $form_data['regionDeliveryCost'] = $this->request->getPost('regionDeliveryCost');
                    if($regions_db->save($form_data)){
                        return redirect()->back()->with("success", "You added a region successfully");
                    }else{
                        return redirect()->back()->with("error", "An error occured while trying to add a new location");
                    }
                }
            }
        return view('admin/delivery_regions', $data);
    }

}
