<?php
require('views/admin/layout.php');
?>
<div class="admin_left">
    <p class="admin_left-title">
        <?php
        $attr = [];
        $attrId = '';
        $parentId = '';
        $edit = 0;
        $editInfo = '';
        $attrInfo = [];
        $categoryInfo = [];
        if (isset($data['attr'])) {
            $attr = $data['attr'];
        }
        if (isset($data['attrId'])) {
            $attrId = $data['attrId'];
        }
        if (isset($data['parentId'])) {
            $parentId = $data['parentId'];
        }
        if (isset($data['editInfo'])) {
            $editInfo = $data['editInfo'];
            if($editInfo!=''){
                $edit=1;
            }
        }
        if (isset($data['attrInfo'])) {
            $attrInfo = $data['attrInfo'];
        }
        if (isset($data['categoryInfo'])) {
            $categoryInfo = $data['categoryInfo'];
        }
        if ($edit == 0) {
            ?>
            ایجاد ویژگی جدید
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
            <?php
        } else {
            ?>
            ویرایش ویژگی
            (
            <a style="color: red;" href="admincategory/showattr/<?= $categoryInfo['id']; ?>">
                دسته
                <?= $categoryInfo['title']; ?>
            </a>
            )
        <?php } ?>
    </p>
    <form action="admincategory/addattr/<?= $categoryInfo['id']; ?>/<?= $parentId ?>/<?php if(isset($editInfo['id'])){ echo $editInfo['id'];} ?>"
          method="post" class="addAttr__form">
        <div class="row">
            <span class="newAttr__title">عنوان ویژگی:</span>
            <input type="text" name="title" value="<?php if ($edit == 0) {
            } else {
                echo $editInfo['title'];
            } ?>">
        </div>
        <div class="row">
            <span class="newCategory__title">ویژگی والد:</span>
            <select name="parent" autocomplete="off">
                <option>انتخاب کنید</option>
                <?php
                if ($edit == 0) {
                    $selectedId = $parentId;
                } else {
                    $selectedId = $editInfo['parent'];
                }
                foreach ($attr as $row) {
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