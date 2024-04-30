<?php session_start();
if(isset($_SESSION['superadminid'])){
include'config.php';
$uid = $_SESSION['superadminid'];
//QUERY FOR SPECIFIC LOGGED IN USER
$sql = "SELECT * FROM superadminuser where id='$uid'";
$record = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($record);

$sqlslider = "SELECT * FROM slider";
$recordslider = mysqli_query($conn,$sqlslider);
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
    <style type="text/css">
    .ck-editor__editable[role="textbox"] {
                /* editing area */
                min-height: 500px;
            }
</style>

    <!-- Custom fonts for this template-->
    <script src="https://cdn.ckeditor.com/ckeditor5/35.3.2/classic/ckeditor.js"></script>
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
                                    <h4 style="margin-top:50px;">Slider Images</h4>
                                    <hr>
                                    <br>
                                </div>
                            </div>

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
                                    <h4><center>Add Pictures</center></h4>
                                    <form method="POST" action="addslider.php" enctype="multipart/form-data" name="addroom">
                                      
                                      <div class="form-group">
                                        <label for="exampleFormControlFile1">Select Picture</label>
                                        <input type="file" class="form-control-file" id="exampleFormControlFile1" name="image" required>
                                      </div>
                                      <button type="submit" class="btn btn-primary" name="add">Add Image</button>
                                    </form>
                                </div>
                            </div>

                            <hr>


                            <div class="row">
                                <table class="table">
                                  <thead class="thead-dark">
                                    <tr>
                                      <th scope="col">Image</th>
                                      <th scope="col">Option</th>
                                      
                                    </tr>
                                  </thead>
                                  <tbody>

                                    <?php while($rowslider=mysqli_fetch_array($recordslider)){
                                        $delproduct=$rowslider['id'];
                                        $dellocation=$rowslider['location'];
                                        
                                        ?>
                                        <tr>
                                        <td>
                                        <div style="">
                                            <img src="<?php echo $rowslider['location'] ; ?>" style="height:100px;width:100px;">
                                            
                                        </div></td>
                                        
                                        <td>
                                        <div style="">
                                            <?php echo"<a href='deleteslider.php?id=$delproduct&fileid=$dellocation'>"."<div class='btn btn-danger btn-sm btn-block'>Delete</div>"."</a>"; ?>
                                        </div></td>
                                        


                                        
                                    </tr>
                                    <hr>
                                    <?php } ?>


                                            </tbody>
                                        </table>
                            </div>

                
            </div>
        


        
   <script>
        ClassicEditor
            .create( document.querySelector( '#editor' ) )
            .catch( error => {
                console.error( error );
            } );
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