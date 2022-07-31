<?php
$active = 'slider';
require('views/admin/layout.php');
$slider=[];
if (isset($data['slider'])){
    $slider = $data['slider'];
}
?>
<div class="admin_left">
    <p class="admin_left-title">
        مدیریت اسلایدشو
    </p>
    <form id="adminSliderSelectForm" action="adminslider/index/" enctype="multipart/form-data" method="post">
        <div class="adminGallerySelect">
            <span class="adminGalleryTitle">عنوان:</span>
            <input type="text" name="title">
        </div>
        <div class="adminGallerySelect">
            <span class="adminGalleryTitle">لینک:</span>
            <input type="text" name="link">
        </div>
        <div class="adminGallerySelect">
            <span class="adminGalleryTitle">انتخاب تصویر:</span>
            <input type="file" name="image">
            <a class="addProduct__btn basket__btn" onclick="submitAdminSliderSelectForm()">افروزن</a>
        </div>
    </form>
    <a class="addProduct__btn basket__btn" style="background: red;margin-left: 5px;" onclick="submitAdminSliderImageForm()">حذف</a>
    <form id="adminSliderImageForm" action="adminslider/deleteslider/" method="post">
        <table class="product_list" cellspacing="0">
            <tr>
                <td>ردیف</td>
                <td>عنوان</td>
                <td>تصویر</td>
                <td>انتخاب</td>
            </tr>
            <?php
            $i = 1;
            foreach ($slider as $row) { ?>
                <tr>
                    <td><?= $i; ?></td>
                    <td><?= $row['title']?></td>
                    <td>
                        <span class="adminGallryImage">
                        <img class="img__fit__contain" src="<?= $row['img']?>" alt="">
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