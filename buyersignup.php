<?php
include_once "config.php";
if (isset($_POST['submit'])) {
	$fname = $_POST['first'];
	$lname = $_POST['second'];
	$pass = $_POST['pass'];
	$email = $_POST['email'];
	$address = $_POST['address'];
	$phone = $_POST['txtEmpPhone'];
	$hashedPwd = password_hash($pass, PASSWORD_DEFAULT);


	$sqlCheckEmail = "SELECT * FROM buyer WHERE email = '$email'";
	$resultCheckEmail = mysqli_query($conn, $sqlCheckEmail);

	if (mysqli_num_rows($resultCheckEmail) > 0) {
		// Email already exists, redirect with an error alert
		header("Location: register.php?alert=usertaken");
		exit();
	} else {
		// Proceed with the registration process
		// Insert the user's details into the database
		$sqlInsertUser = "INSERT INTO buyer (fname, lname, password, email, address,phone) VALUES ('$fname', '$lname', '$hashedPwd', '$email',  '$address','$phone')";
		if (mysqli_query($conn, $sqlInsertUser)) {
			// Registration successful, redirect with success alert
			header("Location: login.php?alert=success");
			exit();
		} else {
			// Error while inserting into the database, redirect with error alert
			header("Location: register.php?alert=error");
			exit();
		}
	}
}