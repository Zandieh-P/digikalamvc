<script src="<?= URL?>public/ckeditor/ckeditor.js"></script>
<?php
require('views/admin/layout.php');
$productInfo = [];
if (isset($data['productInfo'])) {
    $productInfo = $data['productInfo'];
}
$descriptionInfo = [];
if (isset($data['descriptionInfo'])) {
    $descriptionInfo = $data['descriptionInfo'];
}
$edit = 0;
if (isset($descriptionInfo['title'])){
    $edit=1;
}
?>
<div class="admin_left">
    <p class="admin_left-title">
        <?php
        if ($edit == 0) {
            ?>
            افزودن نقدو وبررسی
            <?php
        } else { ?>
            ویرایش نقدو وبررسی
        <?php } ?>
        <span style="color: red">(<?= @$productInfo['title']?>)</span>
    </p>
    <form action="adminproduct/adddescription/<?= @$productInfo['id']; ?>/<?= @$descriptionInfo['id']; ?>" method="post" class="addProduct__form">
        <div class="row">
            <span class="newProduct__title">عنوان نقد و بررسی:</span>
            <input style="width: 400px;" type="text" name="title" value="<?= @$descriptionInfo['title']?>">
        </div>
        <div class="row">
            <span class="newProduct__title">توضیحات:</span>
            <textarea class="editor1" id="editor1" name="description"><?= @$descriptionInfo['description']?></textarea>
        </div>
        <a class="submit__btn basket__btn" onclick="submitForm()">
            اجرای عملیات
        </a>
    </form>
</div>
<script>
    CKEDITOR.replace('editor1', {});
</script>
</main>
