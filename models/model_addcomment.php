<?php

class model_addcomment extends Model
{
    function __construct()
    {
        parent::__construct();
    }

    function index()
    {

    }

    function productInfo($productId=0){
        $sql='select * from tbl_product where id=?';
        $result=$this->doSelect($sql,[$productId],1);
        return $result;
    }
    function getParam($productId=0){
        $productInfo=$this->productInfo($productId);
        @$categoryId=$productInfo['cat'];
        $sql='select * from tbl_comment_param where idcategory=?';
        $result=$this->doSelect($sql,[$categoryId]);
        return $result;
    }

    function saveComment($productId=0,$data=''){
        $comment_params=$this->getParam($productId);
        $param_result=[];
        foreach ($comment_params as $row){
            $paramId=$row['id'];
            $value=$data['param'.$paramId];
            $param_result[$paramId]=$value;
        }
        $title=$data['title'];
        $positive=$data['positive'];
        $negative=$data['negative'];
        $comment=$data['comment'];

        self::sessionInit();
        $userId=self::sessionGet('userId');

        $sql='select * from tbl_comment where user=? and idproduct=?';
        $params=[$userId,$productId];
        $result=$this->doSelect($sql,$params);
        if(isset($result[0])){
            $commentId=$result[0]['id'];
            $sql='update tbl_comment set title=?,content=?,positive=?,negative=?,param=? where id=?';
            $params=[$title,$comment,$positive,$negative,serialize($param_result),$commentId];
        }else{
            $sql='insert into tbl_comment (title,content,positive,negative,idproduct,param,user) VALUES (?,?,?,?,?,?,?)';
            $params=[$title,$comment,$positive,$negative,$productId,serialize($param_result),$userId];
        }
        $this->doQuery($sql,$params);

        header('location:'.URL.'addcomment/index/'.$productId);
    }

    function commentInfo($productId){
        self::sessionInit();
        $userId=self::sessionGet('userId');

        $sql='select * from tbl_comment where idproduct=? and user=?';
        $params=[$productId,$userId];
        $result=$this->doSelect($sql,$params,1);
        return $result;
    }
}
