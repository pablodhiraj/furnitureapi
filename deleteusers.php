<?php 
include 'config.php';
//execute the query for comments
$storename = $_GET['storename'];
//$fileid = $_GET['fileid'];
//$filename = $fileid;
  //if (file_exists($filename)) {
  	$sql ="DELETE FROM products WHERE storename='$storename'";
  	if(mysqli_query($conn, $sql)){
  	//unlink($filename);
    header( 'Location:userproducts.php?alert=deleted') ;

    
}
//}


?>