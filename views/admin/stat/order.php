<?php
$active='stat';
require('views/admin/layout.php');
$stat=[];
$result=[];
$amount=0;
$order_paid=0;
$startDate='';
$endDate='';
if(isset($data['stat'])){
    $stat=$data['stat'];
    $result=$stat['result'];
    $amount=$stat['amount'];
    $order_paid=$stat['order_paid'];
    $startDate=$stat['startDate'];
    $endDate=$stat['endDate'];
}
?>
<div class="admin_left">
    <p class="admin_left-title">
        نتایج آمار و گزارشات در بازه زمانی
        <?= $startDate?>
         الی
        <?= $endDate?>
    </p>
</div>
</div>
</main>