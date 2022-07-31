<div id="search__search">
    <input id="keyword" type="text">
    <img src="<?= URL ?>public/images/Search-icon.png" alt="" onclick="dosearch()" style="cursor:pointer;">
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
    <select name="orderType1" onchange="dosearch();">
        <option value="1">قیمت</option>
        <option value="2">پر بازدیدترین</option>
        <option value="3">جدیدترین</option>
        <option value="4">پیشنهاد ویژه</option>
        <!--        <option value="5">پر فروش ترین</option>-->
    </select>
    <select name="orderType2" onchange="dosearch();">
        <option value="1">سعودی</option>
        <option value="2">نزولی</option>
    </select>
    <span class="sort__text yekan">
        تعداد نمایش
    </span>
    <select id="pagination_limit" onchange="dosearch();">
        <option value="1">1</option>
        <option value="2">2</option>
        <option value="3">3</option>
        <option value="4">4</option>
    </select>
</div>

<div id="search__pagination">
    <span class="search__pagination-next yekan" onclick="dosearch(current_page+1)">
        صفحه بعد
    </span>
    <ul>
        <li>1</li>
        <!--<li onclick="pagination(this)" class="active">1</li>
        <li onclick="pagination(this)">2</li>-->
    </ul>
    <span class="search__pagination-prev yekan" onclick="dosearch(current_page-1)">
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
        dosearch();
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

    function pagination(tag,page) {
        let liTag = $(tag);
        $('#search__pagination ul li').removeClass('active');
        liTag.addClass('active');
        dosearch(page);
    }

    //search
</script>