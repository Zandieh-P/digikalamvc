<?php

class Adminlogin extends Controller
{
    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
//        $category = $this->model->getChildren(0);
        $data = [];
        $this->view('admin/login/index', $data);
    }

    function checkuser(){
        $formData=[];
        if(isset($_POST)){
            $formData=$_POST;
        }
        $this->model->checkUser($formData);
        Model::sessionInit();
        $check=Model::sessionGet('userId');
        if($check==False){
            header('location:'.URL.'adminlogin');
        }else{
            header('location:'.URL.'admindashboard');
        }
    }
}