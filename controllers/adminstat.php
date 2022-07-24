<?php

class Adminstat extends Controller
{
    function __construct()
    {
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