<?php

class model_showcart extends Model{
    function __construct()
    {
        parent::__construct();
    }

    function deleteBasket($basketId){
        $sql='delete from tbl_basket where id=?';
        $this->doQuery($sql,[$basketId]);
    }

    function updateBasket($data){
        $tedad=$data['tedad'];
        $basketId=$data['basketId'];
        $sql='update tbl_basket set tedad=? where id=?';
        $params=[$tedad,$basketId];
        $this->doQuery($sql,$params);
    }
}
