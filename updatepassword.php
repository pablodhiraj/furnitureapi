<?php 
    session_start();
    if(isset($_POST['update'])){
        include'config.php';
        $pwd = $_POST['pass'];
        $id=$_POST['id'];       

        //error handlers

        $hashedPwd = password_hash($pwd,PASSWORD_DEFAULT);
        $sql = "UPDATE users SET password='$hashedPwd' WHERE id=$id";
        
    //execute the query
        if(mysqli_query($conn,$sql)){
         header("Location:userpassword.php?alert=updated");
        }
        else{
            header("Location:userpassword.php?alert=notupdated");
        }
        }

?>