<?php
require("config.php");

if (isset($_GET['email']) && isset($_GET['v_code'])) {
    $email = $_GET['email'];
    $v_code = $_GET['v_code'];

    $query = "SELECT * FROM buyer WHERE email='$email' AND verification_token='$v_code'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        if (mysqli_num_rows($result) == 1) {
            $result_fetch = mysqli_fetch_assoc($result);

            if ($result_fetch['is_verified'] == 0) {
                $update = "UPDATE `buyer` SET `is_verified`='1' WHERE `email`='$email'";

                if (mysqli_query($conn, $update)) {
                    echo "<script>
                        alert('Email Verification successful');
                        window.location.href='loginmerchant.php'
                    </script>";
                } else {
                    echo "<script>
                        alert('Cannot run query');
                        window.location.href='registermerchant.php'
                    </script>";
                }
            } else {
                echo "<script>
                    alert('Email already registered');
                    window.location.href='registermerchant.php'
                </script>";
            }
        }
    } else {
        echo "<script>
            alert('Cannot run query');
            window.location.href='registermerchant.php'
        </script>";
    }
}
