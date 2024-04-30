<?php 
include'config.php';
session_start();

$productid=$_GET['id'];
$buyerid=$_GET['buyerid'];
$sqlproducts = "SELECT * FROM products WHERE id='$productid'";
$recordproducts = mysqli_query($conn,$sqlproducts);

while($rowproducts=mysqli_fetch_array($recordproducts)){

	$name=$rowproducts['name'] ;
	$location=$rowproducts['location'] ;
	$price=$rowproducts['price'] ;
	$discount=$rowproducts['discount'] ;
	$category=$rowproducts['category'] ;
	$description=$rowproducts['description'] ;
	$userid=$rowproducts['userid'] ;
	$storename=$rowproducts['storename'];


	}

	 if (mysqli_query($conn,"INSERT INTO cart (name,location,category,discount,price,description,buyerid,productid,userid,storename) VALUES ('$name','$location','$category','$discount','$price','$description','$buyerid','$productid','$userid','$storename')")) {
            header("location: cart.php?alert=added");
                }
            else{
            header("location: cart.php?alert=not_added");
            exit();                 
    }

?>