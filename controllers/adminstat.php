<?php

class Adminstat extends Controller
{
    function __construct()
    {
        parent::__construct();
        $level=Model::getUserLevel();
        if($level!=1){header('location:'.URL.'adminlogin');}
    }

    function index()
    {
        $data = [];
        $this->view('admin/stat/index', $data);
    }

    function order()
    {
        $data=[];
        if (isset($_POST)){
            $data=$_POST;
        }
        $stat=$this->model->order($data);
        $data=['stat'=>$stat];
        $this->view('admin/stat/order', $data);
    }
}