<!DOCTYPE html>
<html>
<head>
    <title>Furniture Land</title>
    <script src="https://khalti.s3.ap-south-1.amazonaws.com/KPG/dist/2020.12.17.0.0.0/khalti-checkout.iffe.js"></script>
</head>
<style type="text/css">
  .design{
    background-color: #F5F4F4;
    padding:80px;
    min-height: 500px;

  }
</style>
<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

require 'config.php';
$sqlcategory = "SELECT * FROM category ";
$recordcategory = mysqli_query($conn,$sqlcategory);


$usersData = `SELECT * FROM users`;
print_r($usersData);
// $quantity=$_POST['qty'];
// $amount=$_POST['amount'];
// $orderid=$_POST['orderid'];
// $userid=$_POST['userid'];

//dummy data for testing
$quantity=4;
$amount=100;
$orderid=789479284;
$userid=1;


$totalamount=$amount*$quantity;
$sqlstore = "SELECT * FROM users ";
$recordstore = mysqli_query($conn,$sqlstore);

$sqlkhalti = "SELECT id FROM `users` WHERE `id`='.$userid.'";
$recordkhalti = mysqli_query($conn,$sqlkhalti);
while($rowkhalti=mysqli_fetch_array($recordkhalti)){
$code=$rowkhalti['code'];

}






?>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
<body>
    <!--navbar-->
    <?php include'navbar.php'; ?>

<?php include'footer.php';?>



<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</body>
</html>