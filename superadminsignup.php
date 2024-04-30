<?php 
	session_start();
	if (isset($_POST['signup'])){
		include_once 'config.php';
		$uid = $_POST['username'];
		$pwd = $_POST['password'];
		
		
		//Error Handlers
		//Check For Empty Fields

		if (empty($uid) || empty($pwd)){
			header("Location: superadminregistration.php?signup=empty");
			exit();
		}
				else{
					$sql = "SELECT * FROM superadminuser WHERE username='$uid'";
					$result = mysqli_query($conn, $sql);
					$resultCheck = mysqli_num_rows($result);

					if($resultCheck > 0){
						header("Location: superadminregistration.php?signup=usertaken");
						exit();
					}
					else{
						//Hashing the password
						$hashedPwd = password_hash($pwd,PASSWORD_DEFAULT);

						
						
						//Insert the register into the database
						$sql = "INSERT INTO superadminuser (username,password) VALUES ('$uid','$hashedPwd');";
						mysqli_query($conn, $sql);
						header("Location:superadminregistration.php?success");
						exit();
					}
				}
			}
	else{
		header("Location:superadminregistration.php?Error");
		exit();
		}
?>