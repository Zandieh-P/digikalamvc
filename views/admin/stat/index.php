<?php
$active='stat';
require('views/admin/layout.php');
?>
<div class="admin_left">
    <p class="admin_left-title">
        آمار و گزارشات
    </p>
    <form id="order" action="adminstat/order" method="post">
        <span class="basket__btn" style="float:left;" onclick="submitForm('order')">گزارش گیری</span>
    </form>
</div>
</div>
</main>

<script>
    function submitForm(formId){
        $('#'+formId).submit();
    }
</script>