<?php

class Product extends Controller
{
    function __construct()
    {
    }

    function index($id,$acctiveTab='product__tab-naghd')
    {
        $productInfo=$this->model->productInfo($id);
        $onlyInDigikala=$this->model->getOnlyInDigikala();
        $detailsGallery=$this->model->getDetailsGallery($id);
        $data=['productInfo'=>$productInfo,'onlyInDigikala'=>$onlyInDigikala,'detailsGallery'=>$detailsGallery,'activeTab'=>$acctiveTab];
        $this->view('product/index',$data);
    }

    function tab($id,$idcategory){
        $number=$_POST['number'];
        if($number==0){
            $description=$this->model->description($id);
            $data=[$description];
            $this->view('product/product__tab-child1',$data,1,1);
        }elseif ($number==1){
            $technical=$this->model->technical($idcategory,$id);
            $data=[$technical];
            $this->view('product/product__tab-child2',$data,1,1);
        }elseif ($number==2){
            $commentParam=$this->model->comment_param($idcategory);
            $comment=$this->model->getComment($id);
            $data=[$commentParam,$comment];
            $this->view('product/product__tab-child3',$data,1,1);
        }elseif ($number==3){
            $this->view('product/product__tab-child4','',1,1);
        }
    }

    function addtobasket($productId,$color='',$guarantee=''){
        if($color==0 or !isset($color)){$color='';}
//        if($guarantee==0  or !isset($guarantee)){$guarantee=1;}
        $this->model->addToBasket($productId,$color,$guarantee);
    }
}
