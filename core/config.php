<?php

define('URL','http://localhost/digikalamvc/');
//define('URL','http://127.0.0.1/digikalamvc/');

header('Access-Control-Allow-Origin: *');
//header('Access-Control-Allow-Origin: http://localhost');
//header('Access-Control-Allow-Origin: http://127.0.0.1');
header('Host: http://127.0.0.1');
header('Origin: http://127.0.0.1');
//header('Host: http://localhost');
//header('Origin: http://localhost');

define('mohlatPay',24);

define('zarinpalMerchantID' , 'xxxxxxxx-xxxx-xxxx-xxxxxxxxxxxx');
//define('callbackURL' , 'http://localhost/digikalamvc/verify.php');
define('callbackURL' , 'http://localhost/digikalamvc/checkout');
define('zarinpalWebAddress' , 'https://zarinpal.com/pg/services/WebGate/wsdl');
define('zarinpalStartPay' , 'https://zarinpal.com/pg/StartPay/');
$zarinpalErrors = [
    '-1' => 'اطلاعات ارسال شده ناقص است',
    '-2' => 'IP یا مرچنت کد صحیح نیست',
    '-3' => 'رقم باید بالای 100 تومان باشد',
    '-4' => 'سطح تایید پذیرنده کمتر از نقره ای است',
    '-11' => 'درخواست مورد نظر یافت نشده',
    '-21' => 'هیچ نوع عملیات مالی برای این تراکنش یافت نشده',
    '-22' => 'تراکنش ناموفق می باشد',
    '-33' => 'رقم تراکنش با رقم پرداخت شده مطابقت ندارد',
    '-54' => 'درخواست مورد نظر آرشیو شده',
    '100' => 'عملیات با موفقیت انجام شده',
    '101' => 'عملیات پرداخت با موفقیت انجام شده ولی قبلا عملیات PaymentVerification بر روی این تراکنش انجام شده است'
];
define('zarinpalErrors',serialize($zarinpalErrors));