<?php 
include'config.php';

if (!isset($_FILES['image']['tmp_name'])) {
    echo "";
    }else{
    $file=$_FILES['image']['tmp_name'];
    $image= addslashes(file_get_contents($_FILES['image']['tmp_name']));
    $image_name= addslashes($_FILES['image']['name']);
            
            move_uploaded_file($_FILES["image"]["tmp_name"],"slider/" .time(). $_FILES["image"]["name"]);
            
            $location="slider/" .time(). $_FILES["image"]["name"];
           if (mysqli_query($conn,"INSERT INTO slider (location) VALUES ('$location')")) {
            header("location: slider.php?alert=inserted");
                }
            else{
            header("location: slider.php?alert=not_inserted");
            exit();                 
    }
             
    }
?>