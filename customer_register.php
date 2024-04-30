<!DOCTYPE html>
<html>

<head>
    <title>Registration : PreLoved Shop</title>
</head>
<?php
include 'config.php';
$sqlcategory = "SELECT * FROM category ";
$recordcategory = mysqli_query($conn, $sqlcategory);
$sqlstore = "SELECT * FROM buyer ";
$recordstore = mysqli_query($conn, $sqlstore);

?>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="css/regstyle.css">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

<body>
    <!--navbar-->
    <?php include 'navbar.php'; ?>
    <div class="container alert">
        <div class="row">
            <div class="col-lg-12">
                <?php
                if (isset($_GET['alert'])) {
                    if ($_GET['alert'] == 'success') {
                        ?>
                <div class="alert alert-primary" role="alert" id="alert">
                    Registration Succesful Please Login Now
                </div>
                <?php
                    } else if ($_GET['alert'] == 'usertaken') {
                        ?>
                <div class="alert alert-primary" role="alert" id="alert">
                    email Already Registered Choose Another email
                </div>
                <?php
                    } else if ($_GET['alert'] == 'error') {
                        ?>
                <div class="alert alert-primary" role="alert" id="alert">
                   Registration Error ! Try again!
                </div>
                <?php
                    } else {
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
    </div>
    <div class="containers">
        <div class="left__section">
            <div class="logo__section">
                <img src="images\preloved shop.png" id="logo">
            </div>
            <div class="login-regestration__section">
                <h2 class="login-regestration__heading">Already have an Account?</h2>
                <a class="Login-reg" href="customer_login.php">Login</a>

            </div>
        </div>
        <div class="right__section">
            <div class="right__section__top">
                <h1 class="right__section__top__headingone">
                    Create an Account
                </h1>
                <h3 class="right__section__top__headingtwo">
                    as Merchant
                </h3>
            </div>
            <form method="POST" action="customer_regProcess.php" class="User__form " onsubmit="return matchpass()">
                <div class=" row register-form h-100">
                    <div class="col-md-6">
                        <div class="form-group">
                            <p class="paraName text-left">Name</p>
                            <input type="text" class="form-control" placeholder="First Name *" name="first" value=""
                                required />
                        </div>
                        <div class="form-group">
                            <p class="paraName text-left">Last Name</p>
                            <input type="text" class="form-control" placeholder="Last Name *" name="second" value=""
                                required />
                        </div>
                        <div class="form-group">
                            <p class="paraName text-left">Password</p>
                            <input type="password" class="form-control" id="password" placeholder="Password *"
                                name="pass" value="" required />
                        </div>
                        <div class="form-group">
                            <p class="paraName text-left">Confirm Password</p>
                            <input type="password" class="form-control" id="password2" placeholder="Confirm Password *"
                                value="" required />
                        </div>

                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <p class="paraName text-left">Email</p>
                            <input type="email" class="form-control" placeholder="Your Email *" value="" name="email"
                                required />
                        </div>

                        <div class="form-group">
                            <p class="paraName text-left">Phone number</p>
                            <input type="text" minlength="1" maxlength="10" name="txtEmpPhone" class="form-control"
                                placeholder="Your Phone *" value="" required />
                        </div>
                        <div class="form-group">
                            <p class="paraName text-left">Address</p>
                            <input type="Address" class="form-control" placeholder="Your Address *" value=""
                                name="address" required />



                        </div>

                        <input type="submit" class="btnRegister" value="Register" name="submit" />
                    </div>
                </div>
            </form>
        </div>
    </div>
    <?php include 'footer.php'; ?>
    <script type="text/javascript">
    function matchpass() {
        var firstpassword = document.getElementById('password').value;
        var secondpassword = document.getElementById('password2').value;

        if (firstpassword == secondpassword) {
            return true;
        } else {
            alert("Password incorrect");
            return false;
        }
    }
    </script>

</body>

</html>