<?php

class model_index extends Model
{
    function __construct()
    {
        parent::__construct();
    }

    function getSlider1()
    {
        $sql = 'select * from tbl_slider1';
        $result=$this->doSelect($sql);
/*        $stmt = self::$conn->prepare($sql);
//        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();*/
        return $result;
    }

    function getSlider2()
    {
        $sql = 'select * from tbl_product where special=?';
//        $sql = 'select * from tbl_product where special=1';
        $values=[1];
        $result=$this->doSelect($sql,$values);
/*        $stmt = self::$conn->prepare($sql);
//        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();*/
        foreach ($result as $key => $row) {
            $discount = $row['discount'];
            $price = $row['price'];
            $price_total=$this->calculateDiscount($price,$discount)[1];
//            $price_total = ((100 - $discount) * $price) / 100;
            $result[$key]['price_total'] = $price_total;
        }
        $time_end=0;
        if(isset($result[0])){
            $first_specialItem = $result[0];

        $time_special = $first_specialItem['time_special'];
/*
        $sql = 'select * from tbl_option where setting="special_time"';
//        $stmt = $this->conn->prepare($sql);
        $stmt = self::$conn->prepare($sql);
        $stmt->execute();
        $result2 = $stmt->fetch();
        $duration_special = $result2['value'];*/
        $options=self::getOptions();
        $duration_special=$options['special_time'];
        $time_end = $time_special + $duration_special;
        }
        date_default_timezone_set('Asia/Tehran');
        $date = date('F d,Y H:i:s', $time_end);
        return [$result, $date];
    }

    function getOnlyInDigikala()
    {
        $sql = 'select * from tbl_product where onlyInDigikala=1';
        $result=$this->doSelect($sql);
/*        $stmt = self::$conn->prepare($sql);
//        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();*/
        return $result;
    }

    function getMostViewed()
    {
        $sql = 'select * from tbl_option where setting="limit_slider"';
        $result=$this->doSelect($sql,[],1);
/*        $stmt = self::$conn->prepare($sql);
//        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetch();*/
        $limit_slider = $result['value'];
        $sql = 'select * from tbl_product order by viewed desc limit ' . $limit_slider . '';
        $result=$this->doSelect($sql);
/*        $stmt = self::$conn->prepare($sql);
//        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();*/
        return $result;
    }

    function getLatestProducts()
    {
        $option=self::getOptions();
        $limit_slider=$option['limit_slider'];

        /*$sql = 'select * from tbl_option where setting="limit_slider"';
        $result=$this->doSelect($sql,[],1);
        $limit_slider = $result['value'];*/

        /*$stmt = self::$conn->prepare($sql);
//        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetch();
        $limit_slider = $result['value'];*/

        $sql = 'select * from tbl_product order by id desc limit ' . $limit_slider . '';
        $result=$this->doSelect($sql);
/*        $stmt = self::$conn->prepare($sql);
//        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll();*/
        return $result;
    }
}