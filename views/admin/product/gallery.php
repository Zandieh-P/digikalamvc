<?php
require('views/admin/layout.php');
$gallery = [];
if (isset($data['gallery'])) {
    $gallery = $data['gallery'];
}
$productInfo = [];
if (isset($data['productInfo'])) {
    $productInfo = $data['productInfo'];
}
?>
<div class="admin_left">
    <p class="admin_left-title">
        مدیریت گالری تصاویر
    </p>
    <form id="adminGallerySelectForm" action="adminproduct/gallery/<?= $productInfo['id'];?>" enctype="multipart/form-data" method="post">
            <div class="adminGallerySelect">
                <span class="adminGalleryTitle">انتخاب تصویر:</span>
                <input type="file" name="image">
                <a class="addProduct__btn basket__btn" onclick="submitAdminGallerySelectForm()">افروزن</a>
            </div>
    </form>
    <a class="addProduct__btn basket__btn" style="background: red;margin-left: 5px;" onclick="submitAdminGalleryImageForm()">حذف</a>
    <form id="adminGalleryImageForm" action="adminproduct/deletegallery/<?= $productInfo['id'];?>" method="post">
        <table class="product_list" cellspacing="0">
            <tr>
                <td>ردیف</td>
                <td>تصویر</td>
                <td>انتخاب</td>
            </tr>
            <?php
            $i = 1;
            foreach ($gallery as $row) { ?>
                <tr>
                    <td><?= $i; ?></td>
                    <td>
                        <span class="adminGallryImage">
                        <img class="img__fit__contain" src="public/images/products/<?= $row['idproduct'] ?>/gallery/small/<?= $row['img'] ?>"
                             alt="">
                        </span>
                    </td>
                    <td>
                        <input type="checkbox" name="id[]" value="<?= $row['id'] ?>">
                    </td>
                </tr>
                <?php $i++;
            } ?>
        </table>
    </form>
</div>
</div>
</main>