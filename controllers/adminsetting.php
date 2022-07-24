<?php

class Adminsetting extends Controller
{
    function __construct()
    {
    }

    function index()
    {
        if(isset($_POST['limit_slider'])){
            $this->model->saveSetting($_POST);
            header("Refresh:1");
        }
        $data = [];
        $this->view('admin/setting/index', $data);
    }
}