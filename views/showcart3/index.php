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
                <li class="yekan  active">
                    <span class="circle"></span>
                    <span class="line"></span>
                    <span class="title">
                            اطلاعات ارسال سفارش
                        </span>
                </li>
                <li class="yekan">
                    <span class="circle"></span>
                    <span class="line"></span>
                    <span class="title">
                            بازبینی سفارش
                        </span>
                </li>
                <li class="yekan">
                    <span class="circle"></span>
                    <span class="line"></span>
                    <span class="title">
                            اطلاعات پرداخت
                        </span>
                </li>
            </ul>
            <div class="dashed">
                <span></span>
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
        <div class="basket__head">
            <h4 class="yekan">
                سبد خرید شما در دیجیکالا
            </h4>
            <a class="yekan basket__btn" href="showcart4">ادامه خرید</a>
<!--            <span class="yekan basket__btn">ادامه خرید</span>-->
        </div>
        <div class="basket__content">
            <table cellspacing="0">
                <tr>
                    <td>شرح محصول</td>
                    <td>تعداد</td>
                    <td>قیمت واحد</td>
                    <td style="border-left: none">قیمت کل</td>
                    <td></td>
                </tr>
                <?php
                $basketInfo = '';
                if (isset($data['basketInfo'])) {
                    $basketInfo = $data['basketInfo'];
                    $basket = $basketInfo[0];
                    foreach ($basket as $row) { ?>
                        <tr>
                            <td>
                                <div class="right">
                                    <img class="img__fit__contain"
                                         src="public/images/products/<?= $row['id']; ?>/product_800x800.jpg" alt="">
                                    <!--                                    <img class="img__fit__contain" src="public/images/basket__content1.png" alt="">-->
                                </div>
                                <div class="left">
                                    <p>
                                        <?= $row['title']; ?>
                                    </p>
                                    <p>
                                        <?= $row['colorTitle']; ?>
                                    </p>
                                    <p>
                                        <?= $row['guaranteeTitle']; ?>
                                    </p>
                                </div>
                            </td>
                            <td>
                                <span class="yekan quantity__list-title">
                                    <?= $row['tedad']; ?>
                                </span>
                            </td>
                            <td>
                                <span class="yekan price"><?= $row['price']; ?></span>
                                <span class="yekan touman">تومان</span>
                            </td>
                            <td>
                                <span class="yekan price"><?= $row['tedad'] * $row['price']; ?></span>
                                <span class="yekan touman">تومان</span>
                                <br>
                                <span class="yekan price" style="color: red"><?= $row['discountTotal']; ?></span>
                                <span class="yekan touman" style="color: red">تومان</span>
                            </td>
                            <td class="close__td edit__td">
                                <a href="showcart">
                                    <i class="close__icon edit__icon"></i>
                                </a>
                            </td>
                        </tr>
                    <?php }
                } ?>

                <!--                <tr>
                                    <td>
                                        <div class="right">
                                            <img class="img__fit__contain" src="public/images/basket__content1.png" alt="">
                                        </div>
                                        <div class="left">
                                            <p>
                                                قفل فرمان مدل XYZ
                                            </p>
                                            <p>
                                                قرمز
                                            </p>
                                            <p>
                                                گارانتی یک ساله
                                            </p>
                                        </div>
                                    </td>
                                    <td>
                                        <div class="quantity__list">
                                        <span class="yekan quantity__list-title">
                                            1
                                        </span>
                                            <ul>
                                                <li class="yekan">1</li>
                                                <li class="yekan">2</li>
                                                <li class="yekan">3</li>
                                                <li class="yekan">4</li>
                                                <li class="yekan">5</li>
                                                <li class="yekan">6</li>
                                                <li class="yekan">7</li>
                                                <li class="yekan">8</li>
                                                <li class="yekan">9</li>
                                                <li class="yekan">10</li>
                                            </ul>
                                        </div>
                                    </td>
                                    <td>
                                        <span class="yekan price">10.000</span>
                                        <span class="yekan touman">تومان</span>
                                    </td>
                                    <td>
                                        <span class="yekan price">20.000</span>
                                        <span class="yekan touman">تومان</span>
                                    </td>
                                    <td class="close__td">
                                        <i class="close__icon"></i>
                                    </td>
                                </tr>-->

            </table>
        </div>
        <div id="basket__finalPrice">
            <div class="total_price">
                <span class="yekan title">جمع کل خرید شما:</span>
                <span class="yekan touman">تومان</span>
                <span class="yekan price"><?php if (isset($basketInfo[1])) {
                        echo $basketInfo[1];
                    } ?></span>
                <!--                <span class="yekan price">11.000</span>-->
            </div>
            <div class="delivery_price">
                <span class="yekan title">هزینه ارسال، بسته بندی و بیمه:</span>
                <span class="yekan touman">تومان</span>
                <span class="yekan price"><?php if (isset($data['postPrice'])) {
                        echo $data['postPrice'];
                    } ?></span>
                <!--                <span class="yekan price">11.000</span>-->
            </div>
            <div class="discount_price">
                <span class="yekan title">جمع کل مبلغ تخفیف:</span>
                <span class="yekan touman">تومان</span>
                <span class="yekan price"><?php if (isset($basketInfo[2])) {
                        echo $basketInfo[2];
                    } ?></span>
                <!--                <span class="yekan price">11.000</span>-->
            </div>
            <div class="payment">
                <span class="yekan title green">مبلغ قابل پرداخت:</span>
                <span class="yekan touman green">تومان</span>
                <span class="yekan price green"><?php if ($basketInfo[1] and $basketInfo[2] and $data['postPrice'] !== null) {
                        echo($basketInfo[1] + $data['postPrice'] - $basketInfo[2]);
                    } ?></span>
                <!--                <span class="yekan price green">11.000</span>-->
            </div>
        </div>
        <div class="basket__head">
            <h4 class="yekan">
                اطلاعات ارسال سفارش
            </h4>
        </div>

        <style>

        </style>
        <table class="review_send_info" cellspacing="0">
            <?php
            $addressInfo = '';
            if (isset($data['addressInfo'])) {
                $addressInfo = $data['addressInfo'];
            }
            ?>
            <tr>
                <td style="width: 35px">
                    <i style="background-position: -640px -155px"></i>
                </td>
                <td>
                    این سفارش به
                    <?= $addressInfo['family']; ?>
                    به آدرس
                    <?= $addressInfo['address']; ?>
                    و شماره تماس
                    <?= $addressInfo['mobile']; ?>
                    تحویل می گردد.
                </td>
            </tr>
            <tr>
                <td style="width: 35px">
                    <i style="background-position: -640px -190px"></i>
                </td>
                <td>
                    این سفارش از طریق پست
                    <?php if (isset($data['postType'])) {
                        if ($data['postType'] == 1) {
                            echo 'پیشتاز';
                        } else if ($data['postType'] == 2) {
                            echo 'سفارشی';
                        }
                    } ?>
                    (هزینه ارسال طبق تعرفه پست)
                    <?php if (isset($data['postPrice'])) {
                        echo $data['postPrice'];
                    } ?>
                    تومان، به شما تحویل داده خواهد شد.
                </td>
            </tr>
        </table>
        <a class="yekan basket__btn" href="showcart2" style="float: left; background: #ccc">ویرایش</a>
        <div style="float: left; width: 100%;margin-top: 50px">
                <a class="yekan basket__btn" href="showcart4" style="float: left">ادامه خرید</a>
<!--                <span class="yekan basket__btn" style="float: left">ادامه خرید</span>-->
        </div>
    </div>
</main>
<script>
    $('.quantity__list').click(function () {
        const ulTag = $('ul', this);
        ulTag.slideToggle(200);
    })
    $('.quantity__list ul li').click(function () {
        let text = $(this).text();
        $('.quantity__list .quantity__list-title').text(text);
    })
</script>