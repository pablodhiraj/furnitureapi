<?php session_start();
if(isset($_SESSION['superadminid'])){
include'config.php';
$uid = $_SESSION['superadminid'];
//QUERY FOR SPECIFIC LOGGED IN USER
$sql = "SELECT * FROM superadminuser where id='$uid'";
$record = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($record);

$sqlusers = "SELECT * FROM users";
$recordusers = mysqli_query($conn,$sqlusers);

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
                <div class="sidebar-brand-text mx-3">Super Admin<sup></sup></div>
            </a>
<!-- Nav Item - Dashboard -->
            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="superadmindashboard.php">
                    <span><?php 
                    echo $row['username'];
                    ?></span></a>
            </li>
            <!-- Nav Item - Dashboard -->
            <li class="nav-item active">
                <a class="nav-link" href="categories.php">
                    <span>Categories</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="slider.php">
                    <span>Slider Image</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="users.php">
                    <span>Users</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="logoutsuperadmin.php">
                    <span>logout</span></a>
            </li>
            

            <!-- Divider -->
           
        </ul>
        <!-- End of Sidebar -->


         <!--BODY STARTS-->
            <div class="container">
                <div class="row">
                                <div class="col-lg-12" style="text-align: center;">
                                    <h4 style="margin-top:50px;">Control Panel</h4>
                                    <hr>
                                    <br>
                                </div>
                            </div>

                
                 <div class="row">
                    <h4>Users</h4><br><br>
                    <?php 
                    $i=1;
                    while($rowusers=mysqli_fetch_array($recordusers)){
                         $delusers=$rowusers['storename'];
                      
                    ?>
                    
                    <tr><?php echo $i; ?>.</tr>
                    <tr>
                        <td><?php echo $rowusers['storename'];?>
                        
                        <div style="">
                            <br>
                            <br>

                                            <?php echo"<a href='deleteusers.php?id=$delusers'> "."  <div class='btn btn-danger btn-sm btn-block'>Delete</div>"."</a>" ; ?>
                                            <br>
                                        </div>



                        <br>
                        <br></td>
                    </tr>


                <?php $i=$i+1;}?>
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
<?php }else{header('Location:superadmin.php?alert=login_first');
    }?>