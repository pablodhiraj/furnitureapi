<?php 
include'config.php';
$productid=$_GET['productid'];
           $sql = "UPDATE checkout SET status='canceled'WHERE id=$productid";
                //execute the query
                if(mysqli_query($conn,$sql))
                    header("refresh:0;url=account.php?alert=canceled");
                else
                header("refresh:0;url=account.php?alert=not_canceled");
    
             
    
?>