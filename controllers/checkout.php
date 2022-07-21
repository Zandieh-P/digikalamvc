<?php

class checkout extends Controller
{
    function __construct()
    {
        parent::__construct();
    }

    function index($firstArgument = null, $secondArgument = null)
    {
        $data = [];
        if (isset($firstArgument)) {
            if (isset($secondArgument)) {
                $get = ['Authority' => $firstArgument, 'Status' => $secondArgument];
                $result = $this->model->zarinpalCheckout($get);
            } else {
                $orderId = $firstArgument;
                $result = $this->model->getOrderInfo($orderId);
            }
            $data = ['orderInfo' => $result];
        }
        $this->view('checkout/index', $data);
    }

    /*function index($orderId=null){
        $result=[];
        if(isset($_GET['Authority'])){
            $result=$this->model->zarinpalCheckout($_GET);
        }else if(isset($orderId)){
            $result=$this->model->getOrderInfo($orderId);
        }
        $data=['orderInfo'=>$result];
        $this->view('checkout/index',$data);
    }*/

    function payonline($orderId=''){
        $this->model->payonline($orderId);
    }

    function showerror(){
        $Error = '';
        $orderId = '';
        if (isset($_GET['error'])) {
            $Error = $_GET['error'];
        }
        if (isset($_GET['orderId'])) {
            $orderId = $_GET['orderId'];
        }
        $data=['Error'=>$Error,'orderId'=>$orderId];
        $this->view('checkout/showerror',$data);
    }

    function creditcard($orderId=''){
        if (isset($_POST['day'])){
            $this->model->updateCreditCard($_POST,$orderId);
        }
        $orderInfo=$this->model->getOrderInfo($orderId);
        $data=['orderInfo'=>$orderInfo];
        $this->view('checkout/creditcard',$data);
    }
}
