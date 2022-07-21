<?php

class Showcart4 extends Controller
{
    function __construct()
    {
    }

    function index($Status='')
    {
        $data=['Status'=>$Status];
        $this->view('showcart4/index',$data);
    }

    function checkdiscountcode($discountCode=''){
        $clientDiscount= $this->model->checkDiscountCode($discountCode);
        $totalPrice= $this->model->calculateTotalPrice($discountCode);
        $result=[$clientDiscount,$totalPrice];
        echo json_encode($result);
    }

    function calculatetotalprice(){
        echo $this->model->calculateTotalPrice($_POST['discountCode']);
    }

    function saveorder(){
        $this->model->saveOrder($_POST);
    }
}
