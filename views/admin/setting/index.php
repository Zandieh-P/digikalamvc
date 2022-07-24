<script src="public/jscolor/jscolor.js"></script>
<?php
$active = 'setting';
require('views/admin/layout.php');
$setting = Model::getOptions();
?>
<div class="admin_left">
    <p class="admin_left-title">
        مدیریت تنظیمات فروشگاه
    </p>
    <span class="addProduct__btn basket__btn" onclick="submitForm();">جرای عملیات</span>
    <form action="adminsetting/index" method="post">
        <table class="product_list" cellspacing="0">
            <tr>
                <td>کد</td>
                <td>عنوان تنظیمات</td>
                <td>مقدار پارامتر</td>
            </tr>
            <?php
            $i = 1;
            $text = '';
            foreach ($setting as $key => $value) {
                if ($key == 'special_time') {
                    $text = ('زمان پیشنهاد ویژه');
                } else if ($key == 'limit_slider') {
                    $text = ('تعداد محصولات در اسلایدرها');
                } else if ($key == 'tel') {
                    $text = ('شماره های تماس');
                } else if ($key == 'email') {
                    $text = ('ایمیل ارتباط با ما');
                } else if ($key == 'root') {
                    $text = ('روت سایت');
                } else if ($key == 'mohlatPay') {
                    $text = ('مهلت پرداخت فاکتور');
                } else if ($key == 'body_color') {
                    $text = ('رنگ بدنه سایت');
                } else if ($key == 'menu_color') {
                    $text = ('رنگ منو سایت');
                } else if ($key == 'zarinpalMID') {
                    $text = ('کد درگاه زرین پال');
                }
                ?>
                <tr>
                    <td><?= $i ?></td>
                    <td><?= $text ?></td>
                    <?php if (strpos($key, 'color') !== false) { ?>
                        <td><input type="text" name="<?= $key ?>" value="<?= $value ?>" data-jscolor="{}"></td>
                    <?php } else { ?>
                        <td><input type="text" name="<?= $key ?>" value="<?= $value ?>"></td>
                    <?php } ?>
                </tr>
                <?php $i = $i + 1;
            } ?>

            <!--<tr>
                <td><?/*= $i */?></td>
                <td>رنگ بدنه</td>
                <td><input id="body_color" class="jscolor" type="text" name="body_color" data-jscolor="{}"
                           value="#3399FF"></td>
                <?php /*$i = $i + 1; */?>
            </tr>
            <tr>
                <td><?/*= $i */?></td>
                <td>رنگ منو</td>
                <td>
                    <input id="menu_color" class="jscolor" type="text" name="menu_color" value="#3399FF">
                    <span class="addProduct__btn basket__btn"
                          style="margin-left: 5px;height: 20px;display: inline-block;float: right;line-height: 20px;margin-bottom: 0;width:50px;"
                          onclick="document.getElementById('menu_color').jscolor.show();">انتخاب</span>
                    <?php /*$i = $i + 1; */?>
                </td>
            </tr>-->

        </table>
    </form>
</div>
</div>
</main>
<script>
    function submitForm() {
        $('form').submit();
    }
</script>