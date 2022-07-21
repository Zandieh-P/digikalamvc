<div id="slider">
    <div class="slider__arrow" id="next-arrow">
        <img class="img__fit__contain" src="<?= URL?>public/images/sliderArrowLeft.png" alt="slider1-prev">
    </div>
    <div class="slider__arrow" id="previous-arrow">
        <img class="img__fit__contain" src="<?= URL?>public/images/sliderArrowRight.png" alt="slider1-next">
    </div>
    <div id="slider__img">
        <?php
        $slider1=$data[0];
        foreach ($slider1 as $row) {
            ?>
            <a class="slider__item" href="<?= $row['link'] ?>">
                <img class="img__fit__contain" src="<?= $row['img'] ?>" alt="slider1-image">
            </a>
            <?php
        }
        ?>
        <!--<a class="slider__item"><img class="img__fit__contain" src="public/images/slider1-1.png"
                                     alt="slider1-image"></a>
        <a class="slider__item"><img class="img__fit__contain" src="public/images/slider1-2.png"
                                     alt="slider1-image"></a>
        <a class="slider__item"><img class="img__fit__contain" src="public/images/slider1-3.png"
                                     alt="slider1-image"></a>
        <a class="slider__item"><img class="img__fit__contain" src="public/images/slider1-4.png"
                                     alt="slider1-image"></a>
        <a class="slider__item"><img class="img__fit__contain" src="public/images/slider1-5.png"
                                     alt="slider1-image"></a>-->
    </div>
    <div id="slider__nav">
        <ul>
            <li>
                        <span class="yekan font-sm">
                            محصولات آب و آفتاب
                        </span>
            </li>
            <li>
                        <span class="yekan font-sm">
                            سری جدید Vaio
                        </span>
            </li>
            <li>
                        <span class="yekan font-sm">
                            فروش ویژه هندزفری
                        </span>
            </li>
            <li>
                        <span class="yekan font-sm">
                            اسپیکرهای قابل حمل
                        </span>
            </li>
            <li>
                        <span class="yekan font-sm">
                            اسباب بازی تابستانه
                        </span>
            </li>
        </ul>
    </div>
</div>
<script>
    let sliderTag = $('#slider');
    let sliderItems = sliderTag.find('.slider__item');
    let numItems = sliderItems.length;
    let nextSlide = 1;
    let sliderNav = $('#slider__nav ul li');
    let timeout = 5000;
    let sliderInterval = setInterval(slider, timeout);

    function slider() {
        if (nextSlide > numItems) {
            nextSlide = 1;
        }
        if (nextSlide < 1) {
            nextSlide = numItems;
        }
        sliderItems.hide();
        sliderNav.removeClass('active');
        sliderItems.eq(nextSlide - 1).fadeIn(100);
        sliderNav.eq(nextSlide - 1).addClass('active');
        nextSlide++;
    }

    slider();

    function goToNext() {
        slider();
    }

    function goToPrevious() {
        nextSlide = nextSlide - 2;
        slider();
    }

    function goToIndex(index) {
        nextSlide = index;
        slider();
    }

    $('#next-arrow').click(function () {
        clearInterval(sliderInterval);
        goToNext();
    });
    $('#previous-arrow').click(function () {
        clearInterval(sliderInterval);
        goToPrevious();
    });
    $('#slider__nav li').hover(function () {
        clearInterval(sliderInterval);
        const indexNum = $(this).index();
        goToIndex(indexNum + 1);
    }, function () {
    });
    sliderTag.mouseleave(function () {
        clearInterval(sliderInterval);
        sliderInterval = setInterval(slider, timeout);
    });
    // Slider1
</script>