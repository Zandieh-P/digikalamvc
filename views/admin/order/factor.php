<?php
$orderInfo = '';
$basket = [];
if (isset($data['orderInfo'])) {
    $orderInfo = $data['orderInfo'];
    $basket = @unserialize($orderInfo['basket']);
} ?>
<!doctype html>
<html lang="en">
<head>
    <base href="<?= URL ?>">
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>فاکتور خرید</title>
</head>
<body>

</body>
</html>