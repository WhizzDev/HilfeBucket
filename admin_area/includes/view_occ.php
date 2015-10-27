<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>JobBucket.com </title>
	<meta name="description" content="maidsjobs">
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="styles/style.css" media="all"   />
</head>
<body>
	<h2 align="center">Occupations</h2>
	<table class="table table-hover">
		<thead>	 
			<tr>
				<th>Occupation Id</th> 
				<th>Occupation Title</th> 
			</tr>
		</thead>
		<tbody>
	<?php
		include("includes/db.php");
		
		$get_products = "select* from occupations";
		$run_products =mysqli_query($con, $get_products);
		$i=1;
		while ($row_products = mysqli_fetch_array($run_products)) {
			$occ_id = $row_products['occ_id'];
			$occ_title = $row_products['occ_title'];
	?>
			<tr>
				<td><?php  echo $i++;?></td>	  
				<td><?php  echo $occ_title;?></td>	  
				<td><a class="btn btn-success" href="index.php?edit_occ=<?php echo $occ_id;?>">Edit</td>	 
				<td><a class="btn btn-danger" href="includes/delete_occ.php?delete_occ=<?php echo $occ_id;?>">Delete</a></td>
			</tr> 
	<?php   }?>			
		</tbody>
	</table>				 
</body>
</html>