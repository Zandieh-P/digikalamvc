<div id="search__search">
    <input type="text">
    <img src="<?= URL?>public/images/Search-icon.png" alt="">
    <span class="onOff">
                    <span class="onOff__back"></span>
                    <span class="onOff__yesNo"></span>
                </span>
    <span class="onOff__text yekan">
                    فقط نمایش کالاهای موجود
                </span>
    <span class="search__displayType">
                    <span class="search__displayTypeText yekan">
                        نوع نمایش
                    </span>
                    <span id="search__displayType2" class="displayType2Active"></span>
                    <span id="search__displayType1"></span>
                </span>
</div>
<div id="search__sort">
                <span class="sort__text yekan">
                    مرتب سازی بر اساس
                </span>
    <select>
        <option>قیمت</option>
        <option>پر بازدیدترین</option>
        <option>جدیدترین</option>
        <option>پیشنهاد ویژه</option>
        <option>پر فروش ترین</option>
    </select>
    <select>
        <option>سعودی</option>
        <option>نزولی</option>
    </select>
    <span class="sort__text yekan">
                        تعداد نمایش
                    </span>
    <select>
        <option>24</option>
        <option>36</option>
        <option>48</option>
    </select>
</div>
<div id="search__pagination">
                <span class="search__pagination-next yekan">
                    صفحه بعد
                </span>
    <ul>
        <li>1</li>
        <li>2</li>
    </ul>
    <span class="search__pagination-prev yekan">
                    صفحه قبل
                </span>
</div>
<script>
    $('.onOff').click(function () {
        $(this).toggleClass('onOff__active');
        if ($(this).hasClass('onOff__active')) {
            $('.onOff__yesNo', this).animate({'left': '17px'}, 400);
        } else {
            $('.onOff__yesNo', this).animate({'left': '5px'}, 400);
        }
    })

    $('#search__displayType1').click(function () {
        $('#search__products').addClass('products__display1');
        $(this).addClass('displayType1Active');
        $('#search__displayType2').removeClass('displayType2Active')
    })

    $('#search__displayType2').click(function () {
        $('#search__products').removeClass('products__display1');
        $(this).addClass('displayType2Active');
        $('#search__displayType1').removeClass('displayType1Active')
    })
    //search
</script>