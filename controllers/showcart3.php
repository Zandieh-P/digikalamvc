<?php

class Showcart3 extends Controller
{
    function __construct()
    {
    }

    function index()
    {
        $basketInfo=$this->model->getBasketReview();
        $postPrice=$this->model->postPrice();
        $data=['basketInfo'=>$basketInfo,'postPrice'=>$postPrice];
        Model::sessionInit();
        if(Model::sessionGet('addressInfo')!=False){
            $addressInfo=Model::sessionGet('addressInfo');
            $addressInfo=unserialize($addressInfo);
            $data=$data+['addressInfo'=>$addressInfo];
        }
        if(Model::sessionGet('postType')!=False){
            $postType=Model::sessionGet('postType');
            $data=$data+['postType'=>$postType];
        }
        $this->view('showcart3/index',$data);
    }

}
