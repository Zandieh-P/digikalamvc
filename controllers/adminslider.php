<?php

class Adminslider extends Controller
{
    function __construct()
    {
        parent::__construct();
        $level=Model::getUserLevel();
        if($level!=1 and $level!=2){header('location:'.URL.'adminlogin');}
    }

    function index()
    {
        if (isset($_POST['title']) and isset($_FILES)){
            $this->model->addSlider($_POST,$_FILES);
        }
        $slider=$this->model->getSlider();
        $data = ['slider'=>$slider];
        $this->view('admin/slider/index', $data);
    }

    function deleteslider(){
        if (isset($_POST)){
            $this->model->deleteSlider($_POST);
        }
        header('location:'.URL.'adminslider/index');
    }
}