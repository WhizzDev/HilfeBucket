<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>HilfeBucket.com </title>
	<meta name="description" content="maidsjobs">
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="styles/style.css" media="all" />
</head>
<body bgcolor="#ff0000" style="border:solid #000000;">
<?php 
	include_once '../login3/includes/db_connect.php';
	include_once '../login3/includes/functions.php';
	sec_session_start();
	if (login_check($mysqli) == true){
?>
    <div class="container">
    <h1 style="color:#000000;">Hi! <?php echo $_SESSION['username']; ?></h1>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-md-9" style="border:solid #000000; ">
	<?php
		if (isset($_GET['upload'])) {
			include("includes/insert_resume.php");		  
		}
		
        if (isset($_GET['editres'])) {
			include("includes/edit_entry.php");		  
		}
		if (isset($_GET['bucketed'])) {
			include("includes/bucket.php");		  
		}
		if (isset($_GET['check'])) {
			include("includes/hired.php");		  
		}
	?>
			</div>
			<div class="col-md-3">
				<ul class="list-group">
					<a href="../" class="list-group-item">Home</a>
					<a href="index.php?upload" class="list-group-item">Upload Resume</a>
					<a href="index.php?editres&edit_entry" class="list-group-item">Edit Resume</a>
					<a href="index.php?bucketed" class="list-group-item">Bucketed???</a>
					<a href="index.php?check" class="list-group-item">You've Hired</a>
					<a href="../login3/includes/logout.php" class="list-group-item" style="background-color:#5cb85c !important;color:white !important;">Logout</a>
				</ul>
			</div>
		</div>
	</div>
<?php }?>
</body>
</html>