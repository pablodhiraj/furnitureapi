<?php
require 'config.php';

error_reporting(E_ALL);
ini_set('display_errors', 1);

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require './PHPMailer/Exception.php';
require './PHPMailer/PHPMailer.php';
require './PHPMailer/SMTP.php';

$mail = new PHPMailer(true);

function sendMail($email, $v_code)
{
    global $mail;

    try {
        //Server settings
        $mail->isSMTP(); //Send using SMTP
        $mail->Host = 'smtp.gmail.com'; //Set the SMTP server to send through
        $mail->SMTPAuth = true; //Enable SMTP authentication
        $mail->Username = 'aprincekushwaha@gmail.com'; //Your Gmail email address
        $mail->Password = 'zmnqzqkgzcialpne'; //Your Gmail password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS; //Enable implicit TLS encryption
        $mail->Port = 465; //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`

        //Recipients
        $mail->setFrom('aprincekushwaha@gmail.com', 'Dhiraj'); //Your Gmail email address and your name
        $mail->addAddress($email); //Recipient email address

        //Content
        $mail->isHTML(true); //Set email format to HTML
        $mail->Subject = "Email Verification from Dhiraj";
        $mail->Body = 'Thanks for registering! Click the link below to verify your email: <a href="http://localhost/furnitureland/customer_verification.php?email=' . $email . '&v_code=' . $v_code . '">Verify</a>';

        $mail->send();
        echo 'Message has been sent';
    } catch (Exception $e) {
        echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
    }
}

if (isset($_POST['submit'])) {
    $first = $_POST['first'];
    $last = $_POST['second'];
    $password = $_POST['pass'];
    $email = $_POST['email'];
    $number = $_POST['txtEmpPhone'];
    $address = $_POST['address'];
    $hashedPwd = password_hash($password, PASSWORD_DEFAULT);

    $sqlCheckEmail = "SELECT * FROM buyer WHERE email = '$email'";
    $resultCheckEmail = mysqli_query($conn, $sqlCheckEmail);

    if (mysqli_num_rows($resultCheckEmail) > 0) {
        // Email already exists, redirect with an error alert
        echo "<script>
            alert('Email Already Taken');
            window.location.href='loginmerchant.php'
            </script>";
    } else {
        $v_code = bin2hex(random_bytes(16));
        // Proceed with the registration process
        // Insert the user's details into the database
        $query = "INSERT INTO buyer (fname, lname, password, email, address, phone, verification_token, is_verified) VALUES ('$first', '$last', '$hashedPwd', '$email',  '$address', $number ,'$v_code','0')";

        if (mysqli_query($conn, $query)) {
            // Registration successful, send verification email
            sendMail($email, $v_code);

            echo "<script>
            alert('Registration Successful');
            window.location.href='customer_login.php'
            </script>";
        } else {
            // Error while inserting into the database, redirect with error alert
            echo "<script>
            alert('Server Error');
            window.location.href='customer_register.php'
            </script>";
        }
    }
}
?>
