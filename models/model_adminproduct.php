<?php

class model_adminproduct extends Model
{

    function __construct()
    {
        parent::__construct();
    }

    function getProduct()
    {
        $sql = 'select * from tbl_product';
        $result = $this->doSelect($sql);
        return $result;
    }

    function getCategory()
    {
        $sql = "select * from tbl_category";
        $result = $this->doSelect($sql);
        return $result;
    }

    function getColor()
    {
        $sql = "select * from tbl_color";
        $result = $this->doSelect($sql);
        return $result;
    }

    function getGuarantee()
    {
        $sql = 'select * from tbl_guarantee';
        $result = $this->doSelect($sql);
        return $result;
    }

    function addproduct($data = [], $productId,$file=[])
    {
        $title = $data['title'];
        $categoryId = $data['categoryId'];
        $price = $data['price'];
        $introduction = $data['introduction'];
        $tedad_mojood = $data['tedad_mojood'];
        $discount = $data['discount'];
        $colors = '';
        if (isset($data['color'])) {
            $colors = $data['color'];
            $colors = join(',', $colors);
//        $colors=implode(',',$colors);
        }
        $guarantees = '';
        if (isset($data['guarantee'])) {
            $guarantees = $data['guarantee'];
            $guarantees = join(',', $guarantees);
//        $guarantees=implode(',',$guarantees);
        }

        if ($productId == '') {
            $sql = 'insert into tbl_product (title,price,cat,introduction,discount,tedad_mojood,colors,guarantee) VALUES (?,?,?,?,?,?,?,?)';
            $value = [$title, $price, $categoryId, $introduction, $discount, $tedad_mojood, $colors, $guarantees];
            $this->doQuery($sql, $value);
            $productId=parent::$conn->lastInsertId();
            @mkdir('public/images/products/'.$productId);
        } else {
            $sql = 'update tbl_product set title=?,price=?,cat=?,introduction=?,discount=?,tedad_mojood=?,colors=?,guarantee=? where id=?';
            $value = [$title, $price, $categoryId, $introduction, $discount, $tedad_mojood, $colors, $guarantees, $productId];
            $this->doQuery($sql, $value);
        }

        $fileName=$file['name'];
        $fileSize=$file['size'];
        $fileTmp=$file['tmp_name'];
        $fileType=$file['type'];
        $fileError=$file['error'];
        $uploadOK=1;
        $pathTarget='public/images/products/'.$productId.'/';
        $fileNewName='product';
        if($fileType!='image/jpg' and $fileType!='image/jpeg' and $fileType!='image/png'){
            $uploadOK=0;
        }
        if($fileSize>(5*1024*1024)){
            $uploadOK=0;
        }
        if($uploadOK==1){
            $ext=pathinfo($fileName,PATHINFO_EXTENSION);
            $pathTargetMain=$pathTarget.$fileNewName.'.'.$ext;
            move_uploaded_file($fileTmp,$pathTargetMain);
            $pathTarget800=$pathTarget.$fileNewName.'_800x800.'.$ext;
            $pathTarget2400=$pathTarget.$fileNewName.'_2400x2400.'.$ext;
            $this->create_thumbnail($pathTargetMain,$pathTarget800,800,800);
            $this->create_thumbnail($pathTargetMain,$pathTarget2400,2400,2400);
        }
    }

    function getProductInfo($productId)
    {
        $sql = 'select * from tbl_product where id=?';
        $result = $this->doSelect($sql, [$productId], 1);
        $colors = @$result['colors'];
        $colors = explode(',', $colors);
        $result['colorsInfo'] = [];
        foreach ($colors as $color) {
            $sql = 'select * from tbl_color where id=?';
            $colorInfo = $this->doSelect($sql, [$color], 1);
            array_push($result['colorsInfo'], $colorInfo);
        }
        $guarantees = @$result['guarantee'];
        $guarantees = explode(',', $guarantees);
        $result['guaranteeInfo'] = [];
        foreach ($guarantees as $guarantee) {
            $sql = 'select * from tbl_guarantee where id=?';
            $guaranteeInfo = $this->doSelect($sql, [$guarantee], 1);
            array_push($result['guaranteeInfo'], $guaranteeInfo);
        }
        return $result;
    }

    function getDescription($productId)
    {
        $sql = 'select * from tbl_description where idproduct=? order by id desc';
        $result = $this->doSelect($sql, [$productId]);
        return $result;
    }

    function adddescription($productId, $data = [], $descriptionId = '')
    {
        if ($descriptionId == '') {
            $sql = 'insert into tbl_description (title,description,idproduct) VALUES (?,?,?)';
            $params = [$data['title'], $data['description'], $productId];
            $result = $this->doQuery($sql, $params);
        } else {
            $sql = 'update tbl_description set title=?,description=? where id=?';
            $params = [$data['title'], $data['description'], $descriptionId];
            $result = $this->doQuery($sql, $params);
        }
    }

    function descriptionInfo($descriptionId)
    {
        $sql = 'select * from tbl_description where id =?';
        $data = [$descriptionId];
        $result = $this->doSelect($sql, $data, 1);
        return $result;
    }

    function deleteDescription($ids = [])
    {
        $ids = join(',', $ids);
        $sql = 'delete from tbl_description where id IN (' . $ids . ')';
        $this->doQuery($sql);
    }

    function deleteProduct($ids = [])
    {
        $ids = join(',', $ids);
        $sql = 'delete from tbl_product where id IN (' . $ids . ')';
        $this->doQuery($sql);
        $sql = 'delete from tbl_description where idproduct IN (' . $ids . ')';
        $this->doQuery($sql);
    }

    function getAttrVal($attrId=0){
        $sql='select * from tbl_attr_val where idattr=?';
        $result=$this->doSelect($sql,[$attrId]);
        return $result;
    }

    function getProductAttr($productId)
    {
        $productInfo = $this->getProductInfo($productId);
        $catId = $productInfo['cat'];

        $sql = 'select tbl_attr.*,tbl_product_attr.idval from tbl_attr LEFT JOIN tbl_product_attr ON tbl_attr.id=tbl_product_attr.idattr and tbl_product_attr.idproduct=? where idcategory=? and parent!=0';

        /*$sql = 'select tbl_attr.*,tbl_product_attr.value from tbl_attr LEFT JOIN tbl_product_attr ON tbl_attr.id=tbl_product_attr.idattr and tbl_product_attr.idproduct=? where idcategory=? and parent!=0';;*/

        /*$sql='select * from tbl_attr where idcategory=? and parent!=0';
        $result = $this->doSelect($sql, [$catId]);*/

        $result = $this->doSelect($sql, [$productId, $catId]);
        foreach($result as $key=>$attr){
            $values=$this->getAttrVal($attr['id']);
            $result[$key]['values']=$values;
        }
        return $result;
    }

    function editAttr($data = [],$productId)
    {
        $ids = $data['id'];
        foreach ($ids as $id){
            $sql='delete from tbl_product_attr where idproduct=? and idattr=?';
            $params=[$productId,$id];
            $this->doQuery($sql,$params);

            $sql = 'insert into tbl_product_attr (idproduct,idattr,idval) values (?,?,?)';
//            $sql = 'insert into tbl_product_attr (idproduct,idattr,value) values (?,?,?)';
            $params = [$productId, $id, $data['value' . $id]];
            $this->doQuery($sql, $params);
        }
    }

    function getGallery($productId){
        $sql='select * from tbl_gallery where idproduct=?';
        $result=$this->doSelect($sql,[$productId]);
        return $result;
    }

    function addGallery($productId=0,$file=[]){
        $fileName=$file['name'];
        $fileSize=$file['size'];
        $fileTmp=$file['tmp_name'];
        $fileType=$file['type'];
        $fileError=$file['error'];
        $uploadOK=1;
        $pathTarget1='public/images/products/'.$productId;
        $pathTarget=$pathTarget1.'/gallery/';
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
            $pathTargetLargeDir=$pathTarget.'large/';
            $pathTargetSmallDir=$pathTarget.'small/';
            if(!file_exists($pathTarget)){
                @mkdir($pathTarget);
            }
            if(!file_exists($pathTargetLargeDir)){
                @mkdir($pathTargetLargeDir);
            }
            if(!file_exists($pathTargetSmallDir)){
                @mkdir($pathTargetSmallDir);
            }
            $pathTargetMain=$pathTarget.'large/'.$fileNewName.'.'.$ext;
            move_uploaded_file($fileTmp,$pathTargetMain);
            @mkdir('public/images/products/'.$productId.'/small');
            $pathTargetSmall=$pathTarget.'small/'.$fileNewName.'.'.$ext;
            $this->create_thumbnail($pathTargetMain,$pathTargetSmall,160,130);
            $sql='insert into tbl_gallery (img,idproduct) values (?,?)';
            $this->doQuery($sql,[$fileNewName.'.'.$ext,$productId]);
        }
    }

    function deleteGallery($ids,$productId){
        foreach ($ids as $id){
            $sql='select * from tbl_gallery where id=?';
            $result=$this->doSelect($sql,[$id],1);
            $fileName=$result['img'];
            $dir='public/images/products/'.$productId.'/';
            $dir_small=$dir.'gallery/small/'.$fileName;
            $dir_large=$dir.'gallery/large/'.$fileName;
            unlink($dir_small);
            unlink($dir_large);
        }
        $ids=join(',',$ids);
        $sql='delete from tbl_gallery where id IN ('.$ids.')';
        $this->doQuery($sql);
    }
}
