<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ajax</title>
    <script src="public/js/jquery-3.6.0.min.js"></script>
</head>
<body>
<button>Send</button>
<script>
    $('button').click(function(){
        let url='test2.php';
        let data={'id':2};
        $.post(url,data,function(msg,status){
            alert(msg);
        });
    })
</script>
</body>
</html>