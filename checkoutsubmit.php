<?php
include 'config.php';
$productid = $_POST['productid'];
$username = $_POST['username'];
$address = $_POST['address'];
$phonenumber = $_POST['phonenumber'];
$buyerid = $_POST['buyerid'];
$name = $_POST['name'];
$location = $_POST['location'];
$category = $_POST['category'];
$discount = $_POST['discount'];
$price = $_POST['price'];
$description = addslashes($_POST['description']);
$userid = $_POST['userid'];
$qty = $_POST['qty'];
$date = $_POST['date'];
$storename = $_POST['storename'];


if (mysqli_query($conn, "INSERT INTO productorder (productid,name,location,category,discount,price,description,userid,username,address,phonenumber,status,buyerid,quantity,ddate,storename) VALUES ('$productid','$name','$location','$category','$discount','$price','$description','$userid','$username','$address','$phonenumber','$status','$buyerid','$qty','$date','$storename')")) {
    header("location: account.php?alert=succesfull_checkout");
} else {
    header("location: account.php?alert=not_success");
    exit();
}

?>