<?php
$userInfo = [];
if (isset($data['userInfo'])) {
    $userInfo = $data['userInfo'];
}
?>
<main>
    <div class="main__content" style="  background: #fff">
        <form action="panel/editpass">
            <h4>تغییر رمز عبور</h4>
            <?php
            if (isset($_GET['error'])) {
                if (@$_GET['error'] != '') { ?>
                    <p id="changePassError"><?= $_GET['error']; ?></p>
                <?php } else { ?>
                    <p id="changePassSuccess">تغییر رمز با موفقیت انجام شد</p>
                <?php }
            } ?>
            <div class="panel__profile__row"></div>
        </form>
    </div>
</main>