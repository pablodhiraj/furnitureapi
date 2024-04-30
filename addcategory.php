<?php 
include'config.php';

            $category=$_POST['category'];
            

           if (mysqli_query($conn,"INSERT INTO category (category) VALUES ('$category')")) {
            header("location: categories.php?alert=inserted");
                }
            else{
            header("location: categories.php?alert=not_inserted");
            exit();                 
    }
             
    
?>