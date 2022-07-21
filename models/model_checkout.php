<?php

class model_checkout extends Model
{
    function __construct()
    {
        parent::__construct();
    }

    function index()
    {

    }

    function getOrderInfo($orderId = '')
    {
        $sql = 'select * from tbl_order where id=?';
        $result = $this->doSelect($sql, [$orderId], 1);
        return $result;
    }

    function zarinpalCheckout($data = '')
    {
        $Status = $data['Status'];
        $Authority = $data['Authority'];
        $sql = 'select * from tbl_order where beforePay_reservation=?';
        $order = $this->doSelect($sql, [$Authority], 1);
        $Amount = $order['amount'];

        $payment = new Payment;

        /*        $result=$payment->zarinpalVerify($Amount,$Authority);
                $Status=$result['Status'];
                $Error=$result['Error'];
                $RefID=$result['RefID'];*/

        $Status = 100;//This is just for local checking, the function return value, and can be deleted.
        $Error = 100;//This is just for local checking, the function return value, and can be deleted.
        $RefID = 5678;//This is just for local checking, the function return value, and can be deleted.

        if ($Status == 100) {
            $sql = 'update tbl_order set pay=1,afterPay_reference=? where beforePay_reservation=?';
            $params = [$RefID, $Authority];
            $this->doQuery($sql, $params);
//            header('location:'.zarinpalStartPay.$Authority);
        } else {
//            header('location:'.URL.'showcart4/index/'.$Status);
        }

        $sql = 'select * from tbl_order where beforePay_reservation=?';
        $order = $this->doSelect($sql, [$Authority], 1);
        return $order;
    }

    function payOnline($orderId = '')
    {
        $orderInfo = $this->getOrderInfo($orderId);
//        print_r($orderInfo);
        $payType = $orderInfo['payType'];
        if ($payType == 4) {
            $sql='update tbl_order set payType=1 where id=?';
            $params=[$orderId];
            $this->doQuery($sql,$params);
            $payType=1;
        }
        if ($payType == 1) { //zarinpal payment
            @$Amount = $orderInfo['amount'];
            @$Mobile = $orderInfo['mobile'];


            // These options are just for local testing, and can be deleted.
            $Description = 'خرید از کلیک سایت';
            $clientEmail = 'info@clicksite.ir';


            $payment = new Payment;
            /*$result = $payment->zarinpalRequest($Amount, $Description, $clientEmail, $Mobile);
            @$Status=$result['Status'];
            @$Authority=$result['Authority'];
            @$Error=$result['Error'];*/


            // These options are just for local testing, the function return value, and can be deleted.
            $Status = 101;
            $Authority = 1234;
            $Error='پیام خطا';


            if ($Status == 100) {
                header('location:' . URL . 'checkout/index/' . $Authority . '/' . $Status);
//                header('location:'.zarinpalStartPay.$Authority);
            } else {
                header('location:' . URL . 'checkout/showerror/?error=' . $Error.'&orderId='.$orderId);
            }


            /*$Authority = '';
            $beforePay_reservation = '';
            $clientEmail = 'info@clicksite.ir';
            $Status = $result['Status'];
            $Authority = $result['Authority'];*/

        } else if ($payType == 2) { //mellat payment

        } else if ($payType == 3) { //parsian payment

        } else if ($payType == 4) { //cart2cart payment

        }
    }

    function updateCreditCard($data='',$orderId=''){
        $day=$data['day'];
        $month=$data['month'];
        $year=$data['year'];
        $hour=$data['hour'];
        $minute=$data['minute'];
        $creditcard=$data['creditcard'];
        $bank=$data['bank'];

        $sql='update tbl_order set pay_day=?,pay_month=?,pay_year=?,pay_hour=?,pay_minute=?,pay_card=?,pay_bank_name=?,payType=4 where id=?';
        $params=[$day,$month,$year,$hour,$minute,$creditcard,$bank,$orderId];
        $this->doQuery($sql,$params);
    }
}
