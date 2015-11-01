<?php
include("includes/db.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>JobBucket.com</title>
	<meta name="description" content="Wiredwiki App">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
</head>
</html>
<?php
include("db.php");
if(isset($_GET['app_upload'])) {
	$id = $_GET['app_upload'];
	$select_product = "select * from self where worker_id='$id' ";
	$run_query = mysqli_query($con, $select_product);
	while ($row_product = mysqli_fetch_array($run_query)) {
		$worker_id = $row_product['worker_id'];
        $occ_id = $row_product['occ_id'];
        $genre_id = $row_product['genre_id'];
		$name = $row_product['name'];
		$dob = $row_product['dob'];
		$religion = $row_product['religion'];
		$gender = $row_product['gender'];
		$fee = $row_product['fee'];
		$org = $row_product['org'];
		$state = $row_product['state'];
		$city = $row_product['city'];
		$area = $row_product['area'];
		$experience = $row_product['experience'];
		$work_desc= $row_product['work_desc'];
		$family_desc = $row_product['family_desc'];
		$image= $row_product['image'];
	}
		
		$insert_res = "insert into workers
			(worker_id,occ_id,genre_id,name,dob,religion,gender,fee,org,state,city,area,
			experience,work_desc,family_desc,image)  values
			('','".$occ_id."','".$genre_id."','".$name."','".$dob."','".$religion."','".$gender."',
			'".$fee."','','".$state."','".$city."','".$area."','".$experience."','".$work_desc."',
			'".$family_desc."','".$image."')";
			
		$insert_worker = mysqli_query($con, $insert_res);
		
		$update_stat = "UPDATE self set status ='approved' WHERE worker_id ='$worker_id'";
			
		$insert_worker = mysqli_query($con, $update_stat);
		
		if($insert_worker) {
			echo"<script>alert ('Resume has been Approved !!')</script>";
            echo"<script>window.open('index.php','_self')</script>";
		}
	
}
?>
