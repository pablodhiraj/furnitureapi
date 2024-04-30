<?php 
  session_start();
  if(isset($_POST['login'])){
    include'config.php';

    $uid = $_POST['username'];
    $pwd = $_POST['password'];    

    //error handlers

    if(empty($uid) || empty($pwd)){
      header("location:superadmin.php?alert=empty");
      exit();
    }else{
      $sql = "SELECT * FROM superadminuser WHERE username='$uid' ";
      $result = mysqli_query($conn,$sql);
      $resultCheck = mysqli_num_rows($result);
      if($resultCheck < 1) {
        header("Location: superadmin.php?alert=nosuchuser");
        exit();
      }else {
        if ($row = mysqli_fetch_assoc($result)){
          //dehashing password
          $hashedPwdCheck = password_verify($pwd, $row['password']);
          if($hashedPwdCheck == false){
            header("Location: superadmin.php?alert=password_error");
            exit();
          }elseif($hashedPwdCheck == true){


            //login User her
            $_SESSION['superadminid'] = $row['id'];
              header("Location:superadmindashboard.php?alert=success");
            exit();
            
          }
        }
      }
    }
  }else{
    header("Location: superadmin.php?alert=login_error");
    exit();
  }

?>