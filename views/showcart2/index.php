<main>
    <div class="main__content" style="clear: both; background: #fff; padding: 25px; width: 1150px">
        <div class="showcart2__content">
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
                    <li class="yekan">
                        <span class="circle"></span>
                        <span class="line"></span>
                        <span class="title">
                            اطلاعات ارسال سفارش
                        </span>
                    </li>
                    <li class="yekan">
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
            <div class="showcart2__title">
                <h4 class="yekan">انتخاب آدرس</h4>
                <span class="yekan basket__btn btn_gray" onclick="showAddAddress()">
                    افزودن آدرس جدید
                </span>
            </div>
            <div class="showcart2__body">
                <?php
                $address = [];
                if (isset($data['address'])) {
                    $address = $data['address'];
                }
                $firstActiveRow = 1;
                foreach ($address as $row) { ?>
                    <table cellspacing="0" data-city="<?= $row['city'] ?>" data-id="<?= $row['id']; ?>"
                           class="table_address <?php if ($firstActiveRow == 1) {
                               echo 'active';
                           } ?>">
                        <tr>
                            <td class="select_address" rowspan="3"
                                style="width: 60px;position: relative;cursor: pointer;">
                                <span class="triangle"></span>
                                <span class="circle"></span>
                            </td>
                            <td colspan="3" class="receiver">
                                <?= $row['family']; ?>
                                <!--                                محمد جعفر-->
                            </td>
                            <td rowspan="3" style="width: 30px;padding: 0;">
                                <table cellspacing="0" class="receive__state">
                                    <tr>
                                        <td class="edit img__fit__contain" style="cursor: pointer"
                                            onclick="editAddress(<?= $row['id']; ?>)"></td>
                                    </tr>
                                    <tr>
                                        <td class="remove img__fit__contain" style="cursor: pointer"
                                            onclick="removeAddress(<?= $row['id']; ?>)"></td>
                                    </tr>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 200px">
                                استان:
                                <?= $row['state_name']; ?>
                                <!--                                تهران-->
                            </td>
                            <td rowspan="2">
                                آدرس:
                                <br>
                                <?= $row['neighbour']; ?>
                                <?= $row['address']; ?>
                                <!--                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ad, animi delectus fuga qui rem similique?-->
                                <br>
                                کد پستی:
                                <?= $row['postalcode']; ?>
                                <!--                                934289523983-->
                            </td>
                            <td style="width: 200px">
                                شماره تماس اضطراری:
                                <?= $row['mobile']; ?>
                                <!--                                3887999-->
                            </td>
                        </tr>
                        <tr>
                            <td style="width: 200px;">
                                شهر:
                                <?= $row['city_name']; ?>
                                <!--                                تهران-->
                            </td>
                            <td style="width: 200px">
                                شماره تماس ثابت :
                                <?= $row['tel']; ?>
                                <!--                                6438746-->
                            </td>
                        </tr>
                    </table>
                    <?php $firstActiveRow = 0;
                } ?>
            </div>
            <div class="showcart2__title">
                <h4 class="yekan">انتخاب شیوه ارسال</h4>
            </div>
            <div class="post_types">
                <?php
                $postType = [];
                if (isset($data['postType'])) {
                    $postType = $data['postType'];
                }
                $firstActiveRow = 1;
                foreach ($postType as $row) { ?>
                    <table cellspacing="0" data-post-type="<?= $row['id']; ?>"
                           class="table_post <?php if ($firstActiveRow == 1) {
                               echo 'active';
                           } ?>">
                        <tr>
                            <td class="select_post" style="width: 60px;position: relative;cursor: pointer;">
                                <span class="triangle"></span>
                                <span class="circle"></span>
                            </td>
                            <td style="width: 60px;position: relative; border-left: none">
                                <div class="post__img">
                                    <i class="img__fit__contain"></i>
                                </div>
                            </td>
                            <td class="receiver" style="border-right: none;">
                                <div>
                                    <p style="font-weight: bold"><?= $row['title']; ?></p>
                                    <p><?= $row['description']; ?></p>
                                </div>
                            </td>
                            <td style="width: 130px;padding: 0;">
                                <div>
                                    <p style="text-align: center;">هزینه ارسال</p>
                                    <p class="post_price<?= $row['id']; ?>"
                                       style="text-align: center;color:#28a745;font-weight: bold;">
                                        <span id="post_price<?= $row['id']; ?>"></span>
                                        ریال
                                        <!--                                        46.000 تومان-->
                                    </p>
                                </div>
                            </td>
                        </tr>
                    </table>
                    <?php $firstActiveRow = 0;
                } ?>
            </div>
            <div class="showcart2__body__btn">
                <a class="yekan basket__btn" href="showcart3">
                    ذخیره و مرحله بعد
                </a>
                <!--                <span class="yekan basket__btn">ذخیره و مرحله بعد</span>-->
            </div>
        </div>
    </div>
</main>

<script>
    let editAddressId = ''

    function editAddress(addressId) {
        editAddressId = addressId;
        let url = '<?= URL?>showcart2/editaddress/' + addressId;
        let data = {};
        $.post(url, data, function (msg) {
            $('input[name=family]').val(msg["family"]);
            $('input[name=mobile]').val(msg["mobile"]);
            $('input[name=tel]').val(msg["tel"]);
            let state = msg['state'];
            let city = msg['city'];
            let neighbour = msg['neighbour'];
            $('.state option').each(function (index) {
                let txt = $(this).text();
                if (txt === state) {
                    $(this).attr('selected', 'selected');
                    ostan($('.state'));
                    $('.selectpicker').selectpicker('refresh');
                }
            });
            $('.city option').each(function (index) {
                let txt = $(this).text();
                if (txt === city) {
                    $(this).attr('selected', 'selected');
                    $('.selectpicker').selectpicker('refresh');
                }
            });
            $('textarea[name=address]').val(msg["address"]);
            $('input[name=postalcode]').val(msg["postalcode"]);
            $('#add_address').fadeIn(200);
            $('#dark').fadeIn(200);
        }, 'json');

    }

    function removeAddress(addressId) {
        let url = '<?= URL?>showcart2/deleteaddress/' + addressId;
        let data = {};
        $.post(url, data, function (msg) {
            window.location='showcart2/index';
            // console.log(msg);
        });
        getPostPrice();
    }

    $('.select_address').click(function () {
        $('.table_address').removeClass('active');
        $(this).parents('table').addClass('active');
        getPostPrice();
    });

    $('.select_post').click(function () {
        $('.table_post').removeClass('active');
        $(this).parents('table').addClass('active');
        getPostPrice();
        sesstionPostType();
    });

    getPostPrice();
    sesstionPostType();

    function getPostPrice() {
        let url = '<?= URL?>showcart2/getpostprice';
        let tableAddressActive = $('.table_address.active');
        let cityId = tableAddressActive.attr('data-city');
        let addressId = tableAddressActive.attr('data-id');
        let postId = $('.table_post.active').attr('data-post-type');
        let data = {'cityId': cityId, 'postId': postId, 'addressId': addressId};
        $.post(url, data, function (msg) {
            let pishtaz = msg['pishtaz'];
            let sefareshi = msg['sefareshi'];
            $('.table_post #post_price1').text(pishtaz);
            $('.table_post #post_price2').text(sefareshi);
        }, 'json');
    }

    function sesstionPostType() {
        let postTypeId = $('.table_post.active').attr('data-post-type');
        let url = '<?= URL?>showcart2/sessionposttype';
        let data = {'postTypeId': postTypeId};
        $.post(url, data, function (msg) {
            // alert(msg);
        });
    }

</script>

<?php
require('addaddress.php');
?>