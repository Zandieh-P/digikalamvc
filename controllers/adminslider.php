<?php

class Adminslider extends Controller
{
    function __construct()
    {
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