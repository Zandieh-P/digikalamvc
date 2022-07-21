<?php
require('views/admin/layout.php');
$description = [];
if (isset($data['description'])) {
    $description = $data['description'];
}
$productInfo = [];
if (isset($data['productInfo'])) {
    $productInfo = $data['productInfo'];
}
?>
<div class="admin_left">
    <p class="admin_left-title">
        <a>مدیریت نقد و بررسی</a>
        <span style="color: red">(<?= @$productInfo['title']?>)</span>
    </p>
    <a class="addProduct__btn basket__btn" href="adminproduct/adddescription/<?= @$productInfo['id']?>">افروزن</a>
    <a class="addProduct__btn basket__btn" style="background: red;margin-left: 5px;" onclick="submitForm()">حذف</a>
    <form action="adminproduct/deletedescription/<?= @$productInfo['id']?>" method="post">
        <table class="product_list" cellspacing="0">
            <tr>
                <td>عنوان</td>
                <td>ویرایش</td>
                <td>انتخاب</td>
            </tr>
            <?php foreach ($description as $row) { ?>
                <tr>
                    <td><?= $row['title'] ?></td>
                    <td>
                        <a class="subProduct" href="adminproduct/adddescription/<?= $row['idproduct']?>/<?= $row['id']?>">
                            <i class="subProduct_icon img__fit__contain"></i>
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