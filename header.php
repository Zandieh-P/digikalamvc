<!DOCTYPE html>
<html lang="en">
<head>
    <base href="<?= URL ?>">
    <meta charset="UTF-8">
    <title>فروشگاه اینترنتی دیجی کالا</title>
    <link rel="stylesheet" href="public/style/main.css">
    <script src="public/js/jquery-3.6.0.min.js"></script>
    <!--    <script src="public/https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script><style>-->
</head>
<body>
<header>
    <div id="header">
        <div id="header_right">
            <div id="header_right_top">
                <span id="header_right_top_lock"></span>
                <a class="yekan font-sm" href="<?= URL ?>login">
                    فروشگاه اینترنتی دیجی کالا، وارد شوید
                </a>
                <span id="header_right_top_login"></span>
                <a class="yekan font-sm" href="<?= URL ?>register">
                    ثبت نام کنید
                </a>
            </div>
            <div id="header_right_bottom">
                <a id="basket_top" href="<?= URL ?>showcart">
                    <div id="basket_top_right"></div>
                    <div id="basket_top_left">
                        <span id="basket_top_left__text" class="yekan font-sm">سبد خرید</span>
                        <span id="basket_top_left__circle" class="font-sm">0</span>
                    </div>
                </a>
                <div id="search_top">
                    <label>
                        <input class="yekan" type="text" placeholder="محمصول دسته یا برند مورد نظر خود را سرچ کنید...">
                    </label>
                    <span></span>
                </div>
            </div>
        </div>
        <div id="header_left">
            <a href="index/index">
                <img src="public/images/logo.png" alt="Digikala-Logo">
            </a>
        </div>
    </div>
</header>
<nav>
    <div id="menu__top">
        <ul>
            <li data-time="1">
                <a class="yekan">
                    کالای دیجیتال
                    <span class="menu__down__icon"></span>
                </a>
                <ul>
                    <li data-time="3">
                        <a class="yekan font-sm">
                            موبایل
                        </a>
                        <div class="submenu3">
                            <div class="top__menu3__col">
                                <ul class="top__menu3__col__ul">
                                    <li class="yekan font-sm">گوشی موبایل</li>
                                    <li class="yekan font-sm">َApple</li>
                                    <li class="yekan font-sm">Samsung</li>
                                </ul>
                            </div>
                            <div class="top__menu3__col"></div>
                            <div class="top__menu3__col"></div>
                            <div class="top__menu3__col"></div>
                            <img id="top__menu3__img__mobile" src="public/images/mobile.jpg" alt="mobile">
                        </div>
                    </li>
                    <li data-time="4">
                        <a class="yekan font-sm">
                            تبلت و کتابخوان
                        </a>
                        <div class="submenu3">
                            <div class="top__menu3__col">
                                <ul class="top__menu3__col__ul" style="padding: 10px;">
                                    <li class="yekan font-sm">تبلت</li>
                                    <li class="yekan font-sm">َApple</li>
                                    <li class="yekan font-sm">Samsung</li>
                                </ul>
                            </div>
                            <div class="top__menu3__col"></div>
                            <div class="top__menu3__col"></div>
                            <div class="top__menu3__col"></div>
                            <img id="top__menu3__img__tablet" src="public/images/tablet.jpg" alt="tablet">
                        </div>
                    </li>
                    <li data-time="5">
                        <a class="yekan font-sm">
                            لپ تاپ
                        </a>
                        <div class="submenu3">
                            <div class="top__menu3__col">
                                <ul class="top__menu3__col__ul" style="padding: 10px;">
                                    <li class="yekan font-sm">لپ تاپ</li>
                                    <li class="yekan font-sm">َApple</li>
                                    <li class="yekan font-sm">Samsung</li>
                                </ul>
                            </div>
                            <div class="top__menu3__col"></div>
                            <div class="top__menu3__col"></div>
                            <div class="top__menu3__col"></div>
                            <img id="top__menu3__img__laptop" src="public/images/lapTop.jpg" alt="lap top">
                        </div>
                    </li>
                </ul>
            </li>
            <li data-time="2">
                <a class="yekan">
                    لوازم خانگی
                    <span class="menu__down__icon"></span>
                </a>
                <ul>
                    <li data-time="6">
                        <a class="yekan font-sm">
                            صوتی و تصویری
                        </a>
                        <div class="submenu3"
                             style="width: 1200px;height: 300px;background:#fff;border-top: 1px solid #eee;position: absolute;right: 0">
                            <div class="top__menu3__col">
                                <ul class="top__menu3__col__ul" style="padding: 10px;">
                                    <li class="yekan font-sm">تلویزیون</li>
                                    <li class="yekan font-sm">َکوچکتر از 32 اینچ</li>
                                    <li class="yekan font-sm">32 تا 42 اینچ</li>
                                </ul>
                            </div>
                            <div class="top__menu3__col"></div>
                            <div class="top__menu3__col"></div>
                            <div class="top__menu3__col"></div>
                            <img src="public/images/television.jpg" alt="television" width="235px" height="235px"
                                 style="position: absolute;left: 2px;bottom: 2px;">
                        </div>
                    </li>
                    <li data-time="7">
                        <a class="yekan font-sm">
                            لوازم خانگی برقی
                        </a>
                    </li>
                    <li data-time="8">
                        <a class="yekan font-sm">
                            آشپزخانه
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
</nav>
<script>
    let timer = {};
    $("#menu__top li").hover(function () {
        let tag = $(this);
        let timerAttr = tag.attr('data-time')
        clearTimeout(timer[timerAttr])
        timer[timerAttr] = setTimeout(function () {
            $(' > ul', tag).fadeIn(0);
            $(tag).addClass('active__menu');
            $(' > .submenu3', tag).fadeIn(0);
        }, 500);
    }, function () {
        let tag = $(this);
        let timerAttr = tag.attr('data-time')
        clearTimeout(timer[timerAttr])
        timer[timerAttr] = setTimeout(function () {
            $(' > ul', tag).fadeOut(0);
            $(tag).removeClass('active__menu');
            $(' > .submenu3', tag).fadeOut(0);
        }, 600);
    })
    // menu
</script>