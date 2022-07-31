<?php

class Search extends Controller
{
    function __construct()
    {
    }

    function index($categoryId = 0)
    {
        $attr = $this->model->getAttr($categoryId);
        $attrRight = $this->model->getAttrRight($categoryId);
        $colors=$this->model->getColors();
        $data = ['attr' => $attr, 'attrRight' => $attrRight,'colors'=>$colors];
        $this->view('search/index', $data);
    }

    function doSearch()
    {
        $data=[];
        if (isset($_POST)) {
            $data=($_POST);
        }
        $productTotal=$this->model->doSearch($data);
        echo json_encode($productTotal);
        //        print_r($productTotal);
    }
}
