<?php

class Admincomment extends Controller
{
    function __construct()
    {

    }

    function index()
    {
        $comments = $this->model->getComments();
        $data = ['comments' => $comments];
        $this->view('admin/comment/index', $data);
    }

    function confirmed()
    {
        $data = [];
        if (isset($_POST)) {
            $data = $_POST;
        }
        $this->model->confirmed($data);
        header('location:'.URL.'admincomment');
    }

    function unconfirmed()
    {
        $data = [];
        if (isset($_POST)) {
            $data = $_POST;
        }
        $this->model->unconfirmed($data);
        header('location:'.URL.'admincomment');
    }

    function deleteComment()
    {
        $data = [];
        if (isset($_POST)) {
            $data = $_POST;
        }
        $this->model->deleteComment($data);
        header('location:'.URL.'admincomment');
    }

}
