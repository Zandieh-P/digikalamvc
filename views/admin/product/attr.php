<?php
require('views/admin/layout.php');
$attr = [];
if (isset($data['attr'])) {
    $attr = $data['attr'];
}
$productInfo = [];
if (isset($data['productInfo'])) {
    $productInfo = $data['productInfo'];
}
?>
<div class="admin_left">
    <p class="admin_left-title">
        ویژگی های محصول:
        <span style="color: red">(<?= $productInfo['title']?>)</span>
    </p>
<!--    <form action="adminproduct/adddescription/--><?//= @$attr['id']; ?><!--/--><?//= @$descriptionInfo['id']; ?><!--" method="post"-->
    <form action="" method="post"
          class="addProduct__form">
        <input type="hidden" name="submited">
        <?php
        foreach ($attr as $row){?>
        <div class="row">
            <span class="newProduct__title"><?= $row['title']?></span>
            <input style="width: 400px;" type="text" name="value<?= $row['id'];?>" value="<?= $row['value'];?>">
            <input type="hidden" name="id[]" value="<?= $row['id'];?>">
        </div>
        <?php }?>
        <a class="submit__btn basket__btn" onclick="submitForm()">
            اجرای عملیات
        </a>
    </form>
</div>
</main>
