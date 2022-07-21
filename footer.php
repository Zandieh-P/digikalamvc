<?php
$option=Model::getOptions();
?>
<footer>
    <div id="footer__top">
        <div class="main">
            <p class="yekan font-lg">7 روز هفته، 24 ساعته پاسخگوی شما هستیم.</p>
            <ul>
                <li>
                    <a class="yekan font-lg">
                        <?= $option['tel'] ?>
<!--                        021-9999993840559-->
                        <i style="background-position: -312px -340px"></i>
                    </a>
                </li>
                <li>
                    <a class="yekan font-lg">
                        سوالات متداول
                        <i style="background-position: -284px -340px"></i>
                    </a>
                </li>
                <li>
                    <a class="yekan font-lg">
                        <?= $option['email'] ?>
<!--                        info@digikala.com-->
                        <i style="background-position: -250px -340px"></i>
                    </a>
                </li>
            </ul>
        </div>
    </div>
    <div id="footer__bottom">
        <div class="main">
            <div class="right">
                <ul>
                    <li><a class="title">راهنمای خرید از دیجی کالا</a></li>
                    <li><a>ثبت سفارش</a></li>
                    <li><a>شیوه های پرداخت</a></li>
                    <li><a>معرفی دیجی بن</a></li>
                </ul>
            </div>
            <div class="center">
                <ul>
                    <li><a class="title">خدمات مشتریان</a></li>
                    <li><a>ثبت سفارش</a></li>
                    <li><a>شیوه های پرداخت</a></li>
                    <li><a>معرفی دیجی بن</a></li>
                </ul>
            </div>
            <div class="left">
                <p class="title yekan">اولین نفری که مطلع می شود، باشید!</p>
                <div class="email">
                    <input type="text" class="yekan">
                    <span class="btn yekan font-md">تایید ایمیل</span>
                </div>
                <div class="social">
                    <a>
                        <img src="public/images/footer1-1.png" alt="">
                    </a>
                    <a>
                        <img src="public/images/footer1-2.png" alt="">
                    </a>
                    <span class="social__button" style="background-position: -493px -502px"></span>
                    <span class="social__button" style="background-position: -459px -502px"></span>
                    <span class="social__button" style="background-position: -425px -502px"></span>
                    <span class="social__button" style="background-position: -392px -502px"></span>
                    <span class="social__button" style="background-position: -357px -502px"></span>
                    <span class="social__button" style="background-position: -325px -502px"></span>
                    <span class="social__button" style="background-position: -290px -502px"></span>
                </div>
            </div>
        </div>
    </div>
</footer>
</body>
</html>