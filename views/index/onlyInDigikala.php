<div class="slider3">
    <h3 class="yekan font-lg">
        فقط در دیجیکالا
    </h3>
    <div class="slider3__content">
        <div class="slider3__previous">
            <span class="slider3__previous-arrow" onclick="slider3('right',this)"></span>
        </div>
        <div class="slider3__items">
            <ul>
                <?php
                $onlyInDigikala = $data[3];
                foreach ($onlyInDigikala as $row) {
                    ?>
                    <li>
                        <a class="slider3__img" href="<?=URL?>product/index/<?=$row['id'];?>">
                            <img src="public/images/products/<?=$row['id']?>/product_270x250.png" alt="onlyInDigikala" style="width: 150px">
                            <img src="public/images/slider3-0.png" alt="onlyInDigikala">
                            <p class="yekan font-sm">
                                <?= $row['title']?>
                            </p>
                            <p class="yekan slider3__price">
                                <?= $row['price']?>
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
-->
            </ul>
        </div>
        <div class="slider3__next">
            <span class="slider3__next-arrow" onclick="slider3('left',this)"></span>
        </div>
    </div>
</div>