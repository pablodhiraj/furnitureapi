
<?php session_start();
if(isset($_SESSION['id'])){
include'config.php';
$uid = $_SESSION['id'];
//QUERY FOR SPECIFIC LOGGED IN USER
$sql = "SELECT * FROM users where id='$uid'";
$record = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($record);
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
            <!-- <li class="nav-item active">
                <a class="nav-link" href="paymentorders.php">
                    <span>Payment Orders</span></a>
            </li> -->
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
            <div class="container">
                <div class="row">
                                <div class="col-lg-12" style="text-align: center;">
                                    <h4 style="margin-top:50px;">Update Password</h4>
                                    <hr>
                                    <br>
                                </div>
                            </div>
                <div class="row">
                    <div class="col-lg-12">
                        <?php 
if (isset($_GET['alert'])) {
 if ($_GET['alert']=='updated') {
   ?>
   <div class="alert alert-primary" role="alert" id="alert">
  Password Updated Successful
</div>
<?php
 }
 
 else if ($_GET['alert']=='notupdated') {
?>
   <div class="alert alert-primary" role="alert" id="alert">
  Not Updated
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
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <form action="updatepassword.php" method="POST">

                                        <div class="form-group">
                                            <input type="text" class="form-control form-control-user"
                                                id="exampleInputPassword" placeholder="New Password" name="pass" required>
                                        </div>
                                        <input type="hidden" name="id" value="<?php echo $row['id'];?>">
                                        <div class="form-group ">
                                            <input type="submit" class="btn btn-primary " value="Update Password" name="update"></a>
                                        </div>
                                        </div>
                                        
                                        <hr>
                                        
                                    </form>
                    </div>
                </div>
                
            </div>
        

                
                    





        
   

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
<?php }else{header('Location:login.php?alert=login_first');
    }?>