<?php

class Addcomment extends Controller{
    function __construct()
    {
    }

    function index($productId=0){
        $params=$this->model->getParam($productId);
        $productInfo=$this->model->productInfo($productId);
        $commentInfo=$this->model->commentInfo($productId);
        $data=['params'=>$params,'productInfo'=>$productInfo,'commentInfo'=>$commentInfo];
        $this->view('addcomment/index',$data);
    }

    function savecomment($productId=0){
        $this->model->saveComment($productId,$_POST);
    }
}
