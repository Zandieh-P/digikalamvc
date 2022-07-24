<?php

class Admindashboard extends Controller
{
    function __construct()
    {
    }

    function index()
    {
        $stat=$this->model->getStat();
        $data = [];
        $this->view('admin/dashboard/index', $data);
    }
}