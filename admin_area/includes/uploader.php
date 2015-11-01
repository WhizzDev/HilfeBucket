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
<body >
<?php
include("db.php");
if(isset($_GET['uploader'])) {
	$id = $_GET['uploader'];
	$select_product = "select * from self where worker_id='$id' ";
	$run_query = mysqli_query($con, $select_product);
	while ($row_product = mysqli_fetch_array($run_query)) {
		$worker_id = $row_product['worker_id'];
        $occ_id = $row_product['occ_id'];
        $genre_id = $row_product['genre_id'];
		$name = $row_product['name'];
		$dob = $row_product['dob'];
		$org = $row_product['org'];
		$year = substr($dob, 0, 4);
		$month = substr($dob, 5, 2);
		$dy = substr($dob, 8, 2);
		$religion = $row_product['religion'];
		$gender = $row_product['gender'];
        $fee = $row_product['fee'];
		$state = $row_product['state'];
		$city = $row_product['city'];
		$area = $row_product['area'];
		$experience = $row_product['experience'];
		$work_desc= $row_product['work_desc'];
		$family_desc = $row_product['family_desc'];
        $image= $row_product['image'];
		
		$occ = "select * from occupations where occ_id = '$occ_id'";
		$genre = "select * from genre where genre_id = '$genre_id'";
		$run_occ = $con->query($occ);
		$run_genre = $con->query($genre);
		$get_occ = mysqli_fetch_array($run_occ);
		$get_genre = mysqli_fetch_array($run_genre);
		
		$occ_title = $get_occ['occ_title'];
		$genre_title = $get_genre['genre_title'];
		
		if($gender == 'f')
			$gender = "Female";
		else
			$gender = "Male";
	}
}
?>

<h2 align="center">Resume of <?php echo $name;?><hr>   
<img src="../accounts/worker_images/<?php if(!empty($image)) echo $image; else echo "noimg.jpg"; ?>" height="300" width="300"></h2>
<?php
	echo "
		<div class='col-md-12'>
			<table class='table table-hover'>
				<tbody>
				<tr>
					<td>NAME</td>
					<td>$name</td>
				</tr>
				<tr>
					<td>OCCUPATION</td>
					<td>$occ_title</td>
				</tr>
				<tr>
					<td>GENRE</td>
					<td>$genre_title</td>
				</tr>
				<tr>
					<td>SALARY EXPECTED</td>
					<td>&#8377;$fee</td>
				</tr>
				<tr>
					<td>AREA OF WORK</td>
					<td>$area, $city, $state</td>
				</tr>
				<tr>
					<td>EXPERIENCE</td>
					<td>$experience</td>
				</tr>
				<tr>
					<td>WORK DESCRIPTION</td>
					<td>$work_desc</td>
				</tr>
				<tr>
					<td>REFERING ORGANIZATION/INDIVIDUAL</td>
					<td>$org</td>
				</tr
				<tr>
					<td>SEX</td>
					<td>$gender</td>
				</tr>
				<tr>
					<td>RELIGION</td>
					<td>$religion</td>
				</tr>
				<tr>
					<td>DATE OF BIRTH</td>
					<td>$dob</td>
				</tr>
				<tr>
					<td>BEHAVARIAL & FAMILY DESCRIPTION</td>
					<td>$family_desc</td>
				</tr>
				</tbody>
			</table>
		</div>
	";
?>	
<a class="btn btn-success" style="margin-bottom:50px; margin-right:20px" href="index.php?app_upload=<?php echo $worker_id;?>" >Approve</a>
<a class="btn btn-danger" style="margin-bottom:50px" href="index.php?del_upload=<?php echo $worker_id;?>" >Delete</a>