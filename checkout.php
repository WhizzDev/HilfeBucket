<?php
include("functions/function.php");
include_once 'login3/includes/db_connect.php';
include_once 'login3/includes/functions.php';
sec_session_start();
$name = $_POST['name'];
$phno = $_POST['phno'];
$add = $_POST['add'];
$email = $_SESSION['email'];
$member_id = $_SESSION['user_id'];
$ip = getIp();

$get_items =  "select  *  from selections where ip_add='$ip' ";
$run_items = mysqli_query($con,  $get_items);
while($row = $run_items->fetch_assoc()){
	$worker_id = $row['w_id'];
	$query = "insert into transaction (id, worker_id, member_id, name, contact, email, address) values 
	('','$worker_id','$member_id','$name','$phno','$email','$add')";
	$run = $con->query($query);
	$query = "delete from selections where ip_add='$ip' and w_id='$worker_id'";
	$run = $con->query($query);
}

echo "<script>alert('Transaction Done Successfully');</script>";
echo "<script>window.open('../HilfeBucket/','_self');</script>";
?>