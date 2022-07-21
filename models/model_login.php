<?php
class model_login extends Model{
    function __construct()
    {
        parent::__construct();
    }

    function index(){

    }

    function checkUser($formData=[]){
        $email=$formData['email'];
        $password=$formData['password'];
        $sql='select * from tbl_user where email=? and password=?';
        $result=$this->doSelect($sql,[$email,$password]);
        if(sizeof($result)>0 and !empty($email) and !empty($password)){
            echo 'correct user password';
            Model::sessionInit();
            Model::sessionSet('userId',$result[0]['id']);
        }else{
            echo 'wrong user password';
        }
    }
}
