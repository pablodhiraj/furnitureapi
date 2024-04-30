<?php 
include 'config.php';
//execute the query for comments
$id = $_GET['id'];
$fileid = $_GET['fileid'];
	
 	$sqlphotodel = "SELECT * FROM slider where id='$id' ";
	$recordphotodel = mysqli_query($conn,$sqlphotodel);

	while($rowphotodel=mysqli_fetch_array($recordphotodel)){
  	$location=$rowphotodel['location'];
  	$sql ="DELETE FROM slider WHERE id='$id'";

  	if(mysqli_query($conn, $sql)){
  	unlink($location);
    header( 'Location:slider.php?alert=deleted') ;
}
}


?>