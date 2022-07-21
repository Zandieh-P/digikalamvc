<?php
$servername='localhost';
$username='root';
$password='';
$dbname='digi_mvc';
//$conn= new PDO('mysql:host=ServerName;dbname=DatabaseName','username','password',array(PDO::MYSQL_ATTR_INIT_COMMAND=>'SET NAMES "utf8"'));
$conn= new PDO('mysql:host='.$servername.';dbname='.$dbname,$username,$password,array(PDO::MYSQL_ATTR_INIT_COMMAND=>'SET NAMES "utf8"'));
$conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
$product_name="تلویزیون";
$product_price=1000;
$sql0='select * from tbl_product';
$sql1='select * from tbl_product where id=:x';
$sql2='update tbl_product set title="تبلت" where id=? and price=?';
$sql3='delete from tbl_product where title="تلویزیون"';
$sql4='insert into tbl_product (title,price) VALUES (?,?)';
//$stmt=$conn->query($sql1);
$stmt=$conn->prepare($sql1);
$stmt->bindValue(':x',1);
$stmt->execute();
//var_dump($stmt);
//$result=$stmt->fetch();
$result=$stmt->fetchAll(PDO::FETCH_ASSOC);
//print_r($result);
foreach ($result as $row){
    print_r($row);
    echo '<br>';
}
$stmt=$conn->prepare($sql2);
$stmt->bindValue(1,1);
$stmt->bindValue(2,0);
$stmt->execute();
$stmt=$conn->prepare($sql0);
$stmt->execute();
$result=$stmt->fetchAll(PDO::FETCH_ASSOC);
foreach ($result as $row){
    print_r($row);
    echo '<br>';
}
$stmt=$conn->prepare($sql3);
$stmt->execute();
$stmt=$conn->prepare($sql0);
$stmt->execute();
$result=$stmt->fetchAll(PDO::FETCH_ASSOC);
foreach ($result as $row){
    print_r($row);
    echo '<br>';
}
$stmt=$conn->prepare($sql4);
$stmt->bindParam(1,$product_name);
$stmt->bindParam(2,$product_price);
$stmt->execute();
$stmt=$conn->prepare($sql0);
$stmt->execute();
$result=$stmt->fetchAll(PDO::FETCH_ASSOC);
foreach ($result as $row){
    print_r($row);
    echo '<br>';
}
