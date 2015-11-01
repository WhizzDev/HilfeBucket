<?php
include("includes/db.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Bucket</title>
	<meta name="description" content="playschoolnoida">
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
<div class ="container col-md-12">
	<table class= "table table-hover">
		
		<tr>
			<th>Name</th>
			<th>Image</th>
			<th>Job</th>
			<th>Transaction No.</th>
		</tr>
		<tbody>
<?php
$select_product = "select  * from `transaction`  where member_id='".$_SESSION['user_id']."' ";
$run_query = mysqli_query($con, $select_product);
while ($row_product = mysqli_fetch_array($run_query)) {
	$worker_id = $row_product['worker_id'];
	$id = $row_product['id'];
	$hire = "SELECT name,occ_id,image FROM `workers` WHERE worker_id='$worker_id' ";
	$run =$con->query($hire);
	$row = $run->fetch_assoc();
	$name= $row['name'];
	$occ_id = $row['occ_id'];
	$image = $row['image'];
	$hire = "SELECT * FROM `occupations` WHERE occ_id='$occ_id' ";
	$run =$con->query($hire);
	$row = $run->fetch_assoc();
	$occ_title=$row['occ_title'];
   
	echo "<tr>
	                 <td>$name</td>
	                 <td><img src='../admin_area/worker_images/$image' height='100' width='100'></td>
	                 <td>$occ_title</td>
	                 <td>$id</td>
				</tr>";
	
}
?>
		</tbody>
	</table>
</div>
</body>
</html>