<?php

$con = mysqli_connect("localhost", "root", "", "imformaljob");
if  (mysqli_connect_errno() ){
	echo  "failed to connect" . mysqli_connect_error();
}	 
$del_upload = $_GET['del_upload'];
$delete = "DELETE FROM self WHERE worker_id = '$del_upload'";
$run = $con->query($delete);
if($run){
	echo "<script>alert('The Uploaded Resume has been Successfully Deleted.')</script>";
	echo "<script>window.open('../index.php?view_uploaders','_self')</script>";
}
?>