<main>
    <div class="main__content" style="background: #fff; padding: 5px">
        <div class="basket__head">
            <h4 class="yekan">
                سبد خرید شما در دیجیکالا
            </h4>
            <a class="yekan basket__btn" href="showcart1">
                خرید خود را نهایی کنید
            </a>

<!--            <span class="yekan basket__btn">خرید خود را نهایی کنید</span>-->

        </div>
        <div class="basket__content">
            <table cellspacing="0">
                <thead>
                <tr>
                    <td>شرح محصول</td>
                    <td>تعداد</td>
                    <td>قیمت واحد</td>
                    <td style="border- : none">قیمت کل</td>
                    <td></td>
                </tr>
                </thead>
                <tbody>
                <?php
                $basket = '';
                if (isset($data['basket'])) {
                    $basket = $data['basket'];
                }
                foreach ($basket as $row) {
                    ?>

                    <tr>
                        <td>
                            <div class="right">
                                <img class="img__fit__contain"
                                     src="<?= URL?>public/images/products/<?= $row['id']; ?>/product_800x800.jpg" alt="">
                            </div>
                            <div class="left">
                                <p>
                                    <?= $row['title']; ?>
                                    <!--                                    گوشی موبایل مدل x-->
                                </p>
                                <p>
                                    <?= $row['colorTitle']; ?>
                                    <!--                                    قرمز-->
                                </p>
                                <p>
                                    <?= $row['guaranteeTitle']; ?>
                                    <!--                                    گارانتی یک ساله-->
                                </p>
                            </div>
                        </td>
                        <td>
                            <div class="quantity__list" onclick="quantitylist(this);">
                            <span class="yekan quantity__list-title">
                                <?= $row['tedad']; ?>
                            </span>
                                <ul>
                                    <?php
                                    for ($i = 1; $i <= 10; $i++) {
                                        ?>
                                        <li class="yekan"
                                            onclick="updateBasket(<?= $i ?>,<?= $row['basketRow']; ?>)"><?= $i ?></li>
                                    <?php } ?>

                                    <!--                                    <li class="yekan">1</li>
                                                                        <li class="yekan">2</li>
                                                                        <li class="yekan">3</li>
                                                                        <li class="yekan">4</li>
                                                                        <li class="yekan">5</li>
                                                                        <li class="yekan">6</li>
                                                                        <li class="yekan">7</li>
                                                                        <li class="yekan">8</li>
                                                                        <li class="yekan">9</li>
                                                                        <li class="yekan">10</li>
                                    -->
                                </ul>
                            </div>
                        </td>
                        <td>
                            <span class="yekan price"><?= $row['price']; ?></span>
                            <span class="yekan touman">تومان</span>
                        </td>
                        <td>
                            <span class="yekan price"><?= $row['price'] * $row['tedad']; ?></span>
                            <span class="yekan touman">تومان</span>
                        </td>
                        <td class="close__td" onclick="removeBasket(<?= $row['basketRow']; ?>)">
                            <i class="close__icon"></i>
                        </td>
                    </tr>

                    <!--                    <tr>
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

                <?php } ?>
                </tbody>
            </table>
        </div>
        <div id="basket__finalPrice">
            <div class="total_price">
                <span class="yekan title">جمع کل خرید شما:</span>
                <span class="yekan touman">تومان</span>
                <span id="total_price" class="yekan price"><?= $data['priceTotalAll']; ?></span>
            </div>
            <div class="payment">
                <span class="yekan title green">مبلغ قابل پرداخت:</span>
                <span class="yekan touman green">تومان</span>
                <span id="payment" class="yekan price green"><?= $data['priceTotalAll']; ?></span>
            </div>
        </div>
        <div style="float: left; width: 100%;margin-top: 50px">

            <a class="yekan basket__btn" href="showcart1" style="float: left">خرید خود را نهایی کنید</a>

<!--            <span class="yekan basket__btn" style="float: left">انتخاب شیوه ارسال کالاها</span>-->

        </div>
    </div>
</main>
<script>

    function quantitylist(quantitidiv) {
        let ulTag = $('ul', quantitidiv);
        ulTag.slideToggle(200);
    }

    /*

    $('.quantity__list').click(function () {
        let ulTag = $('ul', this);
        ulTag.slideToggle(200);
    })
*/

    /*
        $('.quantity__list ul li').click(function () {
            let text = $(this).text();
            $('.quantity__list .quantity__list-title').text(text);
        })
    */

    function updateBasket(tedad, basketId) {
        $('.quantity__list .quantity__list-title').text(tedad);
        let url = '<?= URL?>showcart/updatebasket/';
        let data = {'basketId': basketId, 'tedad': tedad};
        $.post(url, data, function (msg) {
            let basket = msg[0];
            let priceTotalAll = msg[1];
            createBasketList(basket, priceTotalAll);
        }, 'json');
    }

    function removeBasket(basketId) {
        // let url = 'http://localhost/digikalamvc/showcart/deletebasket/' + basketId;
        let url = '<?= URL?>showcart/deletebasket/' + basketId;
        let data = {};
        $.post(url, data, function (msg) {
            let basket = msg[0];
            let priceTotalAll = msg[1];

            /*$.each(basket, function (index, value) {
                let trTag = '<tr><td><div class="right"><img class="img__fit__contain"src="public/images/products/' + value['id'] + '/product_800x800.jpg" alt=""></div><div class="left"><p>' + value['title'] + '</p><p>قرمز</p><p>گارانتی یک ساله</p></div></td><td><div class="quantity__list"><span class="yekan quantity__list-title">' + value['tedad'] + '</span><ul><li class="yekan">1</li><li class="yekan">2</li><li class="yekan">3</li><li class="yekan">4</li><li class="yekan">5</li><li class="yekan">6</li><li class="yekan">7</li><li class="yekan">8</li><li class="yekan">9</li><li class="yekan">10</li></ul></div></td><td><span class="yekan price">' + value['price'] + '</span><span class="yekan touman">تومان</span></td><td><span class="yekan price">' + value['price'] * value['tedad'] + '</span><span class="yekan touman">تومان</span></td><td class="close__td" onclick="removeBasket(' + value['basketRow'] + ')"><i class="close__icon"></i></td></tr>';
                $('table tbody').append(trTag)
            })*/

            createBasketList(basket, priceTotalAll);
            // console.log(msg);
        }, 'json');
    }

    function createBasketList(basket, priceTotalAll) {
        $('table tbody tr').remove();
        $.each(basket, function (index, value) {
            let id = value['id'];
            let title = value['title'];
            let tedad = value['tedad'];
            let price = value['price'];
            let basketRow = value['basketRow'];
            let color = value['colorTitle'];
            let guarantee = value['guaranteeTitle'];
            let trTag = '<tr><td><div class="right"><img class="img__fit__contain"src="public/images/products/' + id + '/product_800x800.jpg" alt=""></div><div class="left"><p>' + title + '</p><p>' + color + '</p><p>' + guarantee + '</p></div></td><td><div class="quantity__list" onclick="quantitylist(this);"><span class="yekan quantity__list-title">' + tedad + '</span><ul><?php for ($i = 1; $i <= 10; $i++) {?><li class="yekan" onclick="updateBasket(<?= $i ?>,' + basketRow + ')"><?= $i ?></li><?php }?></ul></div></td><td><span class="yekan price">' + price + '</span><span class="yekan touman "> تومان</span></td><td><span class="yekan price">' + price * tedad + '</span><span class="yekan touman">  تومان</span></td><td class="close__td" onclick="removeBasket(' + basketRow + ')"><i class="close__icon"></i></td></tr>';
            $('table tbody').append(trTag)
        });
        $('#total_price').text(priceTotalAll);
        $('#payment').text(priceTotalAll);
    }

</script>