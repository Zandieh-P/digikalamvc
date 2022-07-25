<?php
require('views/admin/layout.php');
$attr = [];
if (isset($data['attr'])) {
    $attr = $data['attr'];
}
$categoryInfo = [];
if (isset($data['categoryInfo'])) {
    $categoryInfo = $data['categoryInfo'];
}
$attrInfo = [];
if (isset($data['attrInfo'])) {
    $attrInfo = $data['attrInfo'];
}
?>
<div class="admin_left">
    <p class="admin_left-title">
        مدیریت ویژگی ها
        (
        <a style="color: red;" href="admincategory/showattr/<?= $categoryInfo['id']; ?>">
            دسته
            <?= $categoryInfo['title']; ?>
        </a>
        <?php
        if (isset($attrInfo['title'])) {
            ?>
            <span style="color: red;">
            - ویژگی
            <?= $attrInfo['title']; ?>
            </span>
        <?php } ?>
        )
    </p>
    <a class="addAttr__btn basket__btn" href="admincategory/addattr/<?= $categoryInfo['id'];?>/<?php if(isset($attrInfo['id'])){ echo $attrInfo['id'];} ?>">افروزن</a>
    <a class="addAttr__btn basket__btn" style="background: red;margin-left: 5px;" onclick="submitForm()">حذف</a>
    <form action="admincategory/deleteattr/<?= $categoryInfo['id'];?>/<?php if(isset($attrInfo['id'])){ echo $attrInfo['id'];} ?>" method="post">
        <table class="category_list" cellspacing="0">
            <tr>
                <td>ردیف</td>
                <td>عنوان ویژگی</td>
                <?php if (!isset($attrInfo['id'])){ ?>
                <td>مشاهده زیرویژگی ها</td>
                <?php }?>
                <td>مقادیر پیش فرض</td>
                <td>ویرایش</td>
                <td>انتخاب</td>
            </tr>
            <?php foreach ($attr as $row) { ?>
                <tr>
                    <td><?= $row['id'] ?></td>
                    <td><?= $row['title'] ?></td>
                    <?php if (!isset($attrInfo['id'])){ ?>
                    <td>
                        <a class="subCategory"
                           href="admincategory/showattr/<?= $categoryInfo['id'] ?>/<?= $row['id'] ?>">
                            <i class="subCategory_icon img__fit__contain"></i>
                        </a>
                    </td>
                    <?php }?>
                    <td>
                        <a class="subCategory" href="admincategory/attrval/<?= $row['id'] ?>">
                            <i class="subCategory_icon img__fit__contain"></i>
                        </a>
                    </td>
                    <td>
                        <a class="subCategory" href="admincategory/addattr/<?= $categoryInfo['id'];?>/<?php if(isset($attrInfo['id'])){ echo $attrInfo['id'];}?>/<?= $row['id'] ?>">
                            <i class="subCategory_icon img__fit__contain"></i>
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