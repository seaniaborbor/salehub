<?php

namespace App\Controllers;

use \App\Models\ProductsModel;
use \App\Models\CategoryModel;
use \App\Models\DeliveryRegions;
use \App\Models\DeliveryModel;
use \App\Models\UserModel;


class AgentsController extends BaseController
{

    public function assign_order_to_agent()
    {
        $delivery_db = new DeliveryModel();

        $rules = [
            'agent_id' => [
                'rules' => "required",
                'label' => "Agent Name",
                'errors' => [
                    'required' => 'Required',
                ]
            ],
            'order_code' => [
                'rules' => "required",
                'label' => "Order Code ",
                'errors' => [
                    'required' => 'The Order Code is a must',
                ]
            ],
        ];

        if(!$this->validate($rules)){
            return redirect()->back()->with('error', 'Please fill out the form correctly ');
        }else{
            $formData['order_code'] = $this->request->getPost('order_code');
            $formData['agent_id'] = $this->request->getPost('agent_id');
            $formData['assignedDate'] =  date('Y-m-d');
           if($delivery_db->save($formData)){
            return redirect()->back()->with("success", "You successfully assigned an agent to deliver this order order");
           }else{
            return redirect()->back()->with('error', 'Error occured while assigning this order to an agent for delivery ');
           }
        }
    }


    public function agent_delivery_log($agent_id){
        $delivery_db  = new DeliveryModel();

        $data['pending_log'] = $delivery_db->table('agent_assignments')
                                    ->select('*')
                                    ->join('order', "order.orderCode = agent_assignments.order_code")
                                    ->join('customer_table', "customer_table.orderCode = order.orderCode")
                                    ->where('agent_assignments.agent_id', $agent_id)
                                    ->where('agent_assignments.isDeliver', 0)
                                    ->groupBy('agent_assignments.order_code')
                                    ->orderBy("agent_assignments.agent_id", "DESC")
                                    ->get()
                                    ->getResult();
        
        $data['delivered_log'] = $delivery_db->table('agent_assignments')
                                    ->select('*')
                                    ->join('order', "order.orderCode = agent_assignments.order_code")
                                    ->join('customer_table', "customer_table.orderCode = order.orderCode")
                                    ->where('agent_assignments.agent_id', $agent_id)
                                    ->where('agent_assignments.isDeliver', 1)
                                    ->groupBy('agent_assignments.order_code')
                                    ->orderBy("agent_assignments.agent_id", "DESC")
                                    ->get()
                                    ->getResult();

        return view("admin/agent_delivery_log", $data);
    }

}
