<?php session_start();
if(isset($_SESSION['id'])){
include'config.php';
$uid = $_SESSION['id'];
//QUERY FOR SPECIFIC LOGGED IN USER
$sql = "SELECT * FROM users where id='$uid'";
$record = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($record);

$sqlproducts = "SELECT * FROM checkout WHERE userid='$uid' AND paymentstatus='paid' ";
$recordproducts = mysqli_query($conn,$sqlproducts);
?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">

    <title></title>

    <!-- Custom fonts for this template-->
    <link href="admin/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="admin/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="superadmindashboard.php">
                <div class="sidebar-brand-icon rotate-n-15">
                   
                </div>
                <div class="sidebar-brand-text mx-3">Admin<sup></sup></div>
            </a>
<!-- Nav Item - Dashboard -->
            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="userdashboard.php">
                    <span><?php 
                    echo $row['storename'];
                    ?></span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="userorders.php">
                    <span>Orders</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="paymentorders.php">
                    <span>Payment Orders</span></a>
            </li>
            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="userproducts.php">
                    <span>Products</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="userpassword.php">
                    <span>Change Password</span></a>
            </li>
    
            <li class="nav-item active">
                <a class="nav-link" href="logoutuser.php?lid=<?php echo $row['id'];?>">
                    <span>logout</span></a>
            </li>
            

            <!-- Divider -->
           
        </ul>
        <!-- End of Sidebar -->


         <!--BODY STARTS-->
           <!--BODY STARTS-->
            <div class="container">

                            <div class="row">
                                <div class="col-lg-12">
                                    <?php 
                                if (isset($_GET['alert'])) {
                                 if ($_GET['alert']=='inserted') {
                                   ?>
                                   <div class="alert alert-primary" role="alert" id="alert">
                                  Successfully Uploaded
                                </div>
                                <?php
                                 }
                                 
                                 else if ($_GET['alert']=='deleted') {
                                ?>
                                   <div class="alert alert-primary" role="alert" id="alert">
                                  Deleted Succesfully
                                </div>
                                <?php
                                 }
                                 else if ($_GET['alert']=='not_inserted') {
                                ?>
                                   <div class="alert alert-primary" role="alert" id="alert">
                                  Not Inserted
                                </div>
                                <?php
                                 }
                                 else if ($_GET['alert']=='delivered') {
                                ?>
                                   <div class="alert alert-primary" role="alert" id="alert">
                                  Status Changed To Delivered
                                </div>
                                <?php
                                 }
                                 else if ($_GET['alert']=='not_delivered') {
                                ?>
                                   <div class="alert alert-primary" role="alert" id="alert">
                                  Status Not Changed to Delivered
                                </div>
                                <?php
                                 }
                                 else{
                                ?>
                                   <div class="alert alert-danger" role="alert" id="alert">
                                  Error
                                </div>
                                <?php
                                 }


                                }
                                   ?>
                                    <h4><center>Paid Orders</center></h4>
                                    
                                </div>
                            </div>

                            <hr>


                            <div class="row">
                                <table class="table">
                                  <thead class="thead-dark">
                                    <tr>
                                      <th scope="col">Date</th>
                                      <th scope="col">Product Id</th>
                                      <th scope="col">Total Amount</th>
                                      <th scope="col">Image</th>
                                      <th scope="col">Phone Number</th>
                                      <th scope="col">Payment</th>
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
                                        <div style="">
                                            <?php echo $rowproducts['ddate'] ; ?>
                                        </div></td>
                                       <td>
                                        <div style="">
                                            <?php echo $rowproducts['productid'] ; ?>
                                        </div></td>
                                        <td>
                                        <div style="">
                                            <?php echo $rowproducts['amount'] ; ?>
                                        </div></td>
                                        <td>

                                        <div style="">
                                            <img src="<?php echo $rowproducts['location'] ; ?>" style="height:100px;width:100px;">
                                        </div></td>

                                        <td>
                                        <div style="">
                                            <?php echo $rowproducts['buyernumber'] ; ?>
                                        </div></td>

                                        <td>
                                            <?php echo $rowproducts['paymentstatus'] ; ?>
                                        </td>
                                        <td>
                                          <div style="">
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
                                            else{
                                                echo "Error";
                                            }
                                            ?>
                                        </div>
                                        </td>
                                        <td>
                                        <div style="">
                                            <?php 
                                            if($rowproducts['status']==""){


                                            echo"<a href='paidorderstatus.php?productid=$productid'>"."<div class='btn btn-primary btn-sm btn-block'>Delivered</div>"."</a>";
                                            }
                                            else if($rowproducts['status']=="delivered"){
                                               echo"<div class='btn btn-secondary btn-sm btn-block disabled'>Delivered</div>"."</a>"; 
                                            }
                                            else if($rowproducts['status']=="canceled"){
                                               echo"<div class='btn btn-warning btn-sm btn-block disabled'>Cancled</div>"."</a>"; 
                                            }
                                             ?>
                                            
                                        </div></td>
                                        


                                        
                                    </tr>
                                    <hr>
                                    <?php } ?>


                                            </tbody>
                                        </table>
                            </div>

                
            </div>
        

        


        <!--Clear url on page relaod-->
    
<!--hide division after some time-->
    <script type="text/javascript">
        setTimeout(function() {
    $('#alert').fadeOut('fast');
}, 1000);
    </script>
    <script type="text/javascript">
         setTimeout(function() {
        history.pushState('', '', 
         location.href.split('?')[0]);
        }, 1000); // 1 min = 1000 ms * 60 = 60000
    
    </script>
   

    <!-- Bootstrap core JavaScript-->
    <script src="admin/vendor/jquery/jquery.min.js"></script>
    <script src="admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="admin/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="admin/js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="admin/vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="admin/js/demo/chart-area-demo.js"></script>
    <script src="admin/js/demo/chart-pie-demo.js"></script>

</body>

</html>
<?php }else{header('Location:account.php?alert=login_first');
    }?>