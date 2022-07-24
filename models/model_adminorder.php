<?php

class model_adminorder extends Model
{
    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
    }

    function getOrders()
    {
        $sql = 'select * from tbl_order order by id desc';
        $result = $this->doSelect($sql);
        return $result;
    }

    function getOrderInfo($orderId = 0)
    {
        $sql = 'select o.*,pa.title as payTypeTitle,po.title as postTitle
        from tbl_order o
        LEFT JOIN tbl_pay_type pa ON o.payType=pa.id
        LEFT JOIN tbl_post_type po ON o.postType=po.id
        where o.id=?';
        $result = $this->doSelect($sql, [$orderId], 1);
        return $result;
    }

    /*function getOrderInfo($orderId=0){
        $sql='select * from tbl_order where id=?';
        $result=$this->doSelect($sql,[$orderId],1);
        return $result;
    }*/

    function editOrder($orderId = 0, $data = [])
    {
        $address = '';
        $postalcode = '';
        $tel = '';
        $payStatus = 0;
        $order_status = '';
        if (isset($data['address'])) {
            $address = $data['address'];
        }
        if (isset($data['postalcode'])) {
            $postalcode = $data['postalcode'];
        }
        if (isset($data['tel'])) {
            $tel = $data['tel'];
        }
        if (isset($data['pay__status'])) {
            $payStatus = $data['pay__status'];
        }
        if (isset($data['order__status'])) {
            $order_status = $data['order__status'];
        }
        $sql = 'update tbl_order set address=?,postalcode=?,tel=?,pay=?,status=? where id=?';
        $params = [$address, $postalcode, $tel, $payStatus, $order_status, $orderId];
        $this->doQuery($sql, $params);
    }

    function getOrderStatus()
    {
        $sql = 'select * from tbl_order_status';
        $result = $this->doSelect($sql);
        return $result;
    }

    function deleteOrder($data = [])
    {
        $ids = implode(',', $data['id']);
        $sql = 'delete from tbl_order where id IN ('.$ids.')';
        $this->doQuery($sql);
    }
}
