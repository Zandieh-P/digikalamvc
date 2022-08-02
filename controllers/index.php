<?php

class Index extends Controller
{
    function __construct()
    {
    }

    function index()
    {
        $slider1=$this->model->getSlider1();
        $slider2=$this->model->getSlider2();
        $onlyInDigikala=$this->model->getOnlyInDigikala();
        $mostViewed=$this->model->getMostViewed();
        $latestProducts=$this->model->getLatestProducts();
        $slider2_items=$slider2[0];
        $date_end=$slider2[1];
        $data= array($slider1,$slider2_items,$date_end,$onlyInDigikala,$mostViewed,$latestProducts);
        $this->view('index/index',$data);
    }

    /*    function sayHello($name = '', $family = '')
        {
            echo 'Hi it is sayHello method in index controller<br>';
            echo $name . '<br>';
            echo $family;
        }*/
}