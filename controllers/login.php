<?php

class Login extends Controller
{
    function __construct()
    {
    }

    function index()
    {
        $data=[];
        $this->view('login/index');
    }

    function checkuser(){
        $formData=$_POST;
        $this->model->checkUser($formData);
//        Model::sessionInit();
        $check=Model::sessionGet('userId');
        if($check==False){
            header('location:'.URL.'login');
        }else{
            header('location:'.URL.'panel');
        }
    }
}
