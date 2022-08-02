<?php

class Adminorder extends Controller
{
    function __construct()
    {
        parent::__construct();
        $level = Model::getUserLevel();
        if($level!=1 and $level!=2){header('location:'.URL.'adminlogin');}
    }

    function index()
    {
        $orders = $this->model->getOrders();
        $data = ['orders' => $orders];
        $this->view('admin/order/index', $data);
    }

    function detail($orderId = 0)
    {
        $order_status = $this->model->getOrderStatus();
        $orderInfo = $this->model->getOrderInfo($orderId);
        $data = ['orderInfo' => $orderInfo, 'order_status' => $order_status];
        $this->view('admin/order/detail', $data);
    }

    function editorder($orderId = 0)
    {
        $data = [];
        if (isset($_POST)) {
            $data = $_POST;
        }
        $this->model->editOrder($orderId, $data);
        header('location:' . URL . 'adminorder/detail/' . $orderId);
    }

    function showfactor($orderId = 0)
    {
        $orderInfo = $this->model->getOrderInfo($orderId);
        $data = ['orderInfo' => $orderInfo];
        $this->view('admin/order/factor', $data, 1, 1);
    }

    function deleteorder()
    {
        $data = [];
        if (isset($_POST)) {
            $data = $_POST;
        }
        $this->model->deleteOrder($data);
        header('location:' . URL . 'adminorder/index/');
    }
}
