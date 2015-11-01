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
<?php
include("db.php");
    $select_product = "select status from self where member_id='".$_SESSION['user_id']."' ";
	$run_query = mysqli_query($con, $select_product);
	while ($row_product = mysqli_fetch_array($run_query)) {
		$status = $row_product['status'];
			if($status == 'approved'){
				echo "<h3>Congratulations!! Your Resume has been Approved.</h3>";
			}
			else{
				echo"<h3>Your Resume Approval is yet to be processed.</h3>";
			}
	}
?>