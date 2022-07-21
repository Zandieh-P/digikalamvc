<?php

class Adminproduct extends Controller{

    function __construct(){
    }

    function index(){
        $products=$this->model->getProduct();
        $data=['product'=>$products];
        $this->view('admin/product/index',$data);
    }

    function addproduct($productId=''){
        if (isset($_POST['title'])){
            $this->model->addproduct($_POST,$productId,$_FILES['image']);
        }

        $category=$this->model->getCategory();
        $color=$this->model->getColor();
        $guarantee=$this->model->getGuarantee();
        $productInfo=$this->model->getProductInfo($productId);
        $data=['category'=>$category,'color'=>$color,'guarantee'=>$guarantee,'productInfo'=>$productInfo];
        $this->view('admin/product/addproduct',$data);
    }

    function description($productId){
        $productInfo=$this->model->getProductInfo($productId);
        $description=$this->model->getDescription($productId);
        $data=['description'=>$description,'productInfo'=>$productInfo];
        $this->view('admin/product/description',$data);
    }

    function adddescription($productId,$descriptionId=''){
        if (isset($_POST['title'])){
            $this->model->adddescription($productId,$_POST,$descriptionId);
            header('location:'.URL.'adminproduct/description/'.$productId);
        }
        $productInfo=$this->model->getProductInfo($productId);
        $descriptionInfo=$this->model->descriptionInfo($descriptionId);
        $data=['productInfo'=>$productInfo,'descriptionInfo'=>$descriptionInfo];
        $this->view('admin/product/adddescription',$data);
    }

    function deletedescription($productId){
        $this->model->deleteDescription($_POST['id']);
        header('location:'.URL.'adminproduct/description/'.$productId);
    }

    function deleteproduct(){
        $this->model->deleteProduct($_POST['id']);
        header('location:'.URL.'adminproduct/index');
    }

    function attr($productId){
        if(isset($_POST['submited'])){
            $this->model->editAttr($_POST,$productId);
        }

        $attr=$this->model->getProductAttr($productId);
        $productInfo=$this->model->getProductInfo($productId);
        $data=['attr'=>$attr,'productInfo'=>$productInfo];
        $this->view('admin/product/attr',$data);
    }

    function gallery($productId){
        if(isset($_FILES['image'])){
            $this->model->addGallery($productId,$_FILES['image']);
        }

        $gallery= $this->model->getGallery($productId);
        $productInfo=$this->model->getProductInfo($productId);
        $data=['gallery'=>$gallery,'productInfo'=>$productInfo];
        $this->view('admin/product/gallery',$data);
    }

    function deletegallery($productId){
        if (isset($_POST['id'])){
            $this->model->deleteGallery($_POST['id'],$productId);
        }
        header('location:'.URL.'adminproduct/gallery/'.$productId);
    }
}
