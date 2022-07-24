<?php
$active='order';
require('views/admin/layout.php');
$orders = [];
if (isset($data['orders'])) {
    $orders = $data['orders'];
}
?>
<div class="admin_left">
    <p class="admin_left-title">
        مدیریت سفارشات
    </p>
    <a class="addOrder__btn basket__btn" style="background: red;margin-left: 5px;" onclick="submitForm()">حذف</a>
    <form action="adminorder/deleteorder" method="post">
        <table class="order_list" cellspacing="0">
            <tr>
                <td>کد</td>
                <td>تاریخ</td>
                <td>تحویل گیرنده</td>
                <td>مبلغ کل</td>
                <td>استان</td>
                <td>شهر</td>
                <td>جزئیات</td>
                <td>انتخاب</td>
            </tr>
            <?php foreach ($orders as $row) { ?>
                <tr>
                    <td><?= $row['id'] ?></td>
                    <td><?= $row['date'] ?></td>
                    <td><?= $row['family'] ?></td>
                    <td><?= $row['amount'] ?></td>
                    <td><?= $row['state'] ?></td>
                    <td><?= $row['city'] ?></td>
                    <td>
                        <a class="subOrder" href="adminorder/detail/<?= $row['id'] ?>">
                            <i class="subOrder_icon img__fit__contain"></i>
                        </a>
                    </td>
                    <td>
                        <input type="checkbox" name="id[]" value="<?= $row['id'] ?>">
                    </td>
                </tr>
            <?php } ?>
        </table>
    </form>
</div>
</div>
</main>

<script>
    function submitForm(){
        $('form').submit();
    }
</script>