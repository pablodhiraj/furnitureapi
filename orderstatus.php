<?php
include 'config.php';
$productid = $_GET['productid'];
$sql = "UPDATE productorder SET status='delivered' WHERE productid='$productid'";
$sql1 = "UPDATE products SET soldout = '0' where id='$productid'";
mysqli_query($conn, $sql1);
//execute the query
if (mysqli_query($conn, $sql))
    header("refresh:0;url=userorders.php?alert=delivered");
else
    header("refresh:0;url=userorders.php?alert=not_delivered");



?>