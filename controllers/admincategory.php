<?php

class Admincategory extends Controller
{
    function __construct()
    {
    }

    function index()
    {
        $category = $this->model->getChildren(0);
        $data = ['category' => $category];
        $this->view('admin/category/index', $data);
    }

    function showchildren($idcategory = 0)
    {
        $categoryInfo = $this->model->getCategoryInfo($idcategory);
        $children = $this->model->getChildren($idcategory);
        $parents = $this->model->getParents($idcategory);
        $data = ['categoryInfo' => $categoryInfo, 'category' => $children, 'parents' => $parents];
        $this->view('admin/category/index', $data);
    }

    function addcategory($categoryId = 0, $edit = '')
    {
        if (isset($_POST['title'])) {
            $title = $_POST['title'];
            $parent = $_POST['parent'];
            $this->model->addCategory($title, $parent, $edit, $categoryId);
        }
        $category = $this->model->getCategory();
        $categoryInfo = $this->model->getCategoryInfo($categoryId);
        $data = ['category' => $category, 'categoryId' => $categoryId, 'edit' => $edit, 'categoryInfo' => $categoryInfo];
        $this->view('/admin/category/addcategory', $data);
    }

    function deletecategory($parentId = 0)
    {
        $ids = $_POST['id'];
        $this->model->deleteCategory($ids);
//        header('location:'.URL.'admincategory/showchildren/'.$parentId);
        if ($parentId == 0) {
            header('location:' . URL . 'admincategory/index/');
        } else {
            header('location:' . URL . 'admincategory/showchildren/' . $parentId);
        }
    }

    function showattr($categoryId = 0, $attrId = 0)
    {
        $attr = $this->model->getAttr($categoryId, $attrId);
        $categoryInfo = $this->model->getCategoryInfo($categoryId);
        if ($attrId != 0) {
            $attrInfo = $this->model->getAttrInfo($attrId);
        } else {
            $attrInfo = [];
        }
        $data = ['attr' => $attr, 'categoryInfo' => $categoryInfo, 'attrInfo' => $attrInfo];
        $this->view('admin/category/showattr', $data);
    }

    function addattr($categoryId = 0, $parentId = 0, $editId = '')
    {
        if (isset($_POST['title'])) {
            $this->model->addAttr($_POST, $categoryId, $editId);
            header('location:' . URL . 'admincategory/showattr/' . $categoryId . '/' . $parentId);
        }

        $attr = $this->model->getAttr($categoryId, 0);
        $categoryInfo = $this->model->getCategoryInfo($categoryId);
        $editInfo = '';
        if ($editId != '') {
            $editInfo = $this->model->getAttrInfo($editId);
        }
        $data = ['attr' => $attr, 'categoryInfo' => $categoryInfo, 'parentId' => $parentId, 'editInfo' => $editInfo];
        $this->view('admin/category/addattr', $data);
    }

    function deleteattr($categoryId, $attrId='')
    {
        $ids = $_POST['id'];
        $this->model->deleteAttr($ids);
        header('location:' . URL . 'admincategory/showattr/' . $categoryId . '/' . $attrId);
    }
}