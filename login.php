<!DOCTYPE html>
<html>
<head>
	<title>Furniture Land</title>
</head>
<?php 
include'config.php';
$sqlcategory = "SELECT * FROM category ";
$recordcategory = mysqli_query($conn,$sqlcategory);
$sqlstore = "SELECT * FROM users";
$recordstore = mysqli_query($conn,$sqlstore);

?>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Furniture Land</title>
    <link rel="stylesheet" href="css/loginstyle.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
   
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<body>
	<!--navbar-->
	<?php include'navbar.php';?>
<div class="container alert">
  <div class="row">
    <div class="col-lg-12">
      <?php 
                                if (isset($_GET['alert'])) {
                                 if ($_GET['alert']=='empty') {
                                   ?>
                                   <div class="alert alert-primary" role="alert" id="alert">
                                  Please Fill The Fields
                                </div>
                                <?php
                                 }
                                 
                                 else if ($_GET['alert']=='nosuchuser') {
                                ?>
                                   <div class="alert alert-primary" role="alert" id="alert">
                                  This Phone email Doesnot Exist
                                </div>
                                <?php
                                 }
                                 else if ($_GET['alert']=='password_error') {
                                ?>
                                   <div class="alert alert-primary" role="alert" id="alert">
                                  Please Enter The Correct Password
                                </div>
                                <?php
                                 }
                                 else if ($_GET['alert']=='loggedout') {
                                ?>
                                   <div class="alert alert-primary" role="alert" id="alert">
                                  You Have Logged Out
                                </div>
                                <?php
                                 }
                                 else{
                                ?>
                                   <div class="alert alert-danger" role="alert" id="alert">
                                  Success
                                </div>
                                <?php
                                 }


                                }
                                   ?>
    </div>
  </div>
</div>

<div class="containers">
        <div class="left__section__login col-lg-8" id="left">
            <div class="logo__section">
                <img src="images\preloved shop.png" id="logo" ><br>Furniture Land
            </div>
            <div class="welcome__description">
                <h1 class="description__heading">Welcome</h1>
                <h2 class="login-regestration__heading">Don't have an Account?</h2>
                <a class="Login-reg__login" href="register.php" id="reg">Register</a>
            </div>
        </div>
        <div class="right__section__login col-lg-4 my-auto" id="right">
            <div class=" loginBox card border-0 px-4 py-5 ">
                <div class="row mb-4 px-3">

                  

                    
                </div>
                <div class="row px-3 mb-4">
                    <div class="line">

                    </div>
                  
                    <div class="line">

                    </div>
                </div>
                 <form method="POST" action="buyerlogin.php">
                <div class="row px-3"> <label class="mb-1">
                        <h6 class="mb-0 text-sm">Email Address</h6>
                    </label> <input class="mb-4" type="text" name="email" placeholder="Enter a valid email address" required>
                </div>
                <div class="row px-3"> <label class="mb-1">
                        <h6 class="mb-0 text-sm">Password</h6>
                    </label> <input type="password" name="password" placeholder="Enter password" required>
                </div>
                <div class="row px-3 mb-4">

                    <!-- <a href="#" class="ml-auto mb-0 text-sm">Forgot Password?</a> -->
                </div>

                <div class="row mb-3 px-3"> <button type="submit" class="btn btn-blue text-center" name="login">Login</button> </div>
                <div class="row mb-4 px-3">
                    <small class="font-weight-bold">Don't have an account? <a class="text-danger " href="register.php">Register</a>
                    </small>
                </div>
              
            </form>
            </div>
        </div>
       
</body>
</div>
<?php include'footer.php';?>
</body>
</html>