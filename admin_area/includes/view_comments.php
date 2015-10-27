<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>HilfeBucket.com </title>
	<meta name="description" content="maidsjobs">
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
</head>
<body>
	<h2>Comment Section</h2>
	<table class="table table-hover">
		<thead>	 
			<tr>
				<th>SNo.</th> 
				<th>Name</th> 
				<th>Worker Name</th>
				<th>Email</th>
				<th>Posted Comment</th>
				<th>Status</th>
			</tr>
		</thead>
		<tbody>
<?php
	include("includes/db.php");
	$get_comments = "SELECT workers.name, comments.* FROM workers, comments WHERE workers.worker_id = comments.worker_id";
	$run_comments = $con->query($get_comments);
	$i = 1;
	while($row = $run_comments->fetch_assoc()) {
		$name = $row['name'];
		$comment_id = $row['comment_id'];
		$comment_name = $row['comment_name'];
		$email = $row['comment_email'];
		$comment = $row['comment_text'];
		$status =$row['status'];
?>
			<tr>
				<td><?php echo $i++;?></td>
				<td><?php echo $comment_name;?></td>
				<td><?php echo $name;?></td>
				<td><?php echo $email;?></td>
				<td><?php echo $comment;?></td>
				<td><?php echo $status;?></td>
			</tr>
<?php }?>
		</tbody>
	</table>	
</body>
</html>