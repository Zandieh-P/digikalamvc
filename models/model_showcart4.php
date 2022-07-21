<?php

class model_showcart4 extends Model
{
    function __construct()
    {
        parent::__construct();
    }

    function index()
    {

    }

    function checkDiscountCode($discountCode)
    {
        $sql = 'select * from tbl_code where code=? and used=0';
        $result = $this->doSelect($sql, [$discountCode]);
        if (sizeof($result) > 0) {
//            $sql='update tbl_code set used=1 where code=?';
//            $this->doQuery($sql,[$discountCode]);
            return $result[0]['darsad'];
        } else {
            return 0;
        }
    }

    function calculateTotalPrice($discountCode = 0)
    {
        $basketInfo = $this->getBasket();
        $basketPrice = $basketInfo[1];
        $basketDiscount = $basketInfo[2];
        self::sessionInit();
        $addressInfo = self::sessionGet('addressInfo');
        $addressInfo = unserialize($addressInfo);
        @$cityId = $addressInfo['city'];
        $postPrices = $this->calculatePostPrice($cityId);
        $postType = self::sessionGet('postType');
        $postPrice = 0;
        if ($postType == 1) {
            $postPrice = $postPrices['pishtaz'];
        } else if ($postType == 2) {
            $postPrice = $postPrices['sefareshi'];
        }
        $checkDiscount = $this->checkDiscountCode($discountCode);
        $clientDiscount = 0;
        if ($checkDiscount != 0) {
            $clientDiscount = ($checkDiscount * $basketPrice) / 100;
            $clientDiscount = intval($clientDiscount);
        }
        $priceTotal = $basketPrice - $basketDiscount + $postPrice - $clientDiscount;
        $priceTotal = ceil($priceTotal);
        return $priceTotal;
    }

    function saveOrder($data = '')
    {
        $basketInfo = $this->getBasket();
        $basket = $basketInfo[0];
        $basket = serialize($basket);
        $basketPrice = $basketInfo[1];
        $basketDiscount = $basketInfo[2];
        self::sessionInit();
        $addressInfo = self::sessionGet('addressInfo');
        $addressInfo = unserialize($addressInfo);
        @$family = $addressInfo['family'];
        @$state = $addressInfo['state_name'];
        @$city = $addressInfo['city_name'];
        @$mobile = $addressInfo['mobile'];
        @$tel = $addressInfo['tel'];
        @$postalcode = $addressInfo['postalcode'];
        @$address = $addressInfo['address'];
        @$cityId = $addressInfo['city'];
        $postPrices = $this->calculatePostPrice($cityId);
        $postType = self::sessionGet('postType');
        $postPrice = 0;
        if ($postType == 1) {
            $postPrice = $postPrices['pishtaz'];
        } else if ($postType == 2) {
            $postPrice = $postPrices['sefareshi'];
        }
        @$discountCode = $data['clientDiscountCode'];
        $checkDiscount = $this->checkDiscountCode($discountCode);
        $clientDiscount = 0;
        if ($checkDiscount != 0) {
            $clientDiscount = ($checkDiscount * $basketPrice) / 100;
            $clientDiscount = intval($clientDiscount);
        }
        $priceTotal = $basketPrice - $basketDiscount + $postPrice - $clientDiscount;
        $priceTotal = ceil($priceTotal);
        $userId = self::sessionGet('userId');

        $payType = $data['payType'];
        $Authority = '';
        $beforePay_reservation = '';


        // These options are just for local testing, and can be deleted.
        $Description = 'خرید از کلیک سایت';
        $clientEmail = 'info@clicksite.ir';


        if ($payType == 1) {
            $payment = new Payment;

            /*            $result=$payment->zarinpalRequest($priceTotal,$Description,$clientEmail,$mobile);
                        $Status=$result['Status'];
                        $Authority=$result['Authority'];*/


            // These options are just for local testing, the function return value, and can be deleted.
            $Status = 100;
            $Authority = 1234;


            $beforePay_reservation = $Authority;

        }

        $time=time();
        $sql = 'insert into tbl_order (family,state,city,postalcode,mobile,tel,address,basket,amount,postType,postPrice,userId,status,beforePay_reservation,payType,time_sabt) VALUES (?,?,?,?,?,?,?,?,?,?,?,?,?,?,?,?)';
        $params = [$family, $state, $city, $postalcode, $mobile, $tel, $address, $basket, $priceTotal, $postType, $postPrice, $userId, 1, $beforePay_reservation,$payType,$time];
        $this->doQuery($sql, $params);

        if ($payType == 1) {
            if ($Status == 100) {
                header('location:' . URL . 'checkout/index/' . $Authority . '/' . $Status);
//                header('location:'.zarinpalStartPay.$Authority);
            } else {
                header('location:' . URL . 'showcart4/index/' . $Status);
            }
        } else if ($payType == 4) {
            $sql='select * from tbl_order order by id desc limit 1';
            $result=$this->doSelect($sql,[],1);
            header('location:' . URL . 'checkout/index/' . $result['id']);
        }

    }
}
