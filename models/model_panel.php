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
        foreach ($result as $key => $row) {
            $sql = 'select * from tbl_order where code=? and userId=?';
            $params = [$row['code'], $userId];
            $orders = $this->doSelect($sql, $params);
            $result[$key]['orders'] = $orders;

            $today=date('Y/m/d');
            /*$today=explode('/',$today);;
            $today=gregorian_to_jalali($today[0],$today[1],$today[2]);
            $today=implode('/',$today);
            var_dump($today);
            $today = self::jaliliDate();
            var_dump($today);*/
            $today = new DateTime($today);
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
}