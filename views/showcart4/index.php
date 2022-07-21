<main>
    <form action="showcart4/saveorder" method="post">
        <div class="main__content" style="background: #fff; padding: 5px">
            <div class="showcart__order__steps">
                <div class="dashed active">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
                <ul>
                    <li class="yekan active">
                        <span class="circle"></span>
                        <span class="line"></span>
                        <span class="title">
                            ورود یه دیجی کالا
                        </span>
                    </li>
                    <li class="yekan active">
                        <span class="circle"></span>
                        <span class="line"></span>
                        <span class="title">
                            اطلاعات ارسال سفارش
                        </span>
                    </li>
                    <li class="yekan active">
                        <span class="circle"></span>
                        <span class="line"></span>
                        <span class="title">
                            بازبینی سفارش
                        </span>
                    </li>
                    <li class="yekan">
                        <span class="circle"></span>
                        <span class="line"></span>
                        <span class="title">
                            اطلاعات پرداخت
                        </span>
                    </li>
                </ul>
                <div class="dashed">
                    <span></span>
                    <span></span>
                    <span></span>
                    <span></span>
                </div>
            </div>
            <div class="basket__head">
                <?php
                $Status = '';
                if (isset($data['Status'])) {
                    $Status = $data['Status'];
                    if ($Status != '') {
                        $ErrorArray = unserialize(zarinpalErrors);
                        $Error = $ErrorArray[$Status]; ?>
                        <div id="PaymentError">
                            خطا!
                            <?= $Error; ?>
                        </div>
                    <?php }
                } ?>
                <h4 class="yekan">
                    کد تخفیف
                </h4>
            </div>
            <table cellspacing="0" class="discount__code">
                <tr>
                    <td>
                        کد تخفیف دیجیکالا دارم
                        <br>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. At cumque deleniti facere fugiat,
                        fugit
                        illum inventore ipsa quidem ratione velit.
                    </td>
                    <td>
                        <input type="text" id="discountCode" name="clientDiscountCode">
                    </td>
                    <td>
                    <span class="yekan basket__btn" onclick="checkDiscountCode();">
                        ثبت کد تخفیف
                    </span>
                    </td>
                </tr>
            </table>
            <div class="basket__head">
                <h4 class="yekan">
                    کد هدیه
                </h4>
            </div>
            <table cellspacing="0" class="gifted__code">
                <tr>
                    <td>
                        کد هدیه دیجیکالا دارم
                        <br>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. At cumque deleniti facere fugiat,
                        fugit
                        illum inventore ipsa quidem ratione velit.
                    </td>
                    <td>
                        <input type="text">
                    </td>
                    <td>
                    <span class="yekan basket__btn">
                        ثبت کد هدیه
                    </span>
                    </td>
                </tr>
            </table>
            <table cellspacing="0" class="showcart4__price">
                <tr>
                    <td>
                        مبلغ کل قابل پرداخت:
                    </td>
                    <td>
                        <span id="totalPrice"></span>
                        تومان
                        <!--                    90.000 تومان-->
                    </td>
                </tr>
            </table>
            <div style="float: left; width: 100%;margin-top: 50px">

                // These options are just for local test and can be deleted.
                <input type="hidden" name="payType" value="1"> //value="1"=>zarinpal payment.
<!--                <input type="hidden" name="payType" value="2"> //value="2"=>mellat payment.-->
<!--                <input type="hidden" name="payType" value="3"> //value="3"=>parsian payment.-->
<!--                <input type="hidden" name="payType" value="4"> //value="4"=>cart2cart payment.-->

                <span class="yekan basket__btn" style="float: left" onclick="submitForm()">
                    پرداخت و تکمیل خرید
                </span>
            </div>
        </div>
    </form>
</main>

<script>

    function calculateTotalPrice() {
        let url = '<?= URL?>showcart4/calculatetotalprice';
        let discountCode = $('#discountCode').val();
        let data = {'discountCode': discountCode};
        $.post(url, data, function (msg) {
            $('#totalPrice').text(msg);
        });
    }

    calculateTotalPrice();

    function checkDiscountCode() {
        let discountCode = $('#discountCode').val();
        let url = '<?= URL?>showcart4/checkdiscountcode/' + discountCode;
        let data = {};
        $.post(url, data, function (msg) {
            if (msg[0] != 0) {
                $('#discountCode').addClass('input__green').removeClass('input__red');
            } else {
                $('#discountCode').addClass('input__red').removeClass('input__green');
            }
            $('#totalPrice').text(msg[1]);
        }, 'json');
    }

    function submitForm() {
        $('form').submit();
    }
</script>