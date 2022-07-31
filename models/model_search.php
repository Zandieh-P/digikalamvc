<?php

class model_search extends Model
{
    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
    }

    function getAttr($categoryId = 0)
    {
        $sql = 'select * from tbl_attr where idcategory=? and filter=1';
        $result = $this->doSelect($sql, [$categoryId]);
        foreach ($result as $key => $row) {
            $sql = 'select * from tbl_attr_val where idattr=?';
            $res = $this->doSelect($sql, [$row['id']]);
            $result[$key]['values'] = $res;
        }
        return $result;
    }

    function getProducts($exist = 0, $keyword = '', $orderType1 = [], $orderType2 = [])
    {
        $string = 'where 1=1';
        $order = ' order by';
        if ($exist == 1) {
            $string .= ' and tedad_mojood > 0';
        }
        if ($keyword != '') {
            $string .= ' and title like "%' . $keyword . '%"';
        }
        if ($orderType1 == 1) {
            $order = $order . ' price ';
        }
        if ($orderType1 == 2) {
            $order = $order . ' viewed ';
        }
        if ($orderType1 == 3) {
            $order = $order . ' id ';
        }
        if ($orderType1 == 4) {
            $order = $order . ' special ';
        }
        if ($orderType2 == 1) {
            $order = $order . ' asc ';
        }
        if ($orderType2 == 2) {
            $order = $order . ' desc ';
        }
        $sql = 'select * from tbl_product ' . $string . $order . '';
        $result = $this->doSelect($sql);
        return $result;
    }

    function productAttrVal()
    {
        $sql = 'select * from tbl_product_attr';
        $result = $this->doSelect($sql);
        $productAttrVal = [];
        foreach ($result as $row) {
            $productId = $row['idproduct'];
            $attrId = $row['idattr'];
            $valId = $row['idval'];
            if (!isset($productAttrVal[$productId])) {
                $productAttrVal[$productId] = [];
            }
            $productAttrVal[$productId][$attrId] = $valId;
        }
        return $productAttrVal;
    }

    function doSearch($data = [])
    {
        $exist = 0;
        if (isset($data['exist'])) {
            $exist = $data['exist'];
        }
        $keyword = '';
        if (isset($data['keyword'])) {
            $keyword = $data['keyword'];
        }
        $colors = [];
        if (isset($data['color'])) {
            $colors = $data['color'];
        }
        $orderType1 = [];
        if (isset($data['orderType1'])) {
            $orderType1 = $data['orderType1'];
        }
        $orderType2 = [];
        if (isset($data['orderType2'])) {
            $orderType2 = $data['orderType2'];
        }
        $current_page = 1;
        if (isset($data['current_page'])) {
            $current_page = $data['current_page'];
        }
        $pagination_limit = 1;
        if (isset($data['pagination_limit'])) {
            $pagination_limit = $data['pagination_limit'];
        }
        $products = $this->getProducts($exist, $keyword, $orderType1, $orderType2);
//        $products = $this->getProducts($exist);
        $productAttrVal = $this->productAttrVal();
        $productTotal = [];
        foreach ($products as $productKey => $product) {
            foreach ($data as $key => $arrayValId) {
                $attr = explode('-', $key);
                @$attrId = $attr[1];
                $productId = $product['id'];
                @$productVal = $productAttrVal[$productId][$attrId];
                if (isset($productVal)) {
                    if (!in_array($productVal, $arrayValId)) {
                        unset($products[$productKey]);
                    }
                }
            }

            if (isset($data['color'])) {
                $productColor = $product['colors'];
                $productColor = explode(',', $productColor);
                $common = array_intersect($colors, $productColor);
                if (sizeof($common) == 0) {
                    unset($products[$productKey]);
                }
            }
        }
        $productTotal = array_filter($products);
        $pagination_offset=($current_page-1)*$pagination_limit;
        $page_number=sizeof($productTotal)/$pagination_limit;
        $page_number=ceil($page_number);
        $productTotal=array_slice($productTotal,$pagination_offset,$pagination_limit);
        return [$productTotal,$page_number];
    }

    function getAttrRight($categoryId = 0)
    {
        $sql = 'select * from tbl_attr where idcategory=? and filter_right=1';
        $result = $this->doSelect($sql, [$categoryId]);
        foreach ($result as $key => $row) {
            $sql = 'select * from tbl_attr_val where idattr=?';
            $res = $this->doSelect($sql, [$row['id']]);
            $result[$key]['values'] = $res;
        }
        return $result;
    }

    function getColors()
    {
        $sql = 'select * from tbl_color';
        $result = $this->doSelect($sql);
        return $result;
    }
}
