<?php 
include 'config.php';
//execute the query for comments
$id = $_GET['id'];
//$fileid = $_GET['fileid'];
//$filename = $fileid;
  //if (file_exists($filename)) {
  	$sql ="DELETE FROM esewacode WHERE id='$id'";
  	if(mysqli_query($conn, $sql)){
  	//unlink($filename);
    header( 'Location:esewaintegration.php?alert=deleted') ;

    
}
//}


?>