<?php

class Adminuser extends Controller
{
    function __construct()
    {
    }

    function index($productId = 0)
    {
        $users = $this->model->getUsers();
        $data = ['users' => $users];
        $this->view('admin/user/index', $data);
    }

    function changelevel1()
    {
        $ids = [];
        if (isset($_POST['id'])) {
            $ids=$_POST['id'];
        }
        $this->model->changelevel1($ids);
        header('location:'.URL.'adminuser');
    }

    function changelevel2()
    {
        $ids = [];
        if (isset($_POST['id'])) {
            $ids=$_POST['id'];
        }
        $this->model->changelevel2($ids);
        header('location:'.URL.'adminuser');
    }

    function changelevel3()
    {
        $ids = [];
        if (isset($_POST['id'])) {
            $ids=$_POST['id'];
        }
        $this->model->changelevel3($ids);
        header('location:'.URL.'adminuser');
    }

    function deleteuser()
    {
        $ids = [];
        if (isset($_POST['id'])) {
            $ids=$_POST['id'];
        }
        $this->model->deleteUser($ids);
        header('location:'.URL.'adminuser');
    }
}
