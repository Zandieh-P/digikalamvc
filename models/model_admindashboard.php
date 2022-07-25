<?php

class model_admindashboard extends Model
{
    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
    }

    function getOrder()
    {
        $sql = 'select * from tbl_order';
        $result = $this->doSelect($sql);
        return $result;
    }

    function getStat()
    {
        $today_date = date('Y/m/d');
        $time = time();
        $last_week_time = $time - (7 * 24 * 3600);
        $last_week_date = date('Y/m/d', $last_week_time);
        $dates = $this->getRange($last_week_date, $today_date);
        $orders = $this->getOrder();
        $orderStat = [];
        foreach ($dates as $date) {
            $date_jalili = self::gregoriantojalali($date);
            $orderStat[$date_jalili] = 0;
        }
        foreach ($orders as $order) {
            if (isset($order['tarikh'])) {
                $date_jalili = $order['tarikh'];
                $date_gregorian = self::jalaliToGregorian($date_jalili);
                if (in_array($date_gregorian, $dates)) {
                    $orderStat[$date_jalili] = $orderStat[$date_jalili] + 1;
                }
            }
        }
        return $orderStat;
    }

    function getRange($startDate = '', $endDate = '')
    {
        $dates = [];
        $current = strtotime($startDate);
        $endPoint = strtotime($endDate);
        while ($current <= $endPoint) {
            $dates[] = date('Y/m/d', $current);
            $current = strtotime('+1 day', $current);
        }
        return $dates;
    }
}
