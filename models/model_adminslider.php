<?php

class model_adminslider extends Model
{
    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
    }

    function getSlider(){
        $sql='select * from tbl_slider1 order by id desc';
        $result=$this->doSelect($sql);
        return $result;
    }

    function addSlider($data='',$files=[]){
        $title='';
        if(isset($data['title'])){
            $title=$data['title'];
        }
        $link='';
        if(isset($data['link'])){
            $link=$data['link'];
        }
        if(isset($files['image'])){
            $file=$files['image'];
            $fileName=$file['name'];
            $fileSize=$file['size'];
            $fileTmp=$file['tmp_name'];
            $fileType=$file['type'];
            $fileError=$file['error'];
            $uploadOK=1;
            $pathTarget='public/images/slider/';
//        $fileNewName='product';
            $fileNewName=time();
            if($fileType!='image/jpg' and $fileType!='image/jpeg' and $fileType!='image/png'){
                $uploadOK=0;
            }
            if($fileSize>(5*1024*1024)){
                $uploadOK=0;
            }
            if($uploadOK==1){
                $ext=pathinfo($fileName,PATHINFO_EXTENSION);
                if(!file_exists($pathTarget)){
                    @mkdir($pathTarget);
                }
                $pathTargetMain=$pathTarget.$fileNewName.'.'.$ext;
                move_uploaded_file($fileTmp,$pathTargetMain);
                $sql='insert into tbl_slider1 (title,link,img) values (?,?,?)';
                $this->doQuery($sql,[$title,$link,$pathTargetMain]);
            }
        }
    }

    function deleteSlider($data=[]){
        if(isset($data['id'])){
            $ids=$data['id'];
            $ids=join(',',$ids);
            $sql='delete from tbl_slider1 where id IN ('.$ids.')';
            $this->doQuery($sql);
        }
    }
}
