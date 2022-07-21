<?php

class model_panel extends Model
{
    private $userId = '';

    function __construct()
    {
        parent::__construct();
        Model::sessionInit();
        $this->userId = Model::sessionGet('userId');
    }

    function index()
    {

    }

    function getUserInfo()
    {
        $userId = $this->userId;
        $sql = "select * from tbl_user where id=?";
        $result = $this->doSelect($sql, [$userId], 1);
        return $result;
    }

    function getStat()
    {
        $Stat = [];
        $userId = $this->userId;
        $sql = "select * from tbl_order where userId=?";
        $result = $this->doSelect($sql, [$userId]);
        $Stat['order_number'] = sizeof($result);

        $sql = "select * from tbl_order where userId=? and status=1";
        $result = $this->doSelect($sql, [$userId]);
        $Stat['order_taeed_number'] = sizeof($result);

        $sql = "select * from tbl_order where userId=? and status=2";
        $result = $this->doSelect($sql, [$userId]);
        $Stat['order_pardazesh_number'] = sizeof($result);

        $sql = "select * from tbl_comment where user=?";
        $result = $this->doSelect($sql, [$userId]);
        $Stat['comment_number'] = sizeof($result);

        $sql = "select * from tbl_message where userId=? and status=0";
        $result = $this->doSelect($sql, [$userId]);
        $Stat['message_number'] = sizeof($result);

        return $Stat;
    }

    function getMessage()
    {
        $userId = $this->userId;
        $sql = "select * from tbl_message where userId=?";
        $result = $this->doSelect($sql, [$userId]);
        foreach ($result as $row) {
            $sql = 'update tbl_message set status=1 where id=?';
            $this->doQuery($sql, [$row['id']]);
        }
        return $result;
    }

    function getOrder()
    {
        $userId = $this->userId;
        $sql = "select tbl_order.*,tbl_order_status.title 
        from tbl_order
        LEFT JOIN tbl_order_status
        ON tbl_order_status.id=tbl_order.status
        where userId=?";
        $result = $this->doSelect($sql, [$userId]);
        return $result;
    }

    function getFolder()
    {
        $userId = $this->userId;
        $sql = "select * from tbl_favorit where userId=? and parent=0";
        $result = $this->doSelect($sql, [$userId]);
        return $result;
    }

    function getFavorit($folderId = -1)
    {
        $userId = $this->userId;
        $sql = '';
        if ($folderId > 0) {
            $sql = "select tbl_favorit.*,tbl_product.title as productTitle 
        from tbl_favorit
        LEFT JOIN tbl_product
        ON tbl_favorit.idproduct=tbl_product.id
        where userId=? and parent=?";
        } else if ($folderId == 0) {
            $sql = "select tbl_favorit.*,tbl_product.title as productTitle 
        from tbl_favorit
        LEFT JOIN tbl_product
        ON tbl_favorit.idproduct=tbl_product.id
        where userId=? and parent!=?";
        }
        $result = $this->doSelect($sql, [$userId, $folderId]);
        return $result;
    }

    function saveEdit($folderId = 0, $newName = '')
    {
        $sql = 'update tbl_favorit set title=? where id=?';
        $params = [$newName, $folderId];
        $this->doQuery($sql, $params);
    }

    function deleteFavorit($favoritId = 0)
    {
        $sql = 'delete from tbl_favorit where id=?';
        $this->doQuery($sql, [$favoritId]);
    }

    function getComment()
    {
        $userId = $this->userId;
        $sql = 'select tbl_comment.*,tbl_product.title as productTitle
        from tbl_comment 
        LEFT JOIN tbl_product
        ON tbl_comment.idproduct=tbl_product.id
        where user=?';
        $result = $this->doSelect($sql, [$userId]);
        return $result;
    }

    function deleteComment($commentId = 0)
    {
        $sql = 'delete from tbl_comment where id=?';
        $this->doQuery($sql, [$commentId]);
    }

    /**
     * @throws Exception
     */
    function getCode()
    {
        $userId = $this->userId;
        $sql = "select * from tbl_code where userId=?";
        $result = $this->doSelect($sql, [$userId]);

        $today_date = self::jaliliDate();
        /*$today_date=date('Y/m/d');
        $today_date=explode('/',$today_date);;
        $today_date=gregorian_to_jalali($today_date[0],$today_date[1],$today_date[2]);
        $today_date=implode('/',$today_date);
        //var_dump($today_date);*/
        $today = new DateTime($today_date);

        foreach ($result as $key => $row) {
            $sql = 'select * from tbl_order where code=? and userId=?';
            $params = [$row['code'], $userId];
            $orders = $this->doSelect($sql, $params);
            $result[$key]['orders'] = $orders;

            $date_end = $row['tarikh_end'];
            $expire = new DateTime($date_end);
            $status = '';
            if ($expire->format('Y/m/d') >= $today->format('Y/m/d')) {
                $status = 'معتبر';
            } else {
                $status = 'منقضی شده';
            }
            $result[$key]['status'] = $status;
        }
        return $result;
    }

    function saveCode($data = [])
    {
        $code = $data['code'];
        $userId = $this->userId;
        $sql = 'update tbl_code set userId=? where code=?';
        $this->doQuery($sql, [$userId, $code]);
    }

    function editProfile($data=[]){
        $userId = $this->userId;
        $day=$data['day'];
        $month=$data['month'];
        $year=$data['year'];
        $date=$year.'/'.$month.'/'.$day;
        $sql = 'update tbl_user set family=?,code_meli=?,tel=?,mobile=?,tavalod=?,address=?,jensiat=?,khabarname=? where id=?';
        $params=[$data['family'],$data['code_meli'],$data['tel'],$data['mobile'],$date,$data['address'],$data['jensiat'],$data['khabarname'],$userId];
        $this->doQuery($sql, $params);
    }

    function editPass($data=[]){
        $pass_old=$data['pass_old'];
        $pass_new=$data['pass_new'];
        $pass_confirm =$data['pass_confirm'];
        $error='';
        $userInfo= $this->getUserInfo();
        $password=$userInfo['password'];
        $userId = $this->userId;
        if($password==$pass_old){
            if ($pass_new==$pass_confirm){
                $sql = 'update tbl_user set password=? where id=?';
                $params=[$pass_new,$userId];
                $this->doQuery($sql, $params);
            }else{
                $error='تاییدیه رمز عبور صحیح نیست';
            }
        }else{
            $error='پسورد فعلی نادرست است';
        }
        header('location:'.URL.'panel/changepass?error='.$error);
    }
}