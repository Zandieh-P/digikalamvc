<?php
$active='category';
require('views/admin/layout.php');
$category = [];
$categoryInfo = [];
$parents = [];
if (isset($data['category'])) {
    $category = $data['category'];
}
if (isset($data['categoryInfo'])) {
    $categoryInfo = $data['categoryInfo'];
}
if (isset($data['parents'])) {
    $parents = $data['parents'];
    $parents = array_reverse($parents);
}
?>
<div class="admin_left">
    <p class="admin_left-title">
        مدیریت دسته ها
        (
        <?php
        foreach ($parents as $row) {
            ?>
            <a href="admincategory/showchildren/<?= $row['id'] ?>"><?= $row['title'] ?></a>
            -
        <?php } ?>
        <a href="admincategory/<?php if (isset($categoryInfo['id'])) {
            echo 'showchildren/' . $categoryInfo['id'];
        } else echo 'index'; ?>">
            <?php
            if (isset($categoryInfo['title'])) {
                echo $categoryInfo['title'];
            } else {
                echo 'دسته های اصلی';
            }
            ?></a>
        )
    </p>
    <a class="addCategory__btn basket__btn" href="admincategory/addcategory/<?= @$categoryInfo['id'] ?>">افروزن</a>
    <a class="addCategory__btn basket__btn" style="background: red;margin-left: 5px;" onclick="submitForm()">حذف</a>
    <form action="admincategory/deletecategory/<?= @$categoryInfo['id'] ?>" method="post">
        <table class="category_list" cellspacing="0">
            <tr>
                <td>ردیف</td>
                <td>عنوان دسته</td>
                <td>مشاهده زیردسته ها</td>
                <td>ویرایش</td>
                <td>ویژگی ها</td>
                <td>انتخاب</td>
            </tr>
            <?php foreach ($category as $row) { ?>
                <tr>
                    <td><?= $row['id'] ?></td>
                    <td><?= $row['title'] ?></td>
                    <td>
                        <a class="subCategory" href="admincategory/showchildren/<?= $row['id'] ?>">
                            <i class="subCategory_icon img__fit__contain"></i>
                        </a>
                    </td>
                    <td>
                        <a class="subCategory" href="admincategory/addcategory/<?= $row['id'] ?>/edit">
                            <i class="subCategory_icon img__fit__contain"></i>
                        </a>
                    </td>
                    <td>
                        <a class="subCategory" href="admincategory/showattr/<?= $row['id'] ?>">
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