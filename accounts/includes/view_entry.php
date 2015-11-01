<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>JobBucket.com </title>
	<meta name="description" content="maidsjobs">
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="styles/style.css" media="all" />
</head>
<body>
	<h2>View all entries here</h2>
	<table class="table table-hover">
		<thead>	 
			<tr>
				<th>Worker id</th> 
				<th>Name</th> 
				<th>Image</th> 
				<th>Edit</th> 
				<th>Delete</th>  
			</tr>
		</thead>
		<tbody>
	<?php
		include("includes/db.php");
		
		$get_products = "select* from workers";
		$run_products =mysqli_query($con, $get_products);
		$i=1;
		while ($row_products = mysqli_fetch_array($run_products)) {
			$worker_id = $row_products['worker_id'];
			$name = $row_products['name'];
			$image = $row_products['image'];
	?>
			<tr>
				<td><?php  echo $i++;?></td>	  
				<td><?php  echo $name;?></td>	  
				<td><img src="worker_images/<?php if(!empty($image))  echo $image; else echo "noimg.jpg"; ?>" width="60px" height="60px"></td>	  
				<td><a class="btn btn-success" href="index.php?edit_entry=<?php echo $worker_id;?>">Edit</td>	 
				<td><a class="btn btn-danger" href="includes/delete_entry.php?delete_entry=<?php echo $worker_id;?>">Delete</a></td>
			</tr> 
	<?php   }?>			
		</tbody>
	</table>				 
</body>
</html>