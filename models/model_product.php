<?php

class model_product extends Model
{
    function __construct()
    {
        parent::__construct();
    }

    function productInfo($id)
    {
        $sql = 'select * from tbl_product where id=?';
//        $sql='select * from tbl_product where id=:x';
        $result = $this->doSelect($sql, [$id], 1);
        /*        $stmt=self::$conn->prepare($sql);
                $stmt->bindParam(':x',$id);
                $stmt->execute();
                $result=$stmt->fetch();*/
        $price = $result['price'];
        $discount = $result['discount'];
        $price_calculate = $this->calculateDiscount($price, $discount);
        $result['price_discount'] = $price_calculate[0];
        $result['price_total'] = $price_calculate[1];
        $first_specialItem = $result;
        $time_special = $first_specialItem['time_special'];
        /*
                $sql = 'select * from tbl_option where setting="special_time"';
        //        $stmt = $this->conn->prepare($sql);
                $stmt = self::$conn->prepare($sql);
                $stmt->execute();
                $result2 = $stmt->fetch();
                $duration_special = $result2['value'];*/
        $options = self::getOptions();
        $duration_special = $options['special_time'];
        $time_end = $time_special + $duration_special;
        date_default_timezone_set('Asia/Tehran');
        $date = date('F d,Y H:i:s', $time_end);
        $result['date_special'] = $date;
        $colors = $result['colors'];
        $colors = explode(',', $colors);
        $colors = array_filter($colors);
        $all_colors = [];
        foreach ($colors as $color) {
            $colorInfo = $this->colorInfo($color);
            array_push($all_colors, $colorInfo);
        }
        $result['all_colors'] = $all_colors;
        $guarantees = $result['guarantee'];
        $guarantees = explode(',', $guarantees);
        $guarantees = array_filter($guarantees);
        $all_guarantees = [];
        foreach ($guarantees as $guarantee) {
            $guaranteeInfo = $this->guaranteeInfo($guarantee);
            array_push($all_guarantees, $guaranteeInfo);
        }
        $result['all_guarantees'] = $all_guarantees;
        return $result;
    }

    function colorInfo($id)
    {
        $sql = 'select * from tbl_color where id=?';
        $result = $this->doSelect($sql, [$id], 1);
        return $result;
    }

    function guaranteeInfo($id)
    {
        $sql='select * from tbl_guarantee where id=?';
        $result=$this->doSelect($sql,[$id],1);
        return $result;
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

    function description($id){
        $sql='select * from tbl_description where idproduct=?';
        $result=$this->doSelect($sql,[$id]);
        return $result;
    }

    function technical($idcategory,$idproduct){
        $sql='select * from tbl_attr where idcategory=? and parent=?';
        $result=$this->doSelect($sql,[$idcategory,0]);
        foreach ($result as $key => $row){
            $sql='select tbl_attr.title,tbl_product_attr.value from tbl_attr LEFT JOIN tbl_product_attr ON tbl_attr.id=tbl_product_attr.idattr and tbl_product_attr.idproduct=? where tbl_attr.parent=?';
//            $sql='select * from tbl_attr where parent=?';
            $result2=$this->doSelect($sql,[$idproduct,$row['id']]);
            $result[$key]['children']=$result2;
        }
        return $result;
    }

    function comment_param($idcategory){
        $sql='select * from tbl_comment_param where idcategory=?';
        $result=$this->doSelect($sql,[$idcategory]);
        return $result;
    }

    function getComment($idproduct){
        $sql='select * from tbl_comment where idproduct=?';
        $result=$this->doSelect($sql,[$idproduct]);
        return $result;
    }

    function getDetailsGallery($idproduct){
        $sql='select * from tbl_gallery where idproduct=?';
        $result=$this->doSelect($sql,[$idproduct]);
        return $result;
    }

    function addToBasket($productId,$color,$guarantee){
        $cookie=self::getBasketCookie();
        $sql='select * from tbl_basket where cookie=? and idproduct=? and color=? and guarantee=?';
        $params=[$cookie,$productId,$color,$guarantee];
        $result=$this->doSelect($sql,$params);
        if(isset($result[0])){
            $sql='update tbl_basket set tedad=tedad+1 where cookie=? and idproduct=? and color=? and guarantee=?';
        }else{
            $sql='insert into tbl_basket (cookie,idproduct,tedad,color,guarantee) VALUES (?,?,1,?,?)';
        }
        $this->doQuery($sql,$params);
    }
}