<?php 
  session_start();
  if(isset($_POST['login'])){
    include'config.php';

    $uemail = $_POST['email'];
    $pwd = $_POST['password'];  
    $_SESSION['useremail']=$uemail;  
  
    //error handlers

    if(empty($uemail) || empty($pwd)){
      header("location:login.php?alert=empty");
      exit();
    }else{
      $sql = "SELECT * FROM buyer WHERE email='$uemail' ";
      $result = mysqli_query($conn,$sql);
      $resultCheck = mysqli_num_rows($result);
      if($resultCheck < 1) {
        header("Location: login.php?alert=nosuchuser");
        exit();
      }else {
        if ($row = mysqli_fetch_assoc($result)){
          //dehashing password
          $hashedPwdCheck = password_verify($pwd, $row['password']);
          if($hashedPwdCheck == false){
            header("Location: login.php?alert=password_error");
            exit();
          }elseif($hashedPwdCheck == true){


            //login User her
            $_SESSION['buyerid'] = $row['id'];
              header("Location:index.php");
            exit();
            
          }
        }
      }
    }
  }else{
    header("Location:login.php?alert=login_error");
    exit();
  }

?>