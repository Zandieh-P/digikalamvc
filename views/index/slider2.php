<link rel="stylesheet" href="<?= URL?>public/style/flipTimer.css">
<script src="<?= URL?>public/js/jquery.flipTimer.js"></script>
<div id="slider2">
    <div class="flipTimer">
        <div class="hours"></div>
        <div class="minutes"></div>
        <div class="seconds"></div>
    </div>
    <div class="slider2__finished yekan">
        تمام شد!
    </div>
    <div id="slider2__img">
        <?php
        $slider2 = $data[1];
        foreach ($slider2 as $row) {
            ?>
            <a class="slider2__item" href="<?=URL?>product/index/<?=$row['id'];?>">
                <div class="slider2__img__right">
                    <h3 class="yekan">
                        جشنواره ماه نو
                    </h3>
                    <div class="slider2__item__price">
                        <div class="slider2__item__oldPrice yekan"><?= $row['price']?></div>
                        <div class="slider2__item__newPrice yekan"><?= $row['price_total']?> تومان</div>
                        <p class="yekan font-sm">
                            Lorem ipsum dolor.
                        </p>
                        <p class="yekan font-sm">
                            Lorem ipsum dolor sit.
                        </p>
                    </div>
                    <p class="yekan font-sm timer-title">
                        فرصت باقی مانده تا این پیشنهاد
                    </p>
                </div>
                <div class="slider2__img__left">
                    <p class="yekan">
                        <?=$row['title']?>
                    </p>
                    <div class="slider2__img__left__img">
                        <img class="img__fit__contain" src="<?= URL?>public/images/products/<?=$row['id']?>/product_270x250.png" alt="slider2-image">
                    </div>
                </div>
            </a>
            <?php
        }
        ?>
<!--
        <a class="slider2__item">
            <div class="slider2__img__right">
                <h3 class="yekan">
                    جشنواره ماه نو
                </h3>
                <div class="slider2__item__price">
                    <div class="slider2__item__oldPrice yekan">25</div>
                    <div class="slider2__item__newPrice yekan">18.5 هزار تومان</div>
                    <p class="yekan font-sm">
                        Lorem ipsum dolor.
                    </p>
                    <p class="yekan font-sm">
                        Lorem ipsum dolor sit.
                    </p>
                </div>
                <p class="yekan font-sm timer-title">
                    فرصت باقی مانده تا این پیشنهاد
                </p>
            </div>
            <div class="slider2__img__left">
                <p class="yekan">
                    هدفون توگوشی شیائومی
                </p>
                <div class="slider2__img__left__img">
                    <img class="img__fit__contain" src="public/images/slider2-1.png" alt="slider2-image">
                </div>
            </div>
        </a>
        <a class="slider2__item">
            <div class="slider2__img__right">
                <h3 class="yekan">
                    جشنواره ماه نو
                </h3>
                <div class="slider2__item__price">
                    <div class="slider2__item__oldPrice yekan">25</div>
                    <div class="slider2__item__newPrice yekan">18.5 هزار تومان</div>
                    <p class="yekan font-sm">
                        Lorem ipsum dolor.
                    </p>
                    <p class="yekan font-sm">
                        Lorem ipsum dolor sit.
                    </p>
                </div>
                <p class="yekan font-sm timer-title">
                    فرصت باقی مانده تا این پیشنهاد
                </p>
            </div>
            <div class="slider2__img__left">
                <p class="yekan">
                    گیتار آکوستیک
                </p>
                <div class="slider2__img__left__img">
                    <img class="img__fit__contain" src="public/images/slider2-2.png" alt="slider2-image">
                </div>
            </div>
        </a>
        <a class="slider2__item">
            <div class="slider2__img__right">
                <h3 class="yekan">
                    جشنواره ماه نو
                </h3>
                <div class="slider2__item__price">
                    <div class="slider2__item__oldPrice yekan">25</div>
                    <div class="slider2__item__newPrice yekan">18.5 هزار تومان</div>
                    <p class="yekan font-sm">
                        Lorem ipsum dolor.
                    </p>
                    <p class="yekan font-sm">
                        Lorem ipsum dolor sit.
                    </p>
                </div>
                <p class="yekan font-sm timer-title">
                    فرصت باقی مانده تا این پیشنهاد
                </p>
            </div>
            <div class="slider2__img__left">
                <p class="yekan">
                    Lenovo Yoga 500
                </p>
                <div class="slider2__img__left__img">
                    <img class="img__fit__contain" src="public/images/slider2-3.png" alt="slider2-image">
                </div>
            </div>
        </a>
        <a class="slider2__item">
            <div class="slider2__img__right">
                <h3 class="yekan">
                    جشنواره ماه نو
                </h3>
                <div class="slider2__item__price">
                    <div class="slider2__item__oldPrice yekan">25</div>
                    <div class="slider2__item__newPrice yekan">18.5 هزار تومان</div>
                    <p class="yekan font-sm">
                        Lorem ipsum dolor.
                    </p>
                    <p class="yekan font-sm">
                        Lorem ipsum dolor sit.
                    </p>
                </div>
                <p class="yekan font-sm timer-title">
                    فرصت باقی مانده تا این پیشنهاد
                </p>
            </div>
            <div class="slider2__img__left">
                <p class="yekan">
                    خوراک پز پیرکس
                </p>
                <div class="slider2__img__left__img">
                    <img class="img__fit__contain" src="public/images/slider2-4.png" alt="slider2-image">
                </div>
            </div>
        </a>
        <a class="slider2__item">
            <div class="slider2__img__right">
                <h3 class="yekan">
                    جشنواره ماه نو
                </h3>
                <div class="slider2__item__price">
                    <div class="slider2__item__oldPrice yekan">25</div>
                    <div class="slider2__item__newPrice yekan">18.5 هزار تومان</div>
                    <p class="yekan font-sm">
                        Lorem ipsum dolor.
                    </p>
                    <p class="yekan font-sm">
                        Lorem ipsum dolor sit.
                    </p>
                </div>
                <p class="yekan font-sm timer-title">
                    فرصت باقی مانده تا این پیشنهاد
                </p>
            </div>
            <div class="slider2__img__left">
                <p class="yekan">
                    مینی واش جنرال تکنیک
                </p>
                <div class="slider2__img__left__img">
                    <img class="img__fit__contain" src="public/images/slider2-5.png" alt="slider2-image">
                </div>
            </div>
        </a>
        <a class="slider2__item">
            <div class="slider2__img__right">
                <h3 class="yekan">
                    جشنواره ماه نو
                </h3>
                <div class="slider2__item__price">
                    <div class="slider2__item__oldPrice yekan">25</div>
                    <div class="slider2__item__newPrice yekan">18.5 هزار تومان</div>
                    <p class="yekan font-sm">
                        Lorem ipsum dolor.
                    </p>
                    <p class="yekan font-sm">
                        Lorem ipsum dolor sit.
                    </p>
                </div>
                <p class="yekan font-sm timer-title">
                    فرصت باقی مانده تا این پیشنهاد
                </p>
            </div>
            <div class="slider2__img__left">
                <p class="yekan">
                    اپیلاتور فیلیپس
                </p>
                <div class="slider2__img__left__img">
                    <img class="img__fit__contain" src="public/images/slider2-6.png" alt="slider2-image">
                </div>
            </div>
        </a>
-->
    </div>
    <div id="slider2__nav">
        <ul>
            <?php
            $slider2 = $data[1];
            $date_end = $data[2];
            foreach ($slider2 as $row) {
            ?>
                <li><span class="yekan font-sm"><?= $row['title']?></span></li>
            <?php
            }
            ?>
<!--
            <li><span class="yekan font-sm">هدفون توگوشی شیائومی</span></li>
            <li><span class="yekan font-sm">گیتار آکوستیک</span></li>
            <li><span class="yekan font-sm">Lenovo Yoga 500</span></li>
            <li><span class="yekan font-sm">خوراک پز پیرکس</span></li>
            <li><span class="yekan font-sm">مینی واش جنرال تکنیک</span></li>
            <li><span class="yekan font-sm">اپیلاتور فیلیپس</span></li>
-->
            <li><span class="yekan font-sm"><i></i>ویژه اعضای دیجی کالا</span></li>
            <li><span class="yekan font-sm"><i></i>ویژه اعضای دیجی کالا</span></li>

        </ul>
    </div>
</div>
<script>
    let slider2Tag = $('#slider2');
    let slider2Items = slider2Tag.find('.slider2__item');
    let numItems2 = slider2Items.length;
    let nextSlide2 = 1;
    let slider2Nav = $('#slider2__nav ul li');
    let timeout2 = 5000;
    let slider2Interval = setInterval(slider2, timeout2);

    function slider2() {
        if (nextSlide2 > numItems2) {
            nextSlide2 = 1;
        }
        if (nextSlide2 < 1) {
            nextSlide2 = numItems2;
        }
        slider2Items.hide();
        slider2Nav.removeClass('active');
        slider2Items.eq(nextSlide2 - 1).fadeIn(100);
        slider2Nav.eq(nextSlide2 - 1).addClass('active');
        nextSlide2++;
    }

    slider2();

    function goToIndex2(index) {
        nextSlide2 = index;
        slider2();
    }

    $('#slider2__nav li').click(function () {
        clearInterval(slider2Interval);
        const indexNum2 = $(this).index();
        goToIndex2(indexNum2 + 1);
    });
    slider2Tag.mouseleave(function () {
        clearInterval(slider2Interval);
        slider2Interval = setInterval(slider2, timeout2);
    });
    $(document).ready(function () {
        $('.flipTimer').flipTimer({
            direction: 'down',
            // date: 'May 19, 2022 16:43:00',
            date: '<?= $date_end ?>',
            callback: function () {
                $('.slider2__img__left').css('opacity', 0.4);
                $('.slider2__img__right').css('opacity', 0.4);
                $('.slider2__finished').fadeIn(200);
            }
        });
    });

    // Slider2
</script>