<?php

class model_adminsetting extends Model
{
    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
    }

    function saveSetting($data = [])
    {
        foreach ($data as $settingName=>$value){
            $sql='update tbl_option set value=? where setting=?';
            $params=[$value,$settingName];
            $this->doQuery($sql, $params);
        }
    }
}
