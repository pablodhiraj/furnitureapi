<?php 
  session_start();
  if(isset($_POST['login'])){
    include'config.php';

    $uemail = $_POST['email'];
    $pwd = $_POST['password'];    

    //error handlers

    if(empty($uemail) || empty($pwd)){
      header("location:loginmerchant.php?alert=empty");
      exit();
    }else{
      $sql = "SELECT * FROM users WHERE email='$uemail' ";
      $result = mysqli_query($conn,$sql);
      $resultCheck = mysqli_num_rows($result);
      if($resultCheck < 1) {
        header("Location: loginmerchant.php?alert=nosuchuser");
        exit();
      }else {
        if ($row = mysqli_fetch_assoc($result)){
          //dehashing password
          $hashedPwdCheck = password_verify($pwd, $row['password']);
          if($hashedPwdCheck == false){
            header("Location: loginmerchant.php?alert=password_error");
            exit();
          }elseif($hashedPwdCheck == true){


            //login User her
            $_SESSION['id'] = $row['id'];
              header("Location:userdashboard.php?alert=success");
            exit();
            
          }
        }
      }
    }
  }else{
    header("Location: loginmerchant.php?alert=login_error");
    exit();
  }

?>