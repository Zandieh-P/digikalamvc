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
            <select class="newProduct__val" name="value<?= $row['id'];?>" id="" autocomplete="off">
                <?php
                $values=$row['values'];
                foreach($values as $val){
                    $selected='';
                    if($row['idval']==$val['id']){
                        $selected='selected';
                    } ?>
                    <option value="<?= $val['id']?>" <?php if ($selected=='selected'){echo 'selected="selected"';}?>><?= $val['val']?></option>
                <?php } ?>
            </select>
            <!--<input style="width: 400px;" type="text" name="value<?/*= $row['id'];*/?>" value="<?/*= $row['value'];*/?>">-->
            <a style="font-size: 10pt;color:blue;" href="admincategory/attrval/<?=$row['id']?>">ویرایش مقادیر پیش فرض</a>
            <input type="hidden" name="id[]" value="<?= $row['id'];?>">
        </div>
        <?php }?>
        <a class="submit__btn basket__btn" onclick="submitForm()">
            اجرای عملیات
        </a>
    </form>
</div>
</main>
<script>
    function submitForm(){
        $('form').submit();
    }
</script>
