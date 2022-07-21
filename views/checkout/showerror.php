<?php
$Error = '';
$orderId = '';
if (isset($data['Error'])) {
    $Error = $data['Error'];
}
if (isset($data['orderId'])) {
    $orderId = $data['orderId'];
}
?>

<main>
    <div class="main__content" style="background: #fff; padding: 5px">
        <div class="show__error">
            <p class="yekan error"><?= $Error; ?></p>
            <a class="yekan basket__btn" style="display: inline-block;" href="checkout/index/<?= $orderId?>">بازگشت</a>
        </div>
    </div>
</main>