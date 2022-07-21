<main>
    <div class="main__content" style="background: #fff; padding: 5px">
        <div class="showcart__order__steps">
            <div class="dashed active">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
            </div>
            <ul>
                <li class="yekan active">
                    <span class="circle"></span>
                    <span class="line"></span>
                    <span class="title">
                            ورود یه دیجی کالا
                        </span>
                </li>
                <li class="yekan active">
                    <span class="circle"></span>
                    <span class="line"></span>
                    <span class="title">
                            اطلاعات ارسال سفارش
                        </span>
                </li>
                <li class="yekan active">
                    <span class="circle"></span>
                    <span class="line"></span>
                    <span class="title">
                            بازبینی سفارش
                        </span>
                </li>
                <li class="yekan  active">
                    <span class="circle"></span>
                    <span class="line"></span>
                    <span class="title">
                            اطلاعات پرداخت
                        </span>
                </li>
            </ul>
            <div class="dashed active">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
        <?php
        $orderInfo = '';
        $basket = [];
        $time_sabt=time();
        if (isset($data['orderInfo'])) {
            $orderInfo = $data['orderInfo'];
            $basket = @unserialize($orderInfo['basket']);
            $time_sabt=$orderInfo['time_sabt'];
        }
        $gozashte=time()-$time_sabt;
        $mohlat=mohlatPay*3600;


        if ($gozashte>$mohlat){ ?>
            <div class="checkout__error checkout__row">
                <p class="yekan error">این سفارش منقضی شده است، حد اکثر مهلت پرداخت برابر <?= mohlatPay ?> ساعت می باشد.</p>
            </div>
        <?php }?>

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
                    <?php
                    if ($orderInfo['pay'] == 1) {
                        echo 'پرداخت شده';
                    } else {
                        echo 'در انتظار پرداخت';
                    }
                }
                ?>
            </p>
            <p>
                <?php if (isset($orderInfo['postType'])) { ?>
                    نوع ارسال:
                    <?php
                    if ($orderInfo['postType'] == 1) {
                        echo 'پست پیشتاز';
                    } else if ($orderInfo['postType'] == 2) {
                        echo 'پست سفارشی';
                    }
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
                if ($orderInfo['pay'] == 0 and  $gozashte<=$mohlat) { ?>
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
                <td><?php if (isset($orderInfo['address'])) {
                        echo $orderInfo['address'];
                    } ?></td>
                <td><?php if (isset($orderInfo['city'])) {
                        echo $orderInfo['city'];
                    } ?></td>
                <td><?php if (isset($orderInfo['postalcode'])) {
                        echo $orderInfo['postalcode'];
                    } ?></td>
                <td><?php if (isset($orderInfo['mobile'])) {
                        echo $orderInfo['mobile'];
                    } ?></td>
                <td><?php if (isset($orderInfo['tel'])) {
                        echo $orderInfo['tel'];
                    } ?></td>
            </tr>
        </table>

    </div>
</main>