<main>
    <div class="main__content" style="height: 500px; background: #fff">
        <div class="header">
            <i></i>
            <h2 class="yekan">
                به دیجی کالا بپیوندید
            </h2>
            <div class="right">
                <div>
                    <label>
                        پست الکترونیک
                    </label>
                    <input type="text">
                </div>
                <div>
                    <label>
                        رمز عبور
                    </label>
                    <input type="password">
                </div>
                <div class="check_div">
                    <span class="check__label"></span>
                    <input class="check__input" type="checkbox">
                    قوانین را مطالعه نمودم و موافق هستم
                </div>
                <div class="check_div">
                    <span class="check__label"></span>
                    <input class="check__input" type="checkbox">
                    خبرنامه را برای من ارسال کن
                </div>
                <span class="btn yekan font-md">ثبت نام</span>
            </div>
            <div class="left">
                <ul>
                    <li>
                        <i style="background-position:  -785px -267px"></i>
                        سریع تر و ساده تر خرید کنید
                    </li>
                    <li>
                        <i style="background-position:  -785px -230px"></i>
                        به سادگی سوابق فعالیت خود را مدیریت کنید
                    <li>
                    <li>
                        <i style="background-position:  -785px -195px"></i>
                        لیست علاقه مندی های خود را بسازید
                    </li>
                </ul>
            </div>
        </div>
    </div>
</main>
<script>
    $('.header .check__input').click(function (){
        if($(this).is(':checked')){
            $(this).parents('.check_div').find('.check__label').addClass('checked');
        }else {
            $(this).parents('.check_div').find('.check__label').removeClass('checked');
        }
    })
    // registration
</script>