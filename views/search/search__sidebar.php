<div id="search__sidebar">
    <h3 class="yekan">
        گوشی موبایل
        <span class="search__subArrow"></span>
    </h3>
    <ul>
        <li class="title">
            کالای دیجیتال
            <ul>
                <li>
                    موبایل
                    <ul>
                        <li>
                            گوشی موبایل
                        </li>
                    </ul>
                </li>
            </ul>
        </li>
    </ul>
    <div class="horizontal__line"></div>
    <ul class="filter__ul">
        <li class="title">بر اساس نوع</li>
        <li>
            <span class="check__label"></span>
            <input class="check__input" type="checkbox">
            سیستم عامل اندروید
        </li>
        <li>
            <span class="check__label"></span>
            <input class="check__input" type="checkbox">
            سیستم عامل ios
        </li>
    </ul>
    <div class="horizontal__line"></div>
    <ul class="filter__ul">
        <li class="title">بر اساس سازنده</li>
        <li>
            <span class="check__label"></span>
            <input class="check__input" type="checkbox">
            اپل
        </li>
        <li>
            <span class="check__label"></span>
            <input class="check__input" type="checkbox">
            سامسونگ
        </li>
    </ul>
    <div class="horizontal__line"></div>
    <ul class="filter__ul">
        <li class="title">بر اساس رنگ</li>
        <li>
            <span class="check__label"></span>
            <input class="check__input" type="checkbox">
            <span class="product__color" style="background-color: black"></span>
            مشکی
        </li>
        <li>
            <span class="check__label"></span>
            <input class="check__input" type="checkbox">
            <span class="product__color" style="background-color: red"></span>
            قرمز
        </li>
    </ul>
</div>
<script>
    $('#search__sidebar .check__input').click(function () {
        if ($(this).is(':checked')) {
            $(this).parents('li').find('.check__label').addClass('checked');
        } else {
            $(this).parents('li').find('.check__label').removeClass('checked');
        }
    })
</script>