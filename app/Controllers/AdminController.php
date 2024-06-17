<?php

namespace App\Controllers;

use CodeIgniter\Controller;

use \App\Models\ProductsModel;
use \App\Models\CategoryModel;
use \App\Models\SaleModel;
use \App\Models\OrderModel;
use \App\Models\CustomerModel;
use \App\Models\UserModel;
use \App\Models\DeliveryModel;

class AdminController extends Controller
{
   public function __construct(){
    helper(['form','url']);
   }
    /**
     * Display login form
     */
    public function login()
    {
        $user_db  = new UserModel();
        $data = [];
      

        $rules = [
            'userEmail' => [
                'rules' => "required|valid_email",
                'label' => "User Email ",
                'errors' => [
                    'required' => 'Please provide a valid',
                    'valid_email' => 'Please provide valid email'
                ]
            ],
            'password' => [
                'rules' => "required|min_length[6]",
                'label' => "Password",
                'errors' => [
                    'required' => 'Password is required',
                    'min_length' => 'Image must be more than six chars',
                ]
            ],
        ];

        if($this->request->getMethod() == 'post'){

            if(!$this->validate($rules)){
                $data['validation'] = $this->validator;
            }else{
                $email = $this->request->getPost('userEmail');
                $passwprd = $this->request->getPost('password');

                $user = $user_db->where('userEmail', $email)->find();
                if(empty($user)){
                   $data['error'] = "Invalid Credential";
                }else{
                    if(password_verify($passwprd, $user[0]['password'])){

                        session()->set('isLoggedIn', true);
                        session()->set('userData', $user);
                        // print_r(session()->get('userData'));
                        // exit();

                        if($user[0]['userRole'] == "agent"){
                            return redirect()->to('/dashboard/profile/'.$user[0]['adminId'])->with("success", "Welcome dude");
                        }else{
                            return redirect()->to("/dashboard")->with("success", "Welcome dude");
                        }
                    }
                }


            }

            

        }


        return view('admin/login', $data);
    }

   

    public function list_users(){
        $data = [];

        $user_db  = new UserModel();
        $data['all_users'] = $user_db->findAll();

        $rules = [
            'userName' => [
                'rules' => "required",
                'label' => "Full Name ",
                'errors' => [
                    'required' => 'Please provide user full name',
                ]
            ],
            'userEmail' => [
                'rules' => "required|is_unique[admin_login_table.userEmail]",
                'label' => "User Email ",
                'errors' => [
                    'required' => 'Please provide a valid',
                    'is_unique' => 'The email already exists'
                ]
            ],
            'userRole' => [
                'rules' => "required",
                'label' => "User Type ",
                'errors' => [
                    'required' => 'User Role is a must; please indicate',
                ]
            ],
        ];

        if($this->request->getMethod() == "post"){

            if(!$this->validate($rules)){
                $data['validation'] = $this->validator;
            }else{
                //get form data
                $formData['userEmail'] = $this->request->getPost('userEmail');
                $formData['userRole'] = $this->request->getPost('userRole');
                $formData['userName'] = $this->request->getPost('userName');
                $formData['password'] = password_hash('abc123abc', PASSWORD_DEFAULT);
                
                if($user_db->save($formData)){
                    return redirect()->back()->with("success", "You successfully add a new user to the system");
                }else{
                    return redirect()->back()->with("error", "An error occured while trying to add a user");
                }
            }

        }

        return view("admin/users", $data);
    }


    public function profile($agent_id){

        $user_db  = new UserModel();
        $delivery_db  = new DeliveryModel();
        $data = [];

       

        // do some the validation 
        if(empty($agent_id)){
            return redirect()->back()->with("error", "Invalid request");
        } else {
            // Protect the profile
            if($agent_id == session()->get('userData')[0]['adminId'] || session()->get('userData')[0]['userRole'] == 'admin'){
                // Query or fetch the data
                $data['user'] = $user_db->where('adminId', $agent_id)->find();
                if(empty($data['user'])){
                    return redirect()->back()->with("error", "Data doesn't exist");
                }
            }
        }

        // get the total pending log of the
        $data['pending_log_count'] = $delivery_db->table('agent_assignments')
            ->select('agent_assignments.*')
            ->join('order', "order.orderCode = agent_assignments.order_code")
            ->join('customer_table', "customer_table.orderCode = order.orderCode")
            ->where('agent_assignments.agent_id', $agent_id)
            ->where('agent_assignments.isDeliver', 0)
            ->groupBy('agent_assignments.order_code')
            ->orderBy("agent_assignments.agent_id", "DESC")
            ->countAllResults();

        $data['delivered_log_count'] = $delivery_db->table('agent_assignments')
            ->select('agent_assignments.*')
            ->join('order', "order.orderCode = agent_assignments.order_code")
            ->join('customer_table', "customer_table.orderCode = order.orderCode")
            ->where('agent_assignments.agent_id', $agent_id)
            ->where('agent_assignments.isDeliver', 1)
            ->groupBy('agent_assignments.order_code')
            ->orderBy("agent_assignments.agent_id", "DESC")
            ->countAllResults();


        
        return view('admin/user_profile', $data);
    }


    
    public function update_password()
    {
        $user_db = new UserModel();
        
        $rules = [
            'userEmail' => [
                'rules' => "required",
                'label' => "User Email",
                'errors' => [
                    'required' => 'Please provide a valid email',
                ]
            ],
            'password' => [
                'rules' => "required|min_length[9]",
                'label' => "Password",
                'errors' => [
                    'required' => 'Enter the old password',
                    'min_length' => 'Old password should be nine characters or above',
                ]
            ],
            'newPassword' => [
                'rules' => "required|min_length[9]",
                'label' => "Password",
                'errors' => [
                    'required' => 'Enter the new password',
                    'min_length' => 'New password should be nine characters or above',
                ]
            ],
            'adminId' => [
                'rules' => "required",
                'label' => "Admin ID",
                'errors' => [
                    'required' => 'Admin ID is required',
                ]
            ],
        ];
    
        if (!$this->validate($rules)) {
            echo $this->validator->listErrors();
            exit();
            $message = "Email is either wrong<br> Old password is incorrect<br> Password (old/new) should be at least 9 characters long";
            return redirect()->back()->with('error', $message);
        } else {
            $agent_id = $this->request->getPost('adminId');
            $password = $this->request->getPost('password');
            $userEmail = $this->request->getPost('userEmail');
            $newPassword = $this->request->getPost('newPassword');
    
            // Fetch the user data based on adminId
            $data = $user_db->where('userEmail', $userEmail)->get()->getRow();
    
            if ($data) {
                if (password_verify($password, $data->password)) {
                    $hashedPassword = password_hash($newPassword, PASSWORD_DEFAULT);
                    
                    // Prepare the data for update
                    $formData = [
                        'userName' => $data->userName,
                        'userEmail' => $userEmail,
                        'password' => $hashedPassword,
                        'userRole' => $data->userRole,
                    ];
    
                    // Perform the update
                    $update_success = $user_db->where('adminId', $agent_id)->set($formData)->update();
    
                    if ($update_success) {
                        return redirect()->back()->with('success', "Password updated successfully");
                    } else {
                        return redirect()->back()->with('error', "Password update unsuccessful");
                    }
                } else {
                    return redirect()->back()->with('error', "Old Password is incorrect");
                }
            } else {
                return redirect()->back()->with('error', "User not found");
            }
        }
    }
    
    //log out user from system 
    public function logout(){

        if(session()->has("isLoggedIn")){
            session()->remove('isLoggedIn');
            session()->remove('userData');
            return redirect()->to("/login")->withInput()->with('success', "You're  logged out");
        }
    }

}
