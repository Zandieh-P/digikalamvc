<?php

class model_showcart2 extends Model
{
    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
    }

    function addAddress($data = '', $editAddressId = '')
    {
        $family = $data['family'];
        $mobile = $data['mobile'];
        $tel = $data['tel'];
        $state = $data['state'];
        $city = $data['city'];
        $neighbour = $data['neighbour'];
        $address = $data['address'];
        $postalcode = $data['postalcode'];
        $state_name = $data['state'];
        $city_name = $data['city'];

        Model::sessionInit();
        $userid = Model::sessionGet('userId');

        if ($editAddressId == '') {
            $sql = 'insert into tbl_user_address (userid,family,mobile,tel,state,city,neighbour,address,postalcode,state_name,city_name) VALUES (?,?,?,?,?,?,?,?,?,?,?)';
            $params = [$userid, $family, $mobile, $tel, $state, $city, $neighbour, $address, $postalcode, $state_name, $city_name];
        } else {
            $sql = 'update tbl_user_address set family=?,mobile=?,tel=?,state=?,city=?,neighbour=?,address=?,postalcode=?,state_name=?,city_name=? where id=?';
            $params = [$family, $mobile, $tel, $state, $city, $neighbour, $address, $postalcode, $state_name, $city_name, $editAddressId];
        }
        $this->doQuery($sql, $params);
    }

    function getAddress()
    {
        Model::sessionInit();
        $userid = Model::sessionGet('userId');
        if ($userid != FALSE) {
            $sql = 'select * from tbl_user_address where userid=?';
            $result = $this->doSelect($sql, [$userid]);
        } else $result = [];
        return $result;
    }

    function getAddressInfo($addressId = '')
    {
        $sql = 'select * from tbl_user_address where id=?';
        $result = $this->doSelect($sql, [$addressId], 1);
        return $result;
    }

    function getPostType()
    {
        $sql = 'select * from tbl_post_type';
        $result = $this->doSelect($sql);
        return $result;
    }

    function getPostPrice($data='')
    {
        @$cityId=$data['cityId'];
        @$addressId=$data['addressId'];
        if(isset($addressId)){
            $sql='select * from tbl_user_address where id=?';
            $result=$this->doSelect($sql,[$addressId],1);
            self::sessionInit();
            self::sessionSet('addressInfo',serialize($result));
        }

        $postPrice=$this->calculatePostPrice($cityId);
        echo json_encode($postPrice);
    }

    function sessionPostType($data){
        if(isset($data)){
            self::sessionInit();
            self::sessionSet('postType',$data['postTypeId']);
        }
    }

    function deleteAddress($id){
        $sql='delete from tbl_user_address where id=?';
        $this->doQuery($sql,[$id]);
    }
}


