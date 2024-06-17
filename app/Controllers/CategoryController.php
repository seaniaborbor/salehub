<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

use \App\Models\CategoryModel;


class CategoryController extends BaseController
{
    public function __construct() {
        helper(['form', 'text']);
     }
    // add new category 
    public function add_category(){
        $db = new CategoryModel();

        $validationRules = [
            'categoryName' => [
                'rules' => 'required|is_unique[categories.categoryName]',
                'errors' => [
                    'required' => 'Category Name is required.',
                    'is_unique' => 'Category Name must be unique.'
                ]
            ]
        ];
        
        if($this->request->getMethod() == 'post'){
            if(!$this->validate($validationRules)){
                return back()->with('error', 'You did not provide the category name or it already exists.');
            }else{
                $data['categoryName'] = $this->request->getPost('categoryName');
                if($db->save($data)){
                    return redirect()->back()->with('success', "You sucessfully added a new product category");
                }else{
                    return redirect()->back()->with('error', "Error occured while saving the category. Try again");
                }
            }
        }
    }
}
