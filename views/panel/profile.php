<?php
$userInfo = [];
if (isset($data['userInfo'])) {
    $userInfo = $data['userInfo'];
}
?>
<main>
    <div class="main__content" style="  background: #fff">
        <form action="panel/editprofile">
            <h4>مشخصات پروفایل</h4>
            <div class="panel__profile__row"></div>
        </form>
    </div>
</main>