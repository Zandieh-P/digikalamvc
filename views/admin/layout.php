<main style="background:<?= body_color?>;">
    <div class="main__content"
         style="background: white;padding: 10px; font-family:Yekan,sans-serif;font-size: 12pt;">
        <div class="admin_right-menu">
            <ul>
                <li><a style="background: #35ff8f;">داشبورد</a></li>
                <li class="<?php if($active=='category'){echo 'active';}?>"><a href="admincategory/index">مدیریت دسته ها</a></li>
                <li class="<?php if($active=='product'){echo 'active';}?>"><a href="adminproduct/index/">مدیریت محصولات</a></li>
                <li class="<?php if($active=='order'){echo 'active';}?>"><a href="adminorder/index/">مدیریت سفارشات</a></li>
                <li class="<?php if($active=='stat'){echo 'active';}?>"><a href="adminstat/index/">آمار و گزارشات</a></li>
                <li class="<?php if($active=='comment'){echo 'active';}?>"><a href="admincomment/index/">نظرات</a></li>
                <li class="<?php if($active=='setting'){echo 'active';}?>"><a href="adminsetting/index/">تنظیمات فروشگاه</a></li>
                <li class="<?php if($active=='dashboard'){echo 'active';}?>"><a href="admindashboard/index/">داشبورد</a></li>
                <li class="<?php if($active=='slider'){echo 'active';}?>"><a href="adminslider/index/">مدیریت اسلایدشو</a></li>
            </ul>
        </div>
        <script>
            function submitForm() {
                $('form').submit();
            }
            function submitAdminGallerySelectForm() {
                $('#adminGallerySelectForm').submit();
            }
            function submitAdminGalleryImageForm() {
                $('#adminGalleryImageForm').submit();
            }
            function submitAdminSliderSelectForm() {
                $('#adminSliderSelectForm').submit();
            }
            function submitAdminSliderImageForm() {
                $('#adminSliderImageForm').submit();
            }
        </script>