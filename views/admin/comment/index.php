<?php
$active='comment';
require('views/admin/layout.php');
$comments=[];
if (isset($data['comments'])){
    $comments=$data['comments'];
}
?>
<div class="admin_left">
    <p class="admin_left-title">
        مدیریت نظرات
    </p>
    <a class="addOrder__btn basket__btn" style="margin-left: 5px;" onclick="submitFormMulti()">اجرای عملیات</a>
    <select name="action" class="selectTag" style="float:left;margin-left: 10px;font-family: Yekan,sans-serif;font-size: 13.5pt;padding:1px;">
        <option value="1">تایید</option>
        <option value="2">عدم تایید</option>
        <option value="3">حذف</option>
    </select>
    <form id="comment" action="" method="post">
    </form>
</div>
</div>
</main>

<script>
    function submitFormMulti(formId){
        let actionSelected=$('.selectTag option:selected').val();
        let action='';
        let form=$('form');
        if(actionSelected==1){action='admincomment/confirmed';}
        if(actionSelected==2){action='admincomment/unconfirmed';}
        if(actionSelected==3){action='admincomment/deleteComment';}
        form.attr('action',action);
        form.submit();
    }
</script>