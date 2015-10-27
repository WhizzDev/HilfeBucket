<?php
include("db.php");
$del_id = $_GET['del_id'];
$delete = "DELETE FROM comments WHERE comment_id = '$del_id'";
$run = $con->query($delete);
$delete = "DELETE FROM ratings WHERE comment_id = '$del_id'";
$run = $con->query($delete);
if($run){
	echo "<script>alert('A Comment has been Successfully Deleted.')</script>";
	echo "<script>window.open('../index.php?view_uncomments','_self')</script>";
}
?>