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
    <div class="container">
    <h1 style="color:#000000;">Welcome to the Admin Panel</h1>
	</div>
	<div class="container">
		<div class="row">
			<div class="col-md-9" style="border:solid #000000; ">
	<?php
		if (isset($_GET['insert_resume'])) {
			include("includes/insert_resume.php");		  
		}
		if (isset($_GET['view_entry'])) {
			include("includes/view_entry.php");		  
		}
		if (isset($_GET['edit_entry'])) {
			include("includes/edit_entry.php");		  
		}
		if (isset($_GET['insert_occ'])){
			include("includes/insert_occ.php");
		}
		if (isset($_GET['insert_genre'])){
			include("includes/insert_genre.php");
		}
		if (isset($_GET['view_genre'])){
			include("includes/view_genre.php");
		}
		if (isset($_GET['edit_genre'])){
			include("includes/edit_genre.php");
		}
		if (isset($_GET['delete_genre'])){
			include("includes/delete_genre.php");
		}
		if (isset($_GET['view_occ'])){
			include("includes/view_occ.php");
		}
		if (isset($_GET['edit_occ'])){
			include("includes/edit_occ.php");
		}
		if (isset($_GET['delete_occ'])){
			include("includes/delete_occ.php");
		}
		if (isset($_GET['view_comments'])){
			include("includes/view_comments.php");
		}
		if (isset($_GET['view_uncomments'])){
			include("includes/view_uncomments.php");
		}
		if (isset($_GET['view_uploaders'])){
			include("includes/view_uploaders.php");
		}
		if (isset($_GET['uploader'])){
			include("includes/uploader.php");
		}
		if (isset($_GET['app_upload'])){
			include("includes/app_upload.php");
		}
		if (isset($_GET['del_upload'])){
			include("includes/del_upload.php");
		}
	?>
			</div>
			<div class="col-md-3">
				<ul class="list-group">
					<a href="index.php?insert_resume" class="list-group-item">Upload Resume</a>
					<a href="index.php?view_entry" class="list-group-item">View all Resume</a>
					<a href="index.php?insert_occ" class="list-group-item">Insert New Occupation</a>
					<a href="index.php?view_occ" class="list-group-item">View all Occupations</a>
					<a href="index.php?insert_genre" class="list-group-item">Insert New Genre</a>
					<a href="index.php?view_genre" class="list-group-item">View all Genres</a>
					<a href="index.php?view_comments" class="list-group-item">View all Comments</a>
					<a href="index.php?view_uncomments" class="list-group-item">View Unapproved Comments</a>
					<a href="index.php?view_customers" class="list-group-item">Customer Records</a>
					<a href="index.php?view_feedback" class="list-group-item">FeedBack</a>
					<a href="index.php?view_helpindia" class="list-group-item">Help India Uploaders</a>
					<a href="index.php?view_uploaders" class="list-group-item">Self Uploaders</a>
					<a href="../" class="list-group-item" style="background-color:#5cb85c !important;color:white !important;">Back</a>
				</ul>
			</div>
		</div>
	</div>
</body>
</html>