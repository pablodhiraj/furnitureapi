<?php 
include 'config.php';
//execute the query for comments
$buyerid = $_GET['buyerid'];
$productid = $_GET['id'];
//$fileid = $_GET['fileid'];
//$filename = $fileid;
  //if (file_exists($filename)) {
  	$sql ="DELETE FROM cart WHERE buyerid='$buyerid' AND productid='$productid' ";
  	if(mysqli_query($conn, $sql)){
  	//unlink($filename);
    header( 'Location:cart.php?alert=deleted') ;

    
}
//}


?>