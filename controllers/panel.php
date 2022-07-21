<?php

class Panel extends Controller
{
    public $checkLogin = '';

    function __construct()
    {
        Model::sessionInit();
        $this->checkLogin = Model::sessionGet('userId');
        if ($this->checkLogin == False or $this->checkLogin == '') {
            header('location:' . URL . 'login');
        }
    }

    function index($activeTab='message')
    {
        $comments=$this->model->getComment();
        $userInfo = $this->model->getUserInfo();
        $Stat = $this->model->getStat();
        $message = $this->model->getMessage();
        $order = $this->model->getOrder();
        $folder = $this->model->getFolder();
        $code=$this->model->getCode();
        $data = ['userInfo' => $userInfo, 'stat' => $Stat, 'message' => $message, 'order' => $order, 'folder' => $folder,'comments'=>$comments,'code'=>$code,'activeTab'=>$activeTab];
        $this->view('panel/index', $data);
    }

    function getfavorit()
    {
        $folderId = -1;
        if (isset($_POST['folderId'])) {
            $folderId = $_POST['folderId'];
        }
        $result = $this->model->getFavorit($folderId);
        return json_encode($result);
    }

    function saveEdit()
    {
        $folderId = 0;
        $newName = '';
        if (isset($_POST['folderId'])) {
            $folderId = $_POST['folderId'];
        }
        if (isset($_POST['newName'])) {
            $newName = $_POST['newName'];
        }
        $this->model->saveEdit($folderId, $newName);
    }

    function deleteFavorit()
    {
        $favoritId = 0;
        if (isset($_POST['favoritId'])) {
            $favoritId = $_POST['favoritId'];
        }
        $this->model->deleteFavorit($favoritId);
    }

    function deletecomment($commentId=0){
        $this->model->deleteComment($commentId);
    }

    function saveCode(){
        $this->saveCode($_POST);
    }

    function profile(){
        $userInfo= $this->model->getUserInfo();
        $data=['userInfo'=>$userInfo];
        $this->view('panel/profile',$data);
    }

    function editprofile(){
        $data=$_POST;
        $this->model->editProfile($data);
        header('location:'.URL.'panel/profile');
    }

    function changepass(){
        $this->view('panel/changepass');
    }

    function editpass(){
        $data=$_POST;
        $this->model->editPass($data);
//        header('location:'.URL.'panel/profile');
    }
}