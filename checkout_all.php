<!DOCTYPE html>
<html>

<head>
    <title>Furniture Land</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.6.0/umd/popper.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://khalti.s3.ap-south-1.amazonaws.com/KPG/dist/2020.12.17.0.0.0/khalti-checkout.iffe.js"></script>
    <script src="js/notify.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://khalti.s3.ap-south-1.amazonaws.com/KPG/dist/2020.12.17.0.0.0/khalti-checkout.iffe.js"></script>
    <script src="js/notify.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
<style type="text/css">
    .checkout {
        min-height: 500px;
        margin-top: 30px;
        margin-bottom: 30px;
    }
</style>

</head>










<?php


// error_reporting(E_ALL);
// ini_set('display_errors', 1);


include 'config.php';
$sqlcategory = "SELECT * FROM category ";
$recordcategory = mysqli_query($conn, $sqlcategory);
$id = $_GET['id'];
$buyerid = $_GET['buyerid'];
$buyeremail = $_GET['buyeremail'];

$sqlproducts = "SELECT * FROM products WHERE id='$id'";
$recordproducts = mysqli_query($conn, $sqlproducts);
$sqlstore = "SELECT * FROM users ";
$recordstore = mysqli_query($conn, $sqlstore);
?>

<body>
    <!--navbar-->
    <?php include 'navbar.php'; ?>

    <div class="container checkout">
        <div class="row">
            <?php while ($rowproducts = mysqli_fetch_array($recordproducts)) {
                $productid = $rowproducts['id'];
                $location = $rowproducts['location'];
                $orderid = $rowproducts['id'] + time();
                $amount = $rowproducts['price'];

                $date = date("Y-m-d");
                $user = $rowproducts['userid'];
                $storename = $rowproducts['storename'];
                // $status = $rowproducts['status'];                
                // $paymentStatus = $rowproducts['paymentstatus'];
                //$amount=$rowproducts['discount'];


                // $paymentStatus = "Payment Pending";
                // $status = "unpaid";
                // mysqli_query($conn, "INSERT INTO checkout (ddate,productid,amount,userid,buyerid,buyeremail,location,paymentstatus,status,storename) VALUES ('$date','$orderid','$amount','$user','$buyerid','$buyeremail','$location','$paymentStatus','$status','$storename')");
            ?>
                <div class="col-lg-6">
                    <img class="card-img-top" src="<?php echo $rowproducts['location']; ?>"><br><br>
                    <h5>
                        <?php echo $rowproducts['name']; ?>
                    </h5>
                    <p>Actual Price Rs:
                        <?php echo $rowproducts['price']; ?>
                    </p>
                    <p>Discount Price Rs:
                        <?php echo $rowproducts['discount']; ?>
                    </p>
                    <h5>Description</h5>
                    <p>
                        <?php echo $rowproducts['description']; ?>
                    </p>
                    <h5>Store Name</h5>
                    <p>
                        <?php echo $rowproducts['storename']; ?>
                    </p>

                </div>
                <div class="col-lg-6">
                    <form method="POST" action="checkoutsubmit.php">
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Select Quantity</label>
                            <select name="qty" class="form-control" id="exampleFormControlSelect1">
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                                <option value="6">6</option>
                                <option value="7">7</option>
                                <option value="8">8</option>
                                <option value="9">9</option>
                                <option value="10">10</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Full Name</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required name="username">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Delivery Address</label>
                            <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required name="address">
                        </div>
                        <div class="form-group">
                            <label for="exampleInputEmail1">Phone Number</label>
                            <input type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required name="phonenumber">
                        </div>
                        <input type="hidden" name="userid" value="<?php echo $rowproducts['userid']; ?>" required>
                        <input type="hidden" name="name" value="<?php echo $rowproducts['name']; ?>" required>
                        <input type="hidden" name="category" value="<?php echo $rowproducts['category']; ?>" required>
                        <input type="hidden" name="location" value="<?php echo $rowproducts['location']; ?>" required>
                        <input type="hidden" name="price" value="<?php echo $rowproducts['price']; ?>" required>
                        <input type="hidden" name="buyerid" value="<?php echo $buyerid; ?>" required>
                        <input type="hidden" name="discount" value="<?php echo $rowproducts['discount']; ?>" required>
                        <input type="hidden" name="storename" value="<?php echo $rowproducts['storename']; ?>" required>
                        <input type="hidden" name="date" value="<?php echo date('Y-m-d'); ?>" required>
                        <input type="hidden" name="productid" value="<?php echo $id; ?>" required>
                        
                        <button id="checkout-button" class="btn btn-primary mt-3 submit">Checkout</button>

      

                    </form>
                    <br>
                    <h1> OR, Pay Online</h1>
                    <form action="khalti.php" method="POST">
                        <div class="form-group">
                            <label for="exampleFormControlSelect1">Select Quantity</label>
                            <select name="qty" class="form-control" id="exampleFormControlSelect1">
                                <option value="1">1</option>
                            </select>
                        </div>
                        <!-- <input type="hidden" name="amount" value="<?php echo $rowproducts['discount']; ?>" required>
                    <input type="hidden" name="userid" value="<?php echo $rowproducts['userid']; ?>" required> -->
                        <input type="hidden" name="orderid" value="<?php echo $orderid; ?>" required>
                        <button id="payment-button" class="btn btn-primary mt-3 submit" type="submit" value="Pay via Khalti">Pay with Khalti</button>
                    </form>


                <?php echo $orderid; ?>

                    

                    <!-- Place this where you need payment button -->
                    <!-- Paste this code anywhere in you body tag -->
                    <script>


var paymentButton = document.getElementById("payment-button");
    paymentButton.onclick = function () {
        window.location.href = "https://khalti.com/api/v2/payment/verify/";
    };
// $(document).ready(function() {
//     jQuery("#payment-button").click(function() {
//       // Perform your action here
//       // For example, you can show a message or perform an AJAX request
//       alert("Payment with Khalti clicked!");
      
//       // If you want to submit the form, you can use the following line
//       jQuery("form").submit();
//     });
//   });
//                         var config = {
                            // Replace the publicKey with your own Khalti public key
                            publicKey: "test_public_key_aed053ddcbbe405db62f784378ee439c",
                            productIdentity: "<?php echo $orderid; ?>",
                            productName: "Dragon",
                            productUrl: "http://gameofthrones.wikia.com/wiki/Dragons",
                            paymentPreference: [
                                "KHALTI",
                                "EBANKING",
                                "MOBILE_BANKING",
                                "CONNECT_IPS",
                                "SCT"
                            ],
                            eventHandler: {
                                onSuccess: function(payload) {
                                    console.log(payload);
                                    $.ajax({
                                        url: './verification.php',
                                        type: 'post',
                                        data: {
                                            amount: payload.amount,
                                            trans_token: payload.token,
                                            item_id: payload.id
                                        },
                                        success: function(response) {
                                            $.notify.defaults({
                                                className: "success"
                                            });
                                            $.notify("Payment Successful!", {
                                                position: 'top center',
                                                autoHideDelay: 1500
                                            }).then(function() {
                                                <?php
                                                $paymentData = "INSERT INTO checkout (productid, amount, userid, buyerid, buyeremail, location, paymentstatus, status, storename) 
                        VALUES ('$productid', '$amount', '$userid', '$buyerid', '$buyeremail', '$location', '$paymentstatus', '$status', '$storename')";
                                                mysqli_query($conn, $paymentData);
                                                $sql = "DELETE FROM cart WHERE buyerid='$buyerid' AND productid='$productid'";
                                                $sqlchange = mysqli_query($conn, $sql);
                                                ?>
                                                setTimeout(function() {
                                                    window.location.href = "./cart.php";
                                                }, 2000);
                                            });
                                        },
                                        error: function(error) {
                                            console.log('Transaction failed');
                                        }
                                    });
                                },
                                onError: function(error) {
                                    console.log(error);
                                },
                                onClose: function() {
                                    console.log('Widget is closing');
                                }
                            }
                        };


                        var checkout = new KhaltiCheckout(config);
                        var btn = document.getElementById("payment-button");
                        btn.onclick = function() {
                            // minimum transaction amount must be 10, i.e 1000 in paisa.
                            checkout.show({
                                amount: 1000
                            });
                        }
                    </script>
                </div>
            <?php } ?>
        </div>
    </div>


    <?php include 'footer.php'; ?>



</body>

</html>