<link rel="stylesheet" href="<?= URL ?>public/style/bootstrap-select.css"/>
<link rel="stylesheet" href="<?= URL ?>public/style/bootstrap.css"/>
<!--    In "bootstrap.css";
        these must be commented: "*, *::before, *::after {box-sizing: border-box;}"
        and "margin-bottom" must be unset to "0": "ol, ul, dl {margin-top: 0; margin-bottom: 0;}"
    to not conflict with our styles-->

<script src="<?= URL ?>public/js/bootstrap-select.js"></script>
<!--    In "bootstrap-select.js";
        these must be commented:
            line 3158: var bootstrapKeydown = $.fn.dropdown.Constructor._dataApiKeydownHandler || $.fn.dropdown.Constructor.prototype.keydown;
            line 3160: $(document)
            .off('keydown.bs.dropdown.data-api')
            .on('keydown.bs.dropdown.data-api', ':not(.bootstrap-select) > [data-toggle="dropdown"]', bootstrapKeydown)
            .on('keydown.bs.dropdown.data-api', ':not(.bootstrap-select) > .dropdown-menu', bootstrapKeydown)
            .on('keydown' + EVENT_KEY, '.bootstrap-select [data-toggle="dropdown"], .bootstrap-select [role="listbox"], .bootstrap-select .bs-searchbox input', Selectpicker.prototype.keydown)
            .on('focusin.modal', '.bootstrap-select [data-toggle="dropdown"], .bootstrap-select [role="listbox"], .bootstrap-select .bs-searchbox input', function (e) { e.stopPropagation();
        to not conflict on browsers action.
-->
<script src="<?= URL ?>public/js/bootstrap.min.js"></script>
<script src="<?= URL ?>public/js/city.js"></script>
<script src="<?= URL ?>public/js/mahal.js"></script>

<form id="add_address-form" action="showcart2/addaddress" method="post">
    <div id="add_address">
        <h4>
            افزودن آدرس جدید
            <span class="close"></span>
        </h4>
        <div class="row">
            <div class="right">
            <span class="title">
                نام و نام خانوادگی تحویل گیرنده:
            </span>
            </div>
            <div class="left">
                <input name="family" value="">
            </div>
        </div>
        <div class="row">
            <div class="right">
            <span class="title">
                شماره همراه:
            </span>
            </div>
            <div class="left">
                <input name="mobile" value="">
            </div>
        </div>
        <div class="row">
            <div class="right">
            <span class="title">
                شماره ثابت:
            </span>
            </div>
            <div class="left">
                <input name="tel" value="">
            </div>
        </div>
        <div class="row">
            <div class="right">
            <span class="title">
                استان/شهر:
            </span>
            </div>
            <div class="left">
                <select name="state" onchange="ostan(this);" class="selectpicker state" data-live-search="true">
                    <option value="">انتخاب استان</option>
                    <option value="آذربایجان شرقی" data-val="41">آذربایجان شرقی</option>
                    <option value="آذربایجان غربی" data-val="44">آذربایجان غربی</option>
                    <!--                ...-->
                    <option value="مرکزی" data-val="86">مرکزی</option>
                    <option value="هرمزگان" data-val="76">هرمزگان</option>
                    <option value="همدان" data-val="81">همدان</option>
                    <option value="یزد" data-val="35">یزد</option>
                </select>
                <span class="shahr">
                <select name="city" onchange="mahale(this);" class="selectpicker city">
                    <option value="">
                        انتخاب شهر
                    </option>
                </select>
            </span>
            </div>
        </div>
        <div class="row">
            <div class="right">
            <span class="title">
                محله:
            </span>
            </div>
            <div class="left">
            <span class="mahale">
                <select name="neighbour" class="neighbour" onchange="mahale(this);">
                    <option value="">
                        محله خود را انتخاب کنید
                    </option>
                </select>
            </span>
            </div>
        </div>
        <div class="row">
            <div class="right">
            <span class="title">
                آدرس پستی:
            </span>
            </div>
            <div class="left">
                <textarea name="address"></textarea>
            </div>
        </div>
        <div class="row">
            <div class="right">
            <span class="title">
                کد پستی:
            </span>
            </div>
            <div class="left">
                <input name="postalcode" value="">
            </div>
        </div>
        <div class="row">
            <div class="right">
            <span class="title">
            </span>
            </div>
            <div class="left" style="float: left!important;">
            <span class="basket__btn" onclick="submitAddAddressForm()">
                ذخیره اطلاعات و بازگشت
            </span>
            </div>
        </div>
    </div>
</form>
<div id="dark"></div>

<script>
    function submitAddAddressForm() {
        let family = $('input[name=family]').val();
        let mobile = $('input[name=mobile]').val();
        let url = '<?= URL?>showcart2/addaddress/' + editAddressId;
        let data = $('#add_address-form').serializeArray();
        $.post(url, data, function (msg) {
            window.location = '<?= URL?>showcart2';
        });
        getPostPrice();
    }

    $('.close').click(function () {
        $('#add_address').fadeOut(200);
        $('#dark').fadeOut(200);
    });

    function showAddAddress() {
        editAddressId = ''
        $('#add_address').fadeIn(200);
        $('#dark').fadeIn(200);
        $('#add_address-form').trigger('reset');
    }

    /*$('.btn_gray').click(function (){
        $('#add_address').fadeIn(200);
        $('#dark').fadeIn(200);
    });*/

    $('.selectpicker').selectpicker();
</script>