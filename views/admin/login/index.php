<main style="background:<?= body_color?>;">
    <div class="main__content"
         style="background: white;padding: 10px; font-family:Yekan,sans-serif;font-size: 12pt;">
        <p class="admin_left-title">
            ورود به پنل مدیریت
        </p>
        <form id="adminSliderSelectForm" action="adminlogin/checkuser" method="post">
            <div class="adminGallerySelect">
                <span class="adminGalleryTitle">نام کاربری:</span>
                <input type="text" name="email">
            </div>
            <div class="adminGallerySelect">
                <span class="adminGalleryTitle">پسورد:</span>
                <input type="text" name="password">
            </div>
            <a class="basket__btn" onclick="submitForm()" style="float:left;">ورود</a>
        </form>
</div>
</main>
<script>
    function submitForm() {
        $('form').submit();
    }
</script>