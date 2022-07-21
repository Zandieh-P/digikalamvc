<main>
    <div class="main__content" style="height: 500px; background: #fff">
        <div class="header">
            <i></i>
            <h2 class="yekan">
                ورود به سایت
            </h2>
            <div class="right">
                <form action="login/checkuser" method="post">
                    <div style="margin: 20px 0;">
                        <label>
                            پست الکترونیک
                        </label>
                        <input type="text" name="email">
                    </div>
                    <div style="margin: 20px 0;">
                        <label>
                            رمز عبور
                        </label>
                        <input type="password" name="password">
                    </div>
                    <span class="btn yekan font-md" onclick="submitLoginForm();">ورود</span>
                </form>
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
    function submitLoginForm() {
        $('form').submit();
    }
</script>