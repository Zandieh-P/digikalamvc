<?php
$servername='localhost';
$username='root';
$password='';
$dbname='digi_mvc';
/*$conn= mysqli_connect($servername,$username,$password,$dbname);
if (mysqli_connect_error()){
    echo mysqli_connect_errno();
    die();
}*/
$conn= new mysqli($servername,$username,$password,$dbname);
if ($conn->connect_errno){
    echo $conn->connect_error;
    die();
}
$conn->set_charset('utf8');
$product_name="تلویزیون";
$product_price=1000;
$sql1='select * from tbl_product';
$sql2='update tbl_product set title="تبلت" where id=1';
$sql3='delete from tbl_product where title="تلویزیون"';
$sql4='insert into tbl_product (title,price) VALUES (?,?)';
$result=$conn->query($sql1);
//var_dump($result);
while ($row=$result->fetch_array()){
    print_r($row);
    echo '<br>';
//    echo $row['id'].'<br>';
//    echo $row['title'].'<br>';
//    echo $row['price'].'<br>';
//    echo $row[0].'<br>';
//    echo $row[1].'<br>';
//    echo $row[2].'<br>';
}
$conn->query($sql2);
$result=$conn->query($sql1);
while ($row=$result->fetch_assoc()){
    print_r($row);
    echo '<br>';
//    echo $row['id'].'<br>';
//    echo $row['title'].'<br>';
//    echo $row['price'].'<br>';
}
$conn->query($sql3);
$result=$conn->query($sql1);
while ($row=$result->fetch_object()){
    echo $row->id;
    echo $row->title;
    echo $row->price;
    echo '<br>';
}
$stmt=$conn->prepare($sql4);
$stmt->bind_param('si',$product_name,$product_price);
$stmt->execute();
$result=$conn->query($sql1);
while ($row=$result->fetch_object()){
    echo $row->id;
    echo $row->title;
    echo $row->price;
    echo '<br>';
}
