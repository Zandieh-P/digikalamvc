<?php
require('views/admin/layout.php');
?>
<div class="admin_left">
    <p class="admin_left-title">
        <?php
        $category = [];
        $categoryId = '';
        $edit = '';
        $categoryInfo = [];
        if (isset($data['category'])) {
            $category = $data['category'];
        }
        if (isset($data['categoryId'])) {
            $categoryId = $data['categoryId'];
        }
        if (isset($data['edit'])) {
            $edit = $data['edit'];
        }
        if (isset($data['categoryInfo'])) {
            $categoryInfo = $data['categoryInfo'];
        }
        if ($edit == '') {
            ?>
            ایجاد دسته جدید
            <?php
        } else {
            ?>
            ویرایش دسته
        <?php } ?>
    </p>
    <form action="admincategory/addcategory/<?php if(isset($categoryInfo['id'])){ echo $categoryInfo['id'];}?>/<?= $edit;?>" method="post" class="addCategory__form">
        <div class="row">
            <span class="newCategory__title">عنوان دسته:</span>
            <input type="text" name="title" value="<?php if($edit==''){}else{echo $categoryInfo['title'];}?>">
        </div>
        <div class="row">
            <span class="newCategory__title">دسته والد:</span>
            <select name="parent" autocomplete="off">
                <option>انتخاب کنید</option>
                <?php
                if($edit==''){
                    $selectedId=$categoryId;
                }else{
                    $selectedId=$categoryInfo['parent'];
                }
                foreach ($category as $row) {
                    if ($row['id'] == $selectedId) {
                        $x = 'selected';
                    } else {
                        $x = '';
                    }
                    ?>
                    <option value="<?= $row['id'] ?>" <?= $x ?>><?= $row['title'] ?></option>
                <?php } ?>
            </select>
        </div>
        <a class="submit__btn basket__btn" onclick="submitForm()">
            اجرای عملیات
        </a>
    </form>
</div>
</main>