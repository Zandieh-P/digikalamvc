<?php

?>
<?php
$orderInfo=[];
if(isset($data['orderInfo'])){
    $orderInfo=$data['orderInfo'];
}
?>
<main>
    <div class="main__content" style="background: #fff; padding: 10px">
        <form action="checkout/creditcard/<?php if(isset($orderInfo['id'])){echo $orderInfo['id'];} ?>" method="post">
            <div class="creditcard__row">
                <h3>اطلاعات واریز کارت به کارت</h3>
            </div>
            <div class="creditcard__row">
                <span class="yekan creditcard__title">تاریخ واریز:</span>
                <span class="yekan creditcard__title">روز:</span>
                <select name="day">
                    <?php
                    for ($i = 1; $i < 32; $i++) { ?>
                        <option value="<?= $i ?>"><?= $i ?></option>
                    <?php } ?>
                </select>
                <span class="yekan creditcard__title">ماه:</span>
                <select name="month">
                    <?php
                    for ($i = 1; $i < 13; $i++) { ?>
                        <option value="<?= $i ?>"><?= $i ?></option>
                    <?php } ?>
                </select>
                <span class="yekan creditcard__title">سال:</span>
                <select name="year">
                    <option value="1401">1401</option>
                    <option value="1400">1400</option>
                </select>
            </div>
            <div class="creditcard__row">
                <span class="yekan creditcard__title">زمان واریز:</span>
                <span class="yekan creditcard__title">ساعت:</span>
                <select name="hour">
                    <?php
                    for ($i = 0; $i < 24; $i++) { ?>
                        <option value="<?= $i ?>"><?php if ($i == 0) {
                                echo '00';
                            } else {
                                echo $i;
                            } ?></option>
                    <?php } ?>
                </select>
                <span class="yekan creditcard__title">دقیقه:</span>
                <select name="minute">
                    <?php
                    for ($i = 1; $i < 60; $i++) { ?>
                        <option value="<?= $i ?>"><?= $i ?></option>
                    <?php } ?>
                </select>
            </div>
            <div class="creditcard__row">
                <span class="yekan creditcard__title">شماره کارت:</span>
                <input type="text" name="creditcard">
            </div>
            <div class="creditcard__row">
                <span class="yekan creditcard__title">نام بانک صادر کننده:</span>
                <input type="text" name="bank">
            </div>
            <div class="creditcard__row">
                <a class="yekan basket__btn" onclick="submitForm()">ثبت
                    اطلاعات</a>
            </div>
        </form>
    </div>
</main>
<script>
    function submitForm() {
        $('form').submit();
    }
</script>