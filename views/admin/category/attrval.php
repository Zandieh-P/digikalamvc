<?php
require('views/admin/layout.php');
$attrval = [];
$attrInfo=[];
if (isset($data['attrval'])) {
    $attrval = $data['attrval'];
}
if (isset($data['attrInfo'])) {
    $attrInfo = $data['attrInfo'];
}
?>
<div class="admin_left">
    <p class="admin_left-title">
        مقادیر پیش فرض ویژگی
        <span style="color: red">(<?php if(isset($attrInfo['title'])) {echo $attrInfo['title'];}?>)</span>
    </p>
    <form action="admincategory/attrval/<?= $attrInfo['id']?>" method="post"
          class="addProduct__form">
        <input type="hidden" name="submited">
        <?php
        foreach($attrval as $val){
            ?>
            <div class="row">
                <span class="newProduct__title">مقدار ویژگی</span>
                <input style="width: 400px;" type="text" name="attrval-<?=$val['id']?>" value="<?=$val['val'];?>">
                <!--                <input type="hidden" name="id[]" value="">-->
            </div>
        <?php } ?>

        <?php
        $size=sizeof($attrval);
        for($i=1;$i<=10-$size;$i++){
            ?>
            <div class="row">
                <span class="newProduct__title">مقدار ویژگی</span>
                <input style="width: 400px;" type="text" name="attrvalnew[]" value="">
                <!--                <input type="hidden" name="id[]" value="">-->
            </div>
        <?php } ?>
        <a class="submit__btn basket__btn" onclick="submitForm()">
            اجرای عملیات
        </a>
    </form>
</div>
</main>
<script>
    function submitForm() {
        $('form').submit();
    }
</script>
