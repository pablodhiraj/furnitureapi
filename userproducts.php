<?php session_start();
if(isset($_SESSION['id'])){
include'config.php';
$uid = $_SESSION['id'];
//QUERY FOR SPECIFIC LOGGED IN USER
$sql = "SELECT * FROM users where id='$uid'";
$record = mysqli_query($conn,$sql);
$row = mysqli_fetch_array($record);

$sqlcategory = "SELECT * FROM category ";
$recordcategory = mysqli_query($conn,$sqlcategory);

$sqlproducts = "SELECT * FROM products WHERE userid='$uid' ";
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
                                    <h4 style="margin-top:50px;">Products</h4>
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
                                    <h4><center>Add Products</center></h4>
                                    <form method="POST" action="addproducts.php" enctype="multipart/form-data" name="addroom">
                                      <div class="form-group">
                                        <label for="exampleInputEmail1">Product Name</label>
                                        <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="product" required>
                                      </div>
                                      <div class="form-group">
                                          <label for="exampleInputEmail1">Select Category</label>
                                          <select class="form-control" id="exampleFormControlSelect1" name="category">
                                            <?php while($rowcategory=mysqli_fetch_array($recordcategory)){
                                            ?>
                                              <option><?php echo $rowcategory['category'];?></option>
                                            <?php }?>
                                          </select>
                                      </div>
                                      <div class="form-group">
                                        <label for="exampleInputEmail1">Actual Price</label>
                                        <input type="number" min="0" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="price" onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))"  required>
                                      </div>
                                      <div class="form-group">
                                        <label for="exampleInputEmail1">Discount Price</label>
                                        <input type="number" min="0"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="discount" onkeypress="return (event.charCode !=8 && event.charCode ==0 || (event.charCode >= 48 && event.charCode <= 57))"   required>
                                      </div>
                                      <div class="form-group">
                                        <label for="exampleFormControlTextarea1">Description</label>
                                        <textarea id="editor" name="description"></textarea>
                                      </div>
                                      <div class="form-group">
                                        <label for="exampleFormControlFile1">Select Picture</label>
                                        <input type="file" class="form-control-file" id="exampleFormControlFile1" name="image" required>
                                      </div>
                                      <input type="hidden" name="userid" value="<?php  echo $row['id'];?>" required>
                                      <input type="hidden" name="store" value="<?php  echo $row['storename'];?>" required>
                                      <button type="submit" class="btn btn-primary" name="add">Add Product</button>
                                    </form>
                                </div>
                            </div>

                            <hr>


                            <div class="row">
                                <table class="table">
                                  <thead class="thead-dark">
                                    <tr>
                                      <th scope="col">Product Name</th>
                                      <th scope="col">Category</th>
                                      <th scope="col">Actual Price</th>
                                      <th scope="col">Discount Price</th>
                                      <th scope="col">Description</th>
                                      <th scope="col">Image</th>
                                      <th scope="col">Option</th>
                                      
                                    </tr>
                                  </thead>
                                  <tbody>

                                    <?php while($rowproducts=mysqli_fetch_array($recordproducts)){
                                        $delproduct=$rowproducts['id'];
                                        $dellocation=$rowproducts['location'];
                                        
                                        ?>
                                        <tr>
                                       <td>
                                        <div style="">
                                            <?php echo $rowproducts['name'] ; ?>
                                        </div></td>

                                        <td>
                                        <div style="">
                                            <?php echo $rowproducts['category'] ; ?>
                                        </div></td>

                                        <td>
                                        <div style="">
                                            <?php echo $rowproducts['price'] ; ?>
                                        </div></td>

                                        <td>
                                        <div style="">
                                            <?php echo $rowproducts['discount'] ; ?>
                                        </div></td>

                                        <td>
                                            <div style="">
                                            <?php echo $rowproducts['description'] ; ?>
                                        </div></td>

                                        <td>
                                        <div style="">
                                            <img src="<?php echo $rowproducts['location'] ; ?>" style="height:100px;width:100px;">
                                            
                                        </div></td>
                                        
                                        <td>
                                        <div style="">
                                            <?php echo"<a href='deleteproduct.php?id=$delproduct&fileid=$dellocation'>"."<div class='btn btn-danger btn-sm btn-block'>Delete</div>"."</a>"; ?>
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
        
        // document.getElementsByName("price").addEventListener("input", ()=>{
        //     value =event.target.value;
        //     console.log(value);
        // });
        


        
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