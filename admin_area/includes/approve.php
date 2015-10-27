<?php
include("db.php");
$app_id = $_GET['app_id'];
$approve = "UPDATE comments set status = 'approved' WHERE comment_id = '$app_id'";
$run = $con->query($approve);
if($run){
	echo "<script>alert('A Comment has been Successfully Approved.')</script>";
	echo "<script>window.open('../index.php?view_uncomments','_self')</script>";
}
?>