<?php
$active='user';
require('views/admin/layout.php');
$users=[];
if (isset($data['users'])){
    $users=$data['users'];
}
?>
<div class="admin_left">
    <p class="admin_left-title">
        مدیریت اعضا
    </p>
<!--    <a class="addProduct__btn basket__btn" href="adminuser/adduser">افروزن</a>-->
    <a class="addProduct__btn basket__btn" style="margin-left: 5px;" onclick="submitFormMulti()">اجرای عملیات</a>
    <form action="" method="post">
        <select name="action" class="selectTag" style="float:left;margin-left: 10px;font-family: Yekan,sans-serif;font-size: 13.5pt;padding:1px;">
            <option>انتخاب کنید</option>
            <option value="1">تغییر به مدیر</option>
            <option value="2">تغییر به کارمند</option>
            <option value="3">تغییر به کاربر عادی</option>
            <option value="4">حذف</option>
        </select>
        <table class="product_list" cellspacing="0">
            <tr>
                <td>ردیف</td>
                <td>تاریخ عضویت</td>
                <td>نام و نام خانوادگی</td>
                <td>موبایل</td>
                <td>سطح دسترسی</td>
                <td>انتخاب</td>
            </tr>
            <?php
            $i=1;
            foreach ($users as $row) { ?>
                <tr>
                    <td><?= $i; ?></td>
                    <td><?= $row['tarikh'] ?></td>
                    <td><?= $row['family'] ?></td>
                    <td><?= $row['mobile'] ?></td>
                    <td><?= $row['levelTitle'] ?></td>
                    <!--<td>
                        <a class="subProduct" href="adminproduct/addproduct/<?/*= $row['id'] */?>">
                            <i class="subProduct_icon img__fit__contain"></i>
                        </a>
                    </td>-->
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
    function submitForm() {
        $('form').submit();
    }

    function submitFormMulti(){
        let actionSelected=$('.selectTag option:selected').val();
        let action='';
        let form=$('form');
        if(actionSelected==1){action='adminuser/changelevel1';}
        if(actionSelected==2){action='adminuser/changelevel2';}
        if(actionSelected==3){action='adminuser/changelevel3';}
        if(actionSelected==4){action='adminuser/deleteuser';}
        form.attr('action',action);
        form.submit();
    }
</script>