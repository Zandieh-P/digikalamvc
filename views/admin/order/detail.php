<?php
require('views/admin/layout.php');
$orderInfo = '';
$order_status = [];
$basket = [];
$time_sabt = time();
if (isset($data['orderInfo'])) {
    $orderInfo = $data['orderInfo'];
    $basket = @unserialize($orderInfo['basket']);
    $time_sabt = $orderInfo['time_sabt'];
}
if (isset($data['order_status'])) {
    $order_status = $data['order_status'];
}
$gozashte = time() - $time_sabt;
$mohlat = mohlatPay * 3600;
?>
<div class="admin_left">
    <p class="admin_left-title">
        جزئیات سفارش کد:
        <?= $orderInfo['id'] ?>
        <a href="adminorder/showfactor/<?= $orderInfo['id'] ?>" class="basket__btn" style="float:left;">مشاهده
            فاکتور</a>
        <span class="basket__btn" onclick="showFactor(<?= $orderInfo['id'] ?>);"
              style="float:left;">مشاهده فاکتور</span>
    </p>
    <?php
    if ($gozashte > $mohlat) { ?>
        <div class="checkout__error checkout__row">
            <p class="yekan error">این سفارش منقضی شده است، حد اکثر مهلت پرداخت برابر <?= mohlatPay ?> ساعت می باشد.</p>
        </div>
    <?php } ?>

    <form action="adminorder/editorder/<?= $orderInfo['id'] ?>" method="post">
        <table id="checkout__products" cellspacing="0">
            <tr>
                <td>نام محصول</td>
                <td>رنگ</td>
                <td>گارانتی</td>
                <td>تعداد</td>
                <td>قیمت</td>
                <td>تخفیف</td>
            </tr>
            <?php
            foreach ($basket as $row) { ?>
                <tr>
                    <td><?= $row['title']; ?></td>
                    <td><?= $row['colorTitle']; ?></td>
                    <td><?= $row['guaranteeTitle']; ?></td>
                    <td><?= $row['tedad']; ?></td>
                    <td><?= $row['price'] * $row['tedad']; ?> تومان</td>
                    <td><?= (($row['discount'] * $row['price']) / 100) * $row['tedad']; ?> تومان</td>
                </tr>
            <?php } ?>
        </table>
        <div class="checkout__row">
            <p>
                <?php
                if (isset($orderInfo['pay'])) { ?>
                    وضعیت پرداخت:
                    <select name="pay__status">
                        <option value="0" <?php if ($orderInfo['pay'] == 0) {
                            echo 'selected="selected"';
                        } ?>>در انتظار پرداخت
                        </option>
                        <option value="1" <?php if ($orderInfo['pay'] == 1) {
                            echo 'selected="selected"';
                        } ?>>پرداخت شده
                        </option>
                    </select>
                <?php } ?>
            </p>
            <p>
                <?php
                if (isset($order_status)) { ?>
                    وضعیت سفارش:
                    <select name="order__status">
                        <?php
                        foreach ($order_status as $status) { ?>
                            <option value="<?= $status['id']; ?>" <?php if ($orderInfo['status'] == $status['id']) {
                                echo 'selected="selected"';
                            } ?>><?= $status['title']; ?></option>
                        <?php } ?>
                    </select>
                <?php } ?>
            </p>
            <p>
                <?php if (isset($orderInfo['postType'])) { ?>
                    نوع ارسال:
                    <?php echo $orderInfo['postTitle'];
                } ?>
            </p>
            <p>
                <?php if (isset($orderInfo['postType'])) { ?>
                    شیوه پرداخت:
                    <?php echo $orderInfo['payTypeTitle'];
                } ?>
            </p>
            <p>
                <?php
                if (isset($orderInfo['beforePay_reservation'])) { ?>
                    شماره خرید:
                    <?= $orderInfo['beforePay_reservation'];
                } ?>
            </p>
            <p>
                <?php
                if ($orderInfo['pay'] == 0 and $gozashte <= $mohlat) { ?>
                    <a class="yekan basket__btn" style="display: inline-block;"
                       href="checkout/payonline/<?php if (isset($orderInfo['id'])) {
                           echo($orderInfo['id']);
                       } ?>">پرداخت آنلاین</a>
                    <a class="yekan basket__btn" style="display: inline-block;"
                       href="checkout/creditcard/<?php if (isset($orderInfo['id'])) {
                           echo($orderInfo['id']);
                       } ?>">پرداخت با کارت</a>
                <?php } ?>
            </p>
        </div>
        <table id="checkout__addressinfo" cellspacing="0">
            <tr>
                <td>گیرنده</td>
                <td>آدرس</td>
                <td>شهر</td>
                <td>کد پستی</td>
                <td>موبایل</td>
                <td>تلفن ثابت</td>
            </tr>
            <tr>
                <td><?php if (isset($orderInfo['family'])) {
                        echo $orderInfo['family'];
                    } ?></td>
                <td><input name="address" type="text" value="<?php if (isset($orderInfo['address'])) {
                        echo $orderInfo['address'];
                    } ?>"></td>
                <td><?php if (isset($orderInfo['city'])) {
                        echo $orderInfo['city'];
                    } ?></td>
                <td><input name="postalcode" type="text" value="<?php if (isset($orderInfo['postalcode'])) {
                        echo $orderInfo['postalcode'];
                    } ?>"></td>
                <td><?php if (isset($orderInfo['mobile'])) {
                        echo $orderInfo['mobile'];
                    } ?></td>
                <td><input name="tel" type="text" value="<?php if (isset($orderInfo['tel'])) {
                        echo $orderInfo['tel'];
                    } ?>"></td>
            </tr>
        </table>
        <div class="checkout__row">
            <span class="basket__btn" onclick="submitForm()">ذخیره اطلاعات</span>
        </div>
    </form>
</div>
</div>
</main>

<script>
    function submitForm() {
        $('form').submit();
    }

    function showFactor(orderId) {
        let url = '<?= URL?>adminorder/showfactor/' + orderId;
        $(location).attr('href', url);
    }
</script>