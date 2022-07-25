<?php

class Admindashboard extends Controller
{
    function __construct()
    {
    }

    function index()
    {
        $orderStat=$this->model->getStat();
        $data = ['orderStat'=>$orderStat];
        $this->view('admin/dashboard/index', $data);
    }
}