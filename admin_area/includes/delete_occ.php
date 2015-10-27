<?php
//include("db.php");
$con = mysqli_connect("localhost", "root", "", "imformaljob");

if  (mysqli_connect_errno() ){
	echo  "failed to connect" . mysqli_connect_error();
}	

if(isset($_GET['delete_occ'])) {
	$delete_id = $_GET['delete_occ'];
	$delete_product ="delete from occupations where occ_id='$delete_id'";
	$run_delete = mysqli_query($con, $delete_product);
	echo "<script>alert('An entry has been deleted')</script>";
	echo "<script>window.open('../index.php?view_occ','_self')</script>";
}
?>