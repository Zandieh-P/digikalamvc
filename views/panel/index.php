<?php
$userInfo = [];
if (isset($data['userInfo'])) {
    $userInfo = $data['userInfo'];
}
$Stat = [];
if (isset($data['stat'])) {
    $Stat = $data['stat'];
}
$comments = [];
if (isset($data['comments'])) {
    $comments = $data['comments'];
}
?>
<main>
    <div class="main__content" style="  background: #fff">
        <div class="panel__box">
            <div class="panel__box__header">
                اطلاعات کاربر
            </div>
            <div class="panel__box__content">
                <table cellspacing="0">
                    <tr>
                        <td>
                            <span class="title">
                                نام و نام خانوادگی:
                            </span>
                            <span class="value">
                                <?= $userInfo['family']; ?>
                                <!--کلیک سایت-->
                            </span>
                        </td>
                        <td>
                            <span class="title">
                                ادرس ایمیل:
                            </span>
                            <span class="value">
                                <?= $userInfo['email']; ?>
                                <!--کلیک سایت-->
                            </span>
                        </td>
                        <td>
                            <span class="title">
                                کد ملی:
                            </span>
                            <span class="value">
                                <?= $userInfo['code_meli']; ?>
                                <!--کلیک سایت-->
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <span class="title">
                                شماره تلفن ثابت:
                            </span>
                            <span class="value">
                                <?= $userInfo['tel']; ?>
                                <!--کلیک سایت-->
                            </span>
                        </td>
                        <td>
                            <span class="title">
                                شماره تلفن همراه:
                            </span>
                            <span class="value">
                                <?= $userInfo['mobile']; ?>
                                <!--کلیک سایت-->
                            </span>
                        </td>
                        <td>
                            <span class="title">
                                تاریخ تولد:
                            </span>
                            <span class="value">
                                <?= $userInfo['tavalod']; ?>
                                <!--کلیک سایت-->
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <span class="title">
                                جنسیت:
                            </span>
                            <span class="value">
                                <?php
                                $jensiat = $userInfo['jensiat'];
                                if($jensiat==1){
                                    echo 'مرد';
                                }else
                                    echo 'زن';
                                ?>
                                <!--کلیک سایت-->
                            </span>
                        </td>
                        <td>
                            <span class="title">
                                محل سکونت:
                            </span>
                            <span class="value">
                                <?= $userInfo['address']; ?>
                                <!--کلیک سایت-->
                            </span>
                        </td>
                        <td>
                            <span class="title">
                                دریافت خبرنامه:
                            </span>
                            <span class="value">
                                <?php
                                $khabarname = $userInfo['khabarname'];
                                if($khabarname==1){
                                    echo 'بله';
                                }else
                                    echo 'خیر';
                                ?>
                                <!--کلیک سایت-->
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <span class="title">
                                شماره کارت:
                            </span>
                            <span class="value">
                                <?= $userInfo['cart']; ?>
                                <!--کلیک سایت-->
                            </span>
                        </td>
                        <td>
                            <span class="title">
                            </span>
                            <span class="value">
                            </span>
                        </td>
                        <td>
                            <span class="title">
                            </span>
                            <span class="value">
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="3" style="text-align: left; height: 100%">
                            <a href="panel/profile" class="edit"></a>
                            <a href="panel/changepass" class="password"></a>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
        <div class="panel__box">
            <div class="panel__box__header">
                گزارش عملکرد
            </div>
            <div class="panel__box__content">
                <table cellspacing="0">
                    <tr>
                        <td>
                            <span class="title">
                                تعداد کل سفارشات:
                            </span>
                            <span class="value">
                                <?= $Stat['order_number'];?>
                                <!--کلیک سایت-->
                            </span>
                        </td>
                        <td>
                            <span class="title">
                                تعداد کل دیجی بن دریافتی:
                            </span>
                            <span class="value">
                                کلیک سایت
                            </span>
                        </td>
                        <td>
                            <span class="title">
                                تعداد نظرات ارسال شده:
                            </span>
                            <span class="value">
                                <?= $Stat['comment_number'];?>
                                <!--کلیک سایت-->
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <span class="title">
                                سفارشات در انتظار تایید:
                            </span>
                            <span class="value">
                                <?= $Stat['order_taeed_number'];?>
                                <!--کلیک سایت-->
                            </span>
                        </td>
                        <td>
                            <span class="title">
                                کل دیجی بن مصرف شده:
                            </span>
                            <span class="value">
                                کلیک سایت
                            </span>
                        </td>
                        <td>
                            <span class="title">
                                نقدهای ارسال شده:
                            </span>
                            <span class="value">
                                کلیک سایت
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <span class="title">
                                سفارشات در حال پردازش:
                            </span>
                            <span class="value">
                                <?= $Stat['order_pardazesh_number'];?>
                                <!--کلیک سایت-->
                            </span>
                        </td>
                        <td>
                            <span class="title">
                                کل دیجی ین باطل شده:
                            </span>
                            <span class="value">
                                کلیک سایت
                            </span>
                        </td>
                        <td>
                            <span class="title">
                                تعداد پیغام های خوانده نشده:
                            </span>
                            <span class="value">
                                <?= $Stat['message_number'];?>
                                <!--کلیک سایت-->
                            </span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <span class="title">
                                سفارشات انصراف داده شده:
                            </span>
                            <span class="value">
                                کلیک سایت
                            </span>
                        </td>
                        <td>
                            <span class="title">
                                دیجی بن مانده قابل مصرف:
                            </span>
                            <span class="value">
                                کلیک سایت
                            </span>
                        </td>
                        <td>
                            <span class="title">
                            </span>
                            <span class="value">
                            </span>
                        </td>
                    </tr>
                </table>
            </div>
        </div>
    </div>
</main>