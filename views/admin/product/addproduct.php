<script src="<?= URL?>public/ckeditor/ckeditor.js"></script>
<?php
require('views/admin/layout.php');
$productInfo = [];
if (isset($data['productInfo'])) {
    $productInfo = $data['productInfo'];
}
$edit = 0;
if (isset($productInfo['title'])) {
    $edit = 1;
}
?>
<div class="admin_left">
    <p class="admin_left-title">
        <?php
        if ($edit == 0) {
            ?>
            ایجاد محصول جدید
            <?php
        } else { ?>
            ویرایش محصول
        <?php } ?>

    </p>
    <form action="adminproduct/addproduct/<?= @$productInfo['id']; ?>" method="post" class="addProduct__form" enctype="multipart/form-data">
        <div class="row">
            <span class="newProduct__title">عنوان محصول:</span>
            <input type="text" name="title" value="<?= @$productInfo['title']; ?>">
        </div>
        <div class="row">
            <span class="newProduct__title">دسته والد:</span>
            <select name="categoryId" autocomplete="off">
                <option>انتخاب کنید</option>
                <?php
                $category = [];
                $categoryId = @$productInfo['cat'];
                if (isset($data['category'])) {
                    $category = $data['category'];
                }
                foreach ($category as $row) {
                    if ($row['id'] == $categoryId) {
                        $selected = 'selected';
                    } else {
                        $selected = '';
                    }
                    ?>
                    <option value="<?= $row['id'] ?>" <?= $selected; ?>>
                        <?= $row['title'] ?>
                    </option>
                <?php } ?>
            </select>
        </div>
        <div class="row">
            <span class="newProduct__title">قیمت:</span>
            <input type="text" name="price" value="<?= @$productInfo['price']; ?>">
        </div>
        <div class="row">
            <span class="newProduct__title">تصویر:</span>
            <input type="file" name="image" value="">
        </div>
        <div class="row">
            <span class="newProduct__title">معرفی اجمالی:</span>
            <textarea class="editor1" id="editor1" name="introduction"><?= @$productInfo['introduction']; ?></textarea>
        </div>
        <div class="row">
            <span class="newProduct__title">تعداد موجود:</span>
            <input type="text" name="tedad_mojood" value="<?= @$productInfo['tedad_mojood']; ?>">
        </div>
        <div class="row">
            <span class="newProduct__title">میزان تخفیف(%):</span>
            <input type="text" name="discount" value="<?= @$productInfo['discount']; ?>">
        </div>
        <div class="row">
            <span class="newProduct__title">انتخاب رنگ:</span>
            <select autocomplete="off" onchange='addColor(this)'>
<!--            <select autocomplete="off">-->
                <option>انتخاب کنید</option>
                <?php
                $color = [];
                if (isset($data['color'])) {
                    $color = $data['color'];
                }
                foreach ($color as $row) { ?>
                    <option class="color__option"
                            data-hex="<?= $row['hex']; ?>"
                            value="<?= $row['id']; ?>">
                        <?= $row['title']; ?>
                    </option>

                    <!--<option class="color__option"
                            value="<?/*= $row['id']; */?>"
                            data-title="<?/*= $row['title']; */?>"
                            onclick='addColor(this,"<?/*= $row['id']; */?>","<?/*= $row['hex']; */?>")'>
                        <?/*= $row['title']; */?>
                    </option>-->

                <?php } ?>
            </select>
            <?php
            $colorInfo = [];
            if (isset($productInfo['colorsInfo'])) {
                $colorInfo = $productInfo['colorsInfo'];
            }
            $colorInfo=array_filter($colorInfo);
            foreach ($colorInfo as $row) {
                ?>
                <span style="background:<?= $row['hex']; ?>" class="newProduct__spanItem">
                    <input type="hidden" name="color[]" value="<?= $row['id']; ?>">
                    <?= $row['title']; ?>
                    <i onclick="removeItem(this)"></i>
                </span>
            <?php } ?>

            <!--<span class="newProduct__spanItem"><input type="hidden" name="color[]" value="">colorName<i
                        onclick="removeItem(this)"></i></span>-->

        </div>
        <div class="row">
            <span class="newProduct__title">انتخاب گارانتی:</span>
            <select autocomplete="off" onchange="addGuarantee(this)">
<!--            <select autocomplete="off">-->
                <option>انتخاب کنید</option>
                <?php
                $guarantee = [];
                if (isset($data['guarantee'])) {
                    $guarantee = $data['guarantee'];
                }
                foreach ($guarantee as $row) { ?>
                    <option class="guarantee__option"
                            value="<?= $row['id']; ?>">
                        <?= $row['title']; ?>
                    </option>

                    <!--<option class="guarantee__option"
                            data-title="<?/*= $row['title']; */?>"
                            onclick='addGuarantee(this,"<?/*= $row['id']; */?>")'
                            value="<?/*= $row['id']; */?>">
                        <?/*= $row['title']; */?>
                    </option>-->

                <?php } ?>
            </select>
            <?php
            $guaranteeInfo = [];
            if (isset($productInfo['guaranteeInfo'])) {
                $guaranteeInfo = $productInfo['guaranteeInfo'];
            }
            $guaranteeInfo=array_filter($guaranteeInfo);
            foreach ($guaranteeInfo as $row) {
                ?>
                <span class="newProduct__spanItem"><input type="hidden" name="guarantee[]"
                                                          value="<?= $row['id']; ?>"><?= $row['title']; ?><i
                            onclick="removeItem(this)"></i></span>
            <?php } ?>
            
            <!--<span class="newProduct__spanItem"><input type="hidden" name="guarantee[]" value="">guaranteeName<i
                        onclick="removeItem(this)"></i></span>-->

        </div>
        <a class="submit__btn basket__btn" onclick="submitForm()">
            اجرای عملیات
        </a>
    </form>
</div>
<script>
    function addColor(tag) {
        let selectTag = $(tag);
        let colorName = selectTag.find('option:selected').text();
        let spanTag = '<span style="background: ' + selectTag.find('option:selected').attr('data-hex') + '" class="newProduct__spanItem"><input type="hidden" name="color[]" value="' + selectTag.val() + '">' + colorName + '<i onclick="removeItem(this)"></i></span>';
        let divRow = selectTag.parents('.row');
        divRow.append(spanTag);
    }

    /*function addColor(tag, colorId, colorCode) {
        let optionTag = $(tag);
        let colorName = optionTag.attr('data-title');
        let spanTag = '<span style="background: ' + colorCode + '" class="newProduct__spanItem"><input type="hidden" name="color[]" value="' + colorId + '">' + colorName + '<i onclick="removeItem(this)"></i></span>';
        let divRow = optionTag.parents('.row');
        divRow.append(spanTag);
    }*/

    function addGuarantee(tag) {
        let selectTag = $(tag);
        let guaranteeName = selectTag.find('option:selected').text()
        let spanTag = '<span class="newProduct__spanItem"><input type="hidden" name="guarantee[]" value="' + selectTag.val() + '">' + guaranteeName + '<i onclick="removeItem(this)"></i></span>';
        let divRow = selectTag.parents('.row');
        divRow.append(spanTag);
    }

    /*function addGuarantee(tag, guaranteeId) {
        let optionTag = $(tag);
        let guaranteeName = optionTag.attr('data-title');
        let spanTag = '<span class="newProduct__spanItem"><input type="hidden" name="guarantee[]" value="' + guaranteeId + '">' + guaranteeName + '<i onclick="removeItem(this)"></i></span>';
        let divRow = optionTag.parents('.row');
        divRow.append(spanTag);
    }*/

    function removeItem(tag) {
        let removeTag = $(tag);
        let spanItem = removeTag.parents('.newProduct__spanItem');
        spanItem.remove();
    }

    /*
    let colorOption = $('.color__option');
    $(document).on('click', colorOption,function addColor(colorName,tag,colorId,colorCode){
        let optionTag=$(tag);
        let spanTag='<span style="background: '+colorCode+'" class="newProduct__color"><input name="color[]" value="'+colorId+'">'+colorName+'<i></i></span>';
        let divRow=optionTag.parents('.row');
        divRow.append(spanTag);
    })

    $(document).on('event', 'selector',function (){})
    <HTML -> select> events: (oninput=""), (onchange=""), (onclick="")
        */


    CKEDITOR.replace('editor1', {});
</script>
</main>
