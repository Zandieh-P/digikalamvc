<div class="slider3" style="width: 100%">
    <h3 class="yekan font-lg">
        پر بازدیدترین ها
    </h3>
    <div class="slider3__content">
        <div class="slider3__previous" style="width: 112px;">
            <span class="slider3__previous-arrow" onclick="slider3('right',this)" style="right: 47px"></span>
        </div>
        <div class="slider3__items" style="width: 976px">
            <ul>
                <?php
                $onlyInDigikala=$data['onlyInDigikala'];
                foreach ($onlyInDigikala as $row) {
                    ?>
                    <li>
                        <a class="slider3__img" href="<?= URL ?>product/index/<?= $row['id']; ?>">
                            <img src="public/images/products/<?= $row['id'] ?>/product_270x250.png" alt="onlyInDigikala"
                                 style="width: 150px">
                            <img src="<?= URL?>public/images/slider3-0.png" alt="onlyInDigikala">
                            <p class="yekan font-sm">
                                <?= $row['title'] ?>
                            </p>
                            <p class="yekan slider3__price">
                                <?= $row['price'] ?>
                            </p>
                        </a>
                    </li>
                <?php } ?>
                <!--
                                <li>
                                    <a class="slider3__img">
                                        <img src="public/images/slider3-1.png" alt="Laptop">
                                        <img src="public/images/slider3-0.png" alt="Only-in-Digikala">
                                        <p class="yekan font-sm">
                                            Lenovo B5080 -H -15 Inch Laptop
                                        </p>
                                        <p class="yekan slider3__price">
                                            12,000,000
                                        </p>
                                    </a>
                                </li>
                                <li>
                                    <a class="slider3__img">
                                        <img src="public/images/slider3-2.png" alt="Laptop">
                                        <img src="public/images/slider3-0.png" alt="Only-in-Digikala">
                                        <p class="yekan font-sm">
                                            Lenovo B5080 -H -15 Inch Laptop
                                        </p>
                                        <p class="yekan slider3__price">
                                            12,000,000
                                        </p>
                                    </a>
                                </li>
                                <li>
                                    <a class="slider3__img">
                                        <img src="public/images/slider3-3.png" alt="Laptop">
                                        <img src="public/images/slider3-0.png" alt="Only-in-Digikala">
                                        <p class="yekan font-sm">
                                            Lenovo B5080 -H -15 Inch Laptop
                                        </p>
                                        <p class="yekan slider3__price">
                                            12,000,000
                                        </p>
                                    </a>
                                </li>
                                <li>
                                    <a class="slider3__img">
                                        <img src="public/images/slider3-2.png" alt="Laptop">
                                        <img src="public/images/slider3-0.png" alt="Only-in-Digikala">
                                        <p class="yekan font-sm">
                                            Lenovo B5080 -H -15 Inch Laptop
                                        </p>
                                        <p class="yekan slider3__price">
                                            12,000,000
                                        </p>
                                    </a>
                                </li>
                                <li>
                                    <a class="slider3__img">
                                        <img src="public/images/slider3-4.png" alt="Laptop">
                                        <img src="public/images/slider3-0.png" alt="Only-in-Digikala">
                                        <p class="yekan font-sm">
                                            Lenovo B5080 -H -15 Inch Laptop
                                        </p>
                                        <p class="yekan slider3__price">
                                            12,000,000
                                        </p>
                                    </a>
                                </li>
                                <li>
                                    <a class="slider3__img">
                                        <img src="public/images/slider3-4.png" alt="Laptop">
                                        <img src="public/images/slider3-0.png" alt="Only-in-Digikala">
                                        <p class="yekan font-sm">
                                            Lenovo B5080 -H -15 Inch Laptop
                                        </p>
                                        <p class="yekan slider3__price">
                                            12,000,000
                                        </p>
                                    </a>
                                </li>
                                <li>
                                    <a class="slider3__img">
                                        <img src="public/images/slider3-4.png" alt="Laptop">
                                        <img src="public/images/slider3-0.png" alt="Only-in-Digikala">
                                        <p class="yekan font-sm">
                                            Lenovo B5080 -H -15 Inch Laptop
                                        </p>
                                        <p class="yekan slider3__price">
                                            12,000,000
                                        </p>
                                    </a>
                                </li>
                                <li>
                                    <a class="slider3__img">
                                        <img src="public/images/slider3-4.png" alt="Laptop">
                                        <img src="public/images/slider3-0.png" alt="Only-in-Digikala">
                                        <p class="yekan font-sm">
                                            Lenovo B5080 -H -15 Inch Laptop
                                        </p>
                                        <p class="yekan slider3__price">
                                            12,000,000
                                        </p>
                                    </a>
                                </li>
                -->
            </ul>
        </div>
        <div class="slider3__next" style="width: 112px">
            <span class="slider3__next-arrow" onclick="slider3('left',this)" style="right: 45px"></span>
        </div>
    </div>
</div>
<script>
    function slider3(direction, tag) {
        let marginRightNew;
        let spanTag = $(tag)
        let slider3Scroll = spanTag.parents('.slider3');
        let slider3Ul = slider3Scroll.find('.slider3__items ul');
        let slider3Items = slider3Ul.find('li');
        let slider3ItemsNumber = slider3Items.length;
        let slider3ScrollNumber = Math.ceil(slider3ItemsNumber / 4);
        let MaxNegativeMargin = -(slider3ScrollNumber - 1) * 976;
        slider3Ul.css('width', slider3ItemsNumber * 195);
        let marginRightOld = slider3Ul.css('margin-right');
        marginRightOld = parseFloat(marginRightOld);
        if (direction === 'left') {
            marginRightNew = marginRightOld - 976;
        }
        if (direction === 'right') {
            marginRightNew = marginRightOld + 976;
        }
        if (marginRightNew < MaxNegativeMargin) {
            marginRightNew = 0;
        }
        if (marginRightNew > 0) {
            marginRightNew = MaxNegativeMargin;
        }
        slider3Ul.animate({'marginRight': marginRightNew}, 900);
    }

    $('.slider3__next-arrow').click(function () {
        slider3('left');
    })
    $('.slider3__previous-arrow').click(function () {
        slider3('right');
    })
    //Slider3 is repeated from index file
</script>