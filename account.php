<!DOCTYPE html>
<html>
<head>
	<title>Furniture Land</title>
</head>
<?php
session_start(); 
if(isset($_SESSION['buyerid'])){
$uid = $_SESSION['buyerid'];
include'config.php';
$sqlcategory = "SELECT * FROM category ";
$recordcategory = mysqli_query($conn,$sqlcategory);

$sqlproducts = "SELECT * FROM productorder WHERE buyerid='$uid' ";
$recordproducts = mysqli_query($conn,$sqlproducts);

$sqlproducts1 = "SELECT * FROM checkout WHERE buyerid='$uid' AND paymentstatus='paid' ";
$recordproducts1 = mysqli_query($conn,$sqlproducts1);
$sqlstore = "SELECT * FROM users ";
$recordstore = mysqli_query($conn,$sqlstore);

?>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
<style type="text/css">
    .account{
      min-height: 500px;
    }
  </style>
<body>
	<?php include'navbar.php'; ?>
<br><br>
<div class="container-fluid">
  <div class="row">
    <div class="col-lg-12">
      <?php 
      if (isset($_GET['alert'])) {
 if ($_GET['alert']=='succesfull_checkout') {
   ?>
   <div class="alert alert-primary" role="alert" id="alert">
  <center>You Have Made A Succesfull Checkout Please Wait For Delivery</center>
</div>
<?php
 }
 
 else if ($_GET['alert']=='not_success') {
?>
   <div class="alert alert-primary" role="alert" id="alert">
  <center>Your Checkout Was Not Succesfull</center>
</div>
<?php
 }
 else if ($_GET['alert']=='canceled') {
?>
   <div class="alert alert-danger" role="alert" id="alert">
   <center>Your Order Has Been Cancled</center>
</div>
<?php
 }
 else if ($_GET['alert']=='payment_succesful') {
?>
   <div class="alert alert-primary" role="alert" id="alert">
   <center>Your Online Payment Was Succesfull</center>
</div>
<?php
 }
 else if ($_GET['alert']=='payment_not_succesful') {
?>
   <div class="alert alert-danger" role="alert" id="alert">
   <center>Your Online Payment Was Not Succesfull</center>
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

<div class="container-fluid account">
  <h5><center>Cash On Delivery Orders</center></h5><br><br>
  <table class="table">
                                  <thead class="thead-dark">
                                    <tr>
                                      <th scope="col">Date</th>
                                      <th scope="col">Product Name</th>
                                      <th scope="col">Price</th>
                                      <th scope="col">Quantity</th>
                                      <th scope="col">Image</th>
                                      <th scope="col">Name</th>
                                      <th scope="col">Address</th>
                                      <th scope="col">Phone Number</th>
                                      <th scope="col">Store Name</th>
                                      <th scope="col">Status</th>
                                      <th scope="col">Option</th>
                                      
                                    </tr>
                                  </thead>
                                  <tbody>

                                    <?php while($rowproducts=mysqli_fetch_array($recordproducts)){
                                        $productid=$rowproducts['id'];
                                        
                                        
                                        ?>
                                        <tr>
                                          <td>
                                        
                                            <?php echo $rowproducts['ddate'] ; ?>
                                        </td>
                                       <td>
                                        
                                            <?php echo $rowproducts['name'] ; ?>
                                        </td>

                                        <td>
                                        
                                            <?php echo $rowproducts['price'] ; ?>
                                       </td>

                                        <td>
                                       
                                            <?php echo $rowproducts['quantity'] ; ?>
                                     </td>

                                        <td>
                                        
                                            <img src="<?php echo $rowproducts['location'] ; ?>" style="height:100px;width:100px;">
                                            
                                        </td>
                                        
                                        <td>
                                        
                                            <?php echo $rowproducts['username'] ; ?>
                                        </td>
                                        <td>
                                       
                                            <?php echo $rowproducts['address'] ; ?>
                                        </td>
                                        <td>
                                        <div style="">
                                            <?php echo $rowproducts['phonenumber'] ; ?>
                                        </div></td>
                                        <td>
                                        <div style="">
                                            <?php echo $rowproducts['storename'] ; ?>
                                        </div></td>
                                        <td>
                                            
                                            <?php 
                                            if(empty($rowproducts['status'])){
                                                echo"Status Pending";
                                            }
                                            else if($rowproducts['status']=="delivered")
                                            {
                                            echo $rowproducts['status'] ; 
                                            }
                                            else if($rowproducts['status']=="canceled")
                                            {
                                            echo $rowproducts['status'] ; 
                                            }
                                            ?>
                                      </td>
                                        <td>
                                        
                                            <?php 
                                            if($rowproducts['status']==""){


                                            echo"<a href='userstatus.php?productid=$productid'>"."<div class='btn btn-danger btn-sm btn-block'>Cancel</div>"."</a>";
                                            }
                                            else if($rowproducts['status']=="delivered"){
                                               echo"<div class='btn btn-secondary btn-sm btn-block disabled'>Delivered</div>"."</a>"; 
                                            }
                                            else if($rowproducts['status']=="canceled"){
                                               echo"<div class='btn btn-warning btn-sm btn-block disabled'>Canceled</div>"."</a>"; 
                                            }
                                             ?>
                                            
                                        </td>
                                        


                                        
                                    </tr>
                                   
                                    <?php } ?>


                                            </tbody>
                                        </table>


                                        <hr>


                                        <!-- <h5><center>Online Payment Orders</center></h5><br><br> -->
                                        <table class="table">
                                  <thead class="thead-dark">
                                    <!-- <tr>
                                      <th scope="col">Date</th>
                                      <th scope="col">Product Id</th>
                                      <th scope="col">Amount</th>
                                      <th scope="col">Image</th>
                                      <th scope="col">Phone Number</th>
                                      <th scope="col">Payment Status</th>
                                      <th scope="col">Status</th>
                                      <th scope="col">Option</th>
                                      
                                    </tr> -->
                                  </thead>
                                  <tbody>

                                    <?php while($rowproducts1=mysqli_fetch_array($recordproducts1)){
                                        $productid1=$rowproducts1['id'];
                                        
                                        
                                        ?>
                                        <tr>
                                          <td>
                                        <div style="">
                                            <?php echo $rowproducts1['ddate'] ; ?>
                                        </div></td>
                                       <td>
                                        <div style="">
                                            <?php echo $rowproducts1['productid'] ; ?>
                                        </div></td>
                                        <td>
                                        <div style="">
                                            <?php echo $rowproducts1['amount'] ; ?>
                                        </div></td>
                                        <td>
                                        <div style="">
                                            <img src="<?php echo $rowproducts1['location'] ; ?>" style="height:100px;width:100px;">
                                            
                                        </div></td>
                                        
                                        <td>
                                        <div style="">
                                            <?php echo $rowproducts1['buyernumber'] ; ?>
                                        </div></td>
                                        <td>
                                        <div style="">
                                            <?php echo $rowproducts1['paymentstatus'] ; ?>
                                        </div></td>
                                        <td>
                                        <div style="">
                                            <?php echo $rowproducts1['status'] ; ?>
                                        </div></td>
                                        
                                        <td>
                                        <div style="">
                                            <?php 
                                            if($rowproducts1['status']==""){


                                            echo"<a href='userpaymentstatus.php?productid=$productid1'>"."<div class='btn btn-danger btn-sm btn-block'>Cancel</div>"."</a>";
                                            }
                                            else if($rowproducts1['status']=="delivered"){
                                               echo"<div class='btn btn-secondary btn-sm btn-block disabled'>Delivered</div>"."</a>"; 
                                            }
                                            else if($rowproducts1['status']=="canceled"){
                                               echo"<div class='btn btn-warning btn-sm btn-block disabled'>Canceled</div>"."</a>"; 
                                            }
                                             ?>
                                            
                                        </div></td>
                                        


                                        
                                    </tr>
                                    
                                    <?php } ?>


                                            </tbody>
                                        </table>
</div>
<?php include'footer.php';?>
<?php }
else{include'config.php';
$sqlcategory = "SELECT * FROM category ";
$recordcategory = mysqli_query($conn,$sqlcategory);?>
  
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
<body>
  <style type="text/css">
    .account{
      min-height: 500px;
      margin-top:50px;
    }
  </style>
  <?php include'navbar.php';?>


<div class="account">
    <div class="container">
    <div class="row">
      <div class="col-lg-12">
        <div class="alert alert-danger" role="alert">
          <center>Please login To Check Account</center>
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