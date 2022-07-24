<?php

class model_admincomment extends Model
{
    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
    }

    function getComments()
    {
        $sql = 'select * from tbl_comment order by id desc';
        $result = $this->doSelect($sql);
        return $result;
    }

    function confirmed($data = [])
    {
        if (sizeof($data) > 0) {

            foreach($data['id'] as $id){
                $sql = 'update tbl_comment set title=?,positive=?,negative=?,content=? where id=?';
                $params=[$data['title'.$id],$data['positive'.$id],$data['negative'.$id],$data['content'.$id],$id];
                $this->doQuery($sql,$params);
            }

            $ids = implode(',', $data['id']);
            $sql = 'update tbl_comment set confirm=1 where id IN (' . $ids . ')';
            $this->doQuery($sql);
        }
    }

    function unconfirmed($data = [])
    {
        if (sizeof($data) > 0) {
            $ids = implode(',', $data['id']);
            $sql = 'update tbl_comment set confirm=0 where id IN (' . $ids . ')';
            $this->doQuery($sql);
        }
    }

    function deleteComment($data = [])
    {
        if (sizeof($data) > 0) {
            $ids = implode(',', $data['id']);
            $sql = 'delete from tbl_comment where id IN (' . $ids . ')';
            $this->doQuery($sql);
        }
    }
}
