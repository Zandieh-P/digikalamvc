<?php
require('views/admin/layout.php');
$products = [];
if (isset($data['product'])) {
    $products = $data['product'];
}
?>
<div class="admin_left">
    <p class="admin_left-title">
        مدیریت محصولات
    </p>
    <a class="addProduct__btn basket__btn" href="adminproduct/addproduct">افروزن</a>
    <a class="addProduct__btn basket__btn" style="background: red;margin-left: 5px;" onclick="submitForm()">حذف</a>
    <form action="adminproduct/deleteproduct" method="post">
        <table class="product_list" cellspacing="0">
            <tr>
                <td>کد</td>
                <td>عنوان</td>
                <td>قیمت</td>
                <td>تخفیف</td>
                <td>ویرایش</td>
                <td>گالری</td>
                <td>نقد</td>
                <td>ویژگی ها</td>
                <td>انتخاب</td>
            </tr>
            <?php foreach ($products as $row) { ?>
                <tr>
                    <td><?= $row['id'] ?></td>
                    <td><?= $row['title'] ?></td>
                    <td><?= $row['price'] ?></td>
                    <td><?= $row['discount'] ?></td>
                    <td>
                        <a class="subProduct" href="adminproduct/addproduct/<?= $row['id'] ?>">
                            <i class="subProduct_icon img__fit__contain"></i>
                        </a>
                    </td>
                    <td>
                        <a class="subProduct" href="adminproduct/gallery/<?= $row['id'] ?>">
                            <i class="subProduct_icon img__fit__contain"></i>
                        </a>
                    </td>
                    <td>
                        <a class="subProduct" href="adminproduct/description/<?= $row['id'] ?>">
                            <i class="subProduct_icon img__fit__contain"></i>
                        </a>
                    </td>
                    <td>
                        <a class="subProduct" href="adminproduct/attr/<?= $row['id'] ?>">
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