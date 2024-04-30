<?php session_start();
if(isset($_SESSION['superadminid'])){
include'config.php';
$uid = $_SESSION['superadminid'];
//QUERY FOR SPECIFIC LOGGED IN USER
$sql = "SELECT * FROM superadminuser where id='$uid'";
$record = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($record);

$sqlcategory = "SELECT * FROM category ";
$recordcategory = mysqli_query($conn,$sqlcategory);
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
                <a class="nav-link" href="logoutsuperadmin.php?lid=<?php echo $row['id'];?>">
                    <span>logout</span></a>
            </li>
            

            <!-- Divider -->
           
        </ul>
        <!-- End of Sidebar -->


         <!--BODY STARTS-->
            <div class="container">
                            <div class="row">
                                <div class="col-lg-12" style="text-align: center;">
                                    <h4 style="margin-top:50px;">Categories</h4>
                                    <hr>
                                    <br>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-lg-12">
                                    <h4><center>Add category</center></h4>
                                    <form method="POST" action="addcategory.php">
                                      <div class="form-group">
                                        <label for="exampleInputEmail1">Category Name</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="category" required>
                                        
                                      </div>
                                      <button type="submit" class="btn btn-primary" name="add">Add Category</button>
                                    </form>
                                </div>
                            </div>

                            <hr>
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
                                 else{
                                ?>
                                   <div class="alert alert-danger" role="alert" id="alert">
                                  Error
                                </div>
                                <?php
                                 }


                                }
                                   ?>
                            <hr>

                            <div class="row">
                                <table class="table">
                                  <thead class="thead-dark">
                                    <tr>
                                      <th scope="col">Category Name</th>
                                      <th scope="col">Option</th>
                                      
                                    </tr>
                                  </thead>
                                  <tbody>

                                    <?php while($rowcategory=mysqli_fetch_array($recordcategory)){
                                        $delcategory=$rowcategory['id'];
                                        
                                        ?>
                                        <tr>
                                       <td>
                                        <div style="">
                                            <?php echo $rowcategory['category'] ; ?>
                                        </div></td>
                                        
                                        <td>
                                        <div style="">
                                            <?php echo"<a href='deletecategory.php?id=$delcategory'>"."<div class='btn btn-danger btn-sm btn-block'>Delete</div>"."</a>"; ?>
                                        </div></td>
                                        


                                        
                                    </tr>
                                    <hr>
                                    <?php } ?>


                                            </tbody>
                                        </table>
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
    
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
</html>
<?php }else{header('Location:superadmin.php?alert=login_first');
    }?>