<!DOCTYPE html>
<html>
<head>
    <title>Furniture Land</title>
    <script src="https://khalti.s3.ap-south-1.amazonaws.com/KPG/dist/2020.12.17.0.0.0/khalti-checkout.iffe.js"></script>
</head>
<style type="text/css">
  .design {
    background-color: #F5F4F4;
    padding: 80px;
    min-height: 500px;
  }
</style>
<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

require 'config.php';
$sqlcategory = "SELECT * FROM category";
$recordcategory = mysqli_query($conn, $sqlcategory);

// Get the submitted form data
$quantity = $_POST['qty'];
// $amount = $_POST['amount'];
$amount = 40;
$orderid = $_POST['orderid'];
// $userid = $_POST['userid'];
$userid = 1;

// Calculate the total amount
$totalamount = $amount * $quantity;

?>

<body>
    <!--navbar-->
    <?php include 'navbar.php'; ?>

    <!-- Payment Gateway Integration -->
    <div class="container design">
        <h1>Payment Details</h1>
        <p>Order ID: <?php echo $orderid; ?></p>
        <p>Total Amount: <?php echo $totalamount; ?></p>

        <button id="payment-button" class="btn btn-primary">Pay with Khalti</button>

        <script>
            var config = {
                publicKey: "test_secret_key_f59e8b7d18b4499ca40f68195a846e9b",
                productIdentity: "<?php echo $orderid; ?>",
                productName: "Red Jacket",
                productUrl: "https://localhost/ecommerce_project/productsdetail.php?id=2",
                eventHandler: {
                    onSuccess: function (payload) {
                        // Payment success handling
                        console.log(payload);

                        // Store the payment details in the database
                        // Adjust the SQL query based on your database schema
                        $sqlPayment = "INSERT INTO payments (orderid, amount, transaction_id, status)
                                       VALUES ('$orderid', '$totalamount', '$payload.token', 'success')";
                        mysqli_query($conn, $sqlPayment);

                        // Redirect to a success page
                        window.location.href = "success.php";
                    },
                    onError: function (error) {
                        // Payment error handling
                        console.log(error);

                        // Store the payment details in the database with error status
                        $sqlPayment = "INSERT INTO payments (orderid, amount, transaction_id, status)
                                       VALUES ('$orderid', '$totalamount', '', 'error')";
                        mysqli_query($conn, $sqlPayment);

                        // Redirect to an error page
                        window.location.href = "error.php";
                    },
                    onClose: function () {
                        // Widget closed handling
                        console.log("Widget closed");
                    }
                }
            };

            var checkout = new KhaltiCheckout(config);
            var paymentButton = document.getElementById("payment-button");
            paymentButton.onclick = function () {
                checkout.show({ amount: <?php echo $totalamount; ?> });
            };
        </script>
    </div>

    <?php include 'footer.php'; ?>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</body>
</html>
