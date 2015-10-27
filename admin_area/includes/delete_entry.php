<?php
include("db.php");

if(isset($_GET['delete_entry'])) {
	$delete_id = $_GET['delete_entry'];
	$delete_product ="delete from workers where worker_id='$delete_id'";
	$run_delete = mysqli_query($con, $delete_product);
	echo "<script>alert('An entry has been deleted')</script>";
	echo "<script>window.open('../index.php?view_entry','_self')</script>";
}
?>