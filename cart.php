<!DOCTYPE html>
<html>
<head>
  <title>Furniture Cart</title>
</head>
<?php 
session_start();
if(isset($_SESSION['buyerid'])){
$uid = $_SESSION['buyerid'];
include'config.php';

$sql = "SELECT * FROM buyer where id='$uid'";
$record = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($record);

$sqlcategory = "SELECT * FROM category ";
$recordcategory = mysqli_query($conn,$sqlcategory);

$sqlproducts = "SELECT * FROM cart WHERE buyerid='$uid'";
$recordproducts = mysqli_query($conn,$sqlproducts);

$sqlstore = "SELECT * FROM users ";
$recordstore = mysqli_query($conn,$sqlstore);

?>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">

<body>
  <style type="text/css">
    .cart{
      min-height:500px;
      margin-top:30px;
      margin-bottom: 30px;
    }
  </style>
  <!--navbar-->
  <?php include'navbar.php';?>
  <br><br>
  <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <center><h3>Cart</h3></center>
      </div>
    </div>
  </div>
<div class="container-fluid">
  <div class="row">
    <div class="col-lg-12">
      <?php 
      if (isset($_GET['alert'])) {
 if ($_GET['alert']=='added') {
   ?>
   <div class="alert alert-primary" role="alert" id="alert">
  <center>Added To Cart Successful</center>
</div>
<?php
 }
 
 else if ($_GET['alert']=='not_added') {
?>
   <div class="alert alert-primary" role="alert" id="alert">
  <center>Not Added To Cart</center>
</div>
<?php
 }
 else if ($_GET['alert']=='deleted') {
?>
   <div class="alert alert-danger" role="alert" id="alert">
   <center>Deleted From Cart</center>
</div>
<?php
 }
 else{
?>
   <div class="alert alert-danger" role="alert" id="alert">
  <center>Error</center>
</div>
<?php
 }


}
   ?>
  
    </div>
  </div>
</div>

<div class="container cart">
  <div class="row">
    <table class="table">
      <thead class="thead-dark">
        <tr>
          <th scope="col">Image</th>
          <th scope="col">Name</th>
          <th scope="col">Actual Price</th>
          <th scope="col">Discounted Price</th>
          <th scope="col">Store Name</th>
          <th scope="col">Checkout</th>
          <th scope="col">Delete</th>
        </tr>
      </thead>
    <?php while($rowproducts=mysqli_fetch_array($recordproducts)){
      $productid=$rowproducts['productid'];
      $user=$rowproducts['userid'];
      $buyerid=$row['id'];
      $buyeremail=$row['email'];
    ?>
    
  
  <tr>
    <td>
                                        
      <img class="img-fluid" style="height:100px;width:100px;"src="<?php echo $rowproducts['location'] ; ?>">
  </td>
    <td>
                                        
      <?php echo $rowproducts['name'] ; ?>
  </td>
  <td>
                                        
      <?php echo $rowproducts['price'] ; ?>
  </td>

  <td>
                                        
      <?php echo $rowproducts['discount'] ; ?>
                                       </td>

  <td>
                                       
      <?php echo $rowproducts['storename'] ; ?>
</td>
<td>
                                       
      <a href="checkout.php?id=<?php echo $productid;?>&user=<?php echo $productid;?>&buyerid=<?php echo $buyerid;?>&buyeremail=<?php echo $buyeremail;?>" class="btn btn-primary">Checkout</a>
</td>
<td>
                                       
      <a href="deletecart.php?buyerid=<?php echo $uid; ?>&id=<?php echo $productid;?>" class="btn btn-danger">Delete</a>
</td>
</tr>
<?php }?>
</table>

  </div>
</div>

<!-- ... (previous HTML code) ... -->

<div class="container cart">
  <div class="row">
    <table class="table">
      <!-- ... (table headers and rows) ... -->
    </table>
  </div>
  <!-- Add a new row for the Checkout All button -->
      <!-- <div class="row mt-3">
        <div class="col-lg-12 text-center">
          <a href="checkout_all.php" class="btn btn-success">Checkout All</a>
        </div>
      </div> -->
</div>

<!-- ... (remaining HTML code) ... -->



<?php include'footer.php';?>

<?php }
else if(!isset($_SESSION['buyerid'])){
include'config.php';
$sqlcategory = "SELECT * FROM category ";
$recordcategory = mysqli_query($conn,$sqlcategory);?>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
<body>
  <style type="text/css">
    .cart{
      min-height:500px;
      margin-top:50px;
    }
  </style>
  <!--navbar-->
  <?php include'navbar.php';?>
  <div class="cart">
    <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="alert alert-danger" role="alert">
          <center>Please login To Check Cart Items</center>
        </div>
      </div>
    </div>
  </div>
  </div>
  <?php include'footer.php';?>
<?php }?>


<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</body>
</html>