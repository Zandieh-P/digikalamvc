<?php

class model_adminstat extends Model
{
    function __construct()
    {
        parent::__construct();
    }

    function index()
    {
    }

    function compareDate($date1='',$date2=''){
        if(isset($date1)){
            $date1=new DateTime($date1);
            $date1=$date1->format('Y-m-d');
        }
        if(isset($date2)){
            $date2=new DateTime($date2);
            $date2=$date2->format('Y-m-d');
        }
        if($date1>$date2){
            return 1;
        }
        if ($date1 == $date2) {
            return 2;
        }
        if ($date1 < $date2) {
            return 3;
        }
    }

    function order($data=[])
    {
        $startDate='';
        $endDate='';
        $tarikh='';
        if (sizeof($data)>0){
            $startDate=$data['year1'].'/'.$data['month1'].'/'.$data['day1'];
            $endDate=$data['year2'].'/'.$data['month2'].'/'.$data['day2'];
        }
        $sql = "select * from tbl_order";
        $result = $this->doSelect($sql);
        $resultTotal=[];
        $ordersPaid=0;
        $amountTotal=0;
        foreach($result as $row){
            if(isset($row['tarikh'])){
                $tarikh=$row['tarikh'];
            }
            $compare1=$this->compareDate($tarikh,$startDate);
            $compare2=$this->compareDate($tarikh,$endDate);
            if(($compare1==1 or $compare1==2) and ($compare2==2 or $compare2==3)){
                array_push($resultTotal,$row);
                if ($row['pay']==1){
                    $ordersPaid=$ordersPaid+1;
                }
                if(isset($row['amount'])){
                    $amountTotal=$amountTotal+$row['amount'];
                }
            }
        }
        return ['result'=>$resultTotal,'amount'=>$amountTotal,'order_paid'=>$ordersPaid,'startDate'=>$startDate,'endDate'=>$endDate];
    }
}
