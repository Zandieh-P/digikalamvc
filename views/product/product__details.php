<div id="product__details">
    <div class="product__details-right">
        <div class="details-share">
            <i class="share_social"></i>
            <i class="share_favorites"></i>
        </div>
        <div class="details-gallery">
            <div class="details-gallery-img">
                <img id="details-gallery-img" class="img__fit__contain"
                     src="<?= URL?>public/images/products/<?= $productInfo['id'] ?>/product_800x800.jpg"
                     data-zoom-image="public/images/products/<?= $productInfo['id'] ?>/product_2400x2400.jpg">
                <!--                <img id="details-gallery-img" class="img__fit__contain"
                                     src="public/images/details-gallery/small/details-gallery2.jpg"
                                     data-zoom-image="public/images/details-gallery/large/details-gallery2.jpg">
                -->            </div>
            <ul>
                <?php
                $detailsGallery = $data['detailsGallery'];
                $lastIndex = 0;
                foreach ($detailsGallery as $row) {
                    $lastIndex = $lastIndex + 1;
                    ?>
                    <li data-main-image="public/images/products/<?= $row['idproduct'] ?>/gallery/large/<?= $row['img'] ?>"
                        data-last-index="<?= $lastIndex ?>">
                        <img class="img__fit__contain"
                             src="<?= URL?>public/images/products/<?= $row['idproduct'] ?>/gallery/small/<?= $row['img'] ?>"
                             alt="">
                    </li>
                <?php } ?>
                <!--
                                <li data-main-image="public/images/details-gallery/small/details-gallery2%20(1).jpg">
                                    <img class="img__fit__contain"
                                         src="public/images/details-gallery/small/details-gallery2%20(1).jpg"
                                         alt="">
                                </li>
                                <li data-main-image="public/images/details-gallery/small/details-gallery2%20(2).jpg">
                                    <img class="img__fit__contain"
                                         src="public/images/details-gallery/small/details-gallery2%20(2).jpg"
                                         alt="">
                                </li>
                                <li data-main-image="public/images/details-gallery/small/details-gallery2%20(3).jpg">
                                    <img class="img__fit__contain"
                                         src="public/images/details-gallery/small/details-gallery2%20(3).jpg"
                                         alt="">
                                </li>
                                <li data-main-image="public/images/details-gallery/small/details-gallery2%20(4).jpg">
                                    <img class="img__fit__contain"
                                         src="public/images/details-gallery/small/details-gallery2%20(4).jpg"
                                         alt="">
                                </li>
                -->
                <li data-main-image="public/images/products/details-gallery-last.png"
                    data-last-index="<?= $lastIndex ?>">
                    <img class="img__fit__contain" src="<?= URL?>public/images/products/details-gallery-last.png"
                         alt="">
                </li>
            </ul>
        </div>
    </div>
    <div class="product__details-left">
        <div class="details-title yekan">
            <?= $productInfo['title'] ?>
            <!--            گوشی موبایل مدل XYZ-->
            <div class="search__products-rank" style="float: left;margin-left: 15px;">
                <div class="rank__grayStar">
                    <div class="rank__redStar"></div>
                </div>
                <div class="yekan rank__text">
                    4 رای از 85 رای
                </div>
            </div>
        </div>
        <div class="details__left-rightCol">
            <h4 class="yekan">انتخاب رنگ</h4>
            <ul class="details__colors">
                <?php
                $all_colors = $productInfo['all_colors'];
                foreach ($all_colors as $color) {
                    ?>
                    <li class="yekan">
                        <span data-colorId="<?= $color['id']; ?>" class="details__colors__circle"
                              style="background: <?= $color['hex']; ?>"></span>
                        <?= $color['title']; ?>
                    </li>
                <?php }
                ?>

                <!--
                                <li class="yekan">
                                    <span class="details__colors__circle" style="background: black"></span>
                                    مشکی
                                </li>
                                <li class="yekan">
                                    <span class="details__colors__circle" style="background: white"></span>
                                    سفید
                                </li>
                -->

            </ul>
            <h4 class="yekan">
                انتخاب گارانتی
            </h4>
            <div id="guarantee__list">
                        <span class="yekan guarantee__list-title">
                            لیست گارانتی های موجود
                        </span>
                <ul>
                    <?php
                    foreach ($productInfo['all_guarantees'] as $guarantee) {
                        ?>
                        <li class="yekan" data-guaranteeId="<?= $guarantee['id'] ?>">
                            <?= $guarantee['title'] ?>
                        </li>

                    <?php } ?>

                    <!--
                                        <li class="yekan">
                                            ۱۸ ماه گارانتی هما تلکام رنگ اصلی مشکی دور قرمز
                                        </li>
                                        <li class="yekan">
                                            ۱۸ ماه گارانتی هما تلکام رنگ آبی بنفش
                                        </li>
                                        <li class="yekan">
                                            ۱۸ ماه گارانتی هما تلکام رنگ آبی بنفش
                                        </li>
                                        <li class="yekan">
                                            ۱۸ ماه گارانتی هما تلکام رنگ آبی بنفش
                                        </li>
                                        <li class="yekan">
                                            ۱۸ ماه گارانتی هما تلکام رنگ آبی بنفش
                                        </li>
                    -->

                </ul>
            </div>
            <div id="product__price__last">
                        <span class="yekan" style="font-size: 9pt">
                            قیمت
                        </span>
                <span class="yekan" style="font-size: 11pt;text-decoration: line-through">
                            <?= $productInfo['price'] ?>
                        </span>
                <span class="yekan" style="font-size: 9pt">
                            تومان
                        </span>
                <span class="price__discount">
                            <span class="yekan price__discount-right">
                                تخفیف
                            </span>
                            <span class="yekan price__discount-left">
                                <?= $productInfo['price_discount'] ?>
                                تومان
                            </span>

                        </span>
            </div>
            <div id="product__price__new">
                        <span class="yekan" style="font-size: 12.5pt">
                            قیمت برای شما:
                        </span>
                <span class="yekan" style="font-size: 13.5pt;color: green">
                            <?= $productInfo['price_total'] ?>
                        </span>
                <span class="yekan" style="font-size: 12.5pt;color: green">
                            تومان
                        </span>
            </div>
            <div id="product__compare">
                        <span class="yekan compare__btn">
                            مقایسه کن
                        </span>
                <span class="yekan addToCart__btn" onclick="addtobasket('<?= $productInfo['id'] ?>')">
                            <i class="img__fit__contain"></i>
                            افزودن به سبد
                        </span>
            </div>
        </div>
        <div class="details__left-leftCol">
        </div>
        <div class="horizontal__line" style="display: inline-block; width: 100%;margin: 15px auto"></div>
        <div id="product__features">
            <ul>
                <li>
                    <a class="yekan">
                        <i id="product__feature1"></i>
                        7 روز ضمانت بازگشت
                    </a>
                </li>
                <li>
                    <a class="yekan">
                        <i id="product__feature2"></i>
                        پرداخت در محل
                    </a>
                </li>
                <li>
                    <a class="yekan">
                        <i id="product__feature3"></i>
                        ضمانت اصل بودن کالا
                    </a>
                </li>
                <li>
                    <a class="yekan">
                        <i id="product__feature4"></i>
                        تحویل اکسپری
                    </a>
                </li>
                <li>
                    <a class="yekan">
                        <i id="product__feature5"></i>
                        تضمین بهترین قیمت
                    </a>
                </li>
            </ul>
        </div>
    </div>
</div>
<script>
    $('.details__colors li').click(function () {
        $('.details__colors__circle').removeClass('active');
        $('.details__colors__circle', this).toggleClass('active');
    })

    $('#guarantee__list').click(function () {
        const ulTag = $('ul', this);
        ulTag.slideToggle(200);
    })

    let guarantee_selected = '';
    $('#guarantee__list ul li').click(function () {
        guarantee_selected = $(this).attr('data-guaranteeId');
        let text = $(this).text();
        $('#guarantee__list .guarantee__list-title').text(text);

    })

    function addtobasket(productId) {
        let color = $('.details__colors').find('.details__colors__circle.active').attr('data-colorId');
        if(typeof color == 'undefined'){color = 0;}
        let url = '<?= URL?>product/addtobasket/' + productId + '/' + color + '/' + guarantee_selected;
        // let url='http://localhost/digikalamvc/product/addtobasket/'+productId;
        let data = {};
        //AJAX_$.post_Format: $(selector).post(URL,data,function (data,status,xhr){},dataType);
        $.post(url, data, function (msg) {
            alert("محصول به سبد خرید اضافه گردید")
        });
    }
</script>