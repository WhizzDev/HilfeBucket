<?php
include("navbar.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>HilfeBucket.com</title>
	<meta name="description" content="maidsjobs">
	<style>
	.star-rating {
		font-size: 0;
		white-space: nowrap;
		display: inline-block;
		width: 100px;
		height: 20px;
		overflow: hidden;
		position: relative;
		background: url('data:image/svg+xml;base64,PHN2ZyB2ZXJzaW9uPSIxLjEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHg9IjBweCIgeT0iMHB4IiB3aWR0aD0iMjBweCIgaGVpZ2h0PSIyMHB4IiB2aWV3Qm94PSIwIDAgMjAgMjAiIGVuYWJsZS1iYWNrZ3JvdW5kPSJuZXcgMCAwIDIwIDIwIiB4bWw6c3BhY2U9InByZXNlcnZlIj48cG9seWdvbiBmaWxsPSIjREREREREIiBwb2ludHM9IjEwLDAgMTMuMDksNi41ODMgMjAsNy42MzkgMTUsMTIuNzY0IDE2LjE4LDIwIDEwLDE2LjU4MyAzLjgyLDIwIDUsMTIuNzY0IDAsNy42MzkgNi45MSw2LjU4MyAiLz48L3N2Zz4=');
		background-size: contain;
	}
	.star-rating i {
		opacity: 0;
		position: absolute;
		left: 0;
		top: 0;
		height: 100%;
		width: 20%;
		z-index: 1;
		background: url('data:image/svg+xml;base64,PHN2ZyB2ZXJzaW9uPSIxLjEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHg9IjBweCIgeT0iMHB4IiB3aWR0aD0iMjBweCIgaGVpZ2h0PSIyMHB4IiB2aWV3Qm94PSIwIDAgMjAgMjAiIGVuYWJsZS1iYWNrZ3JvdW5kPSJuZXcgMCAwIDIwIDIwIiB4bWw6c3BhY2U9InByZXNlcnZlIj48cG9seWdvbiBmaWxsPSIjRkZERjg4IiBwb2ludHM9IjEwLDAgMTMuMDksNi41ODMgMjAsNy42MzkgMTUsMTIuNzY0IDE2LjE4LDIwIDEwLDE2LjU4MyAzLjgyLDIwIDUsMTIuNzY0IDAsNy42MzkgNi45MSw2LjU4MyAiLz48L3N2Zz4=');
		background-size: contain;
	}
	.star-rating input {
		-moz-appearance: none;
		-webkit-appearance: none;
		opacity: 0;
		display: inline-block;
		width: 20%;
		height: 100%;
		margin: 0;
		padding: 0;
		z-index: 2;
		position: relative;
	}
	.star-rating input:hover + i,
	.star-rating input:checked + i {
		opacity: 1;
	}
	.star-rating i ~ i {
		width: 40%;
	}
	.star-rating i ~ i ~ i {
		width: 60%;
	}
	.star-rating i ~ i ~ i ~ i {
		width: 80%;
	}
	.star-rating i ~ i ~ i ~ i ~ i {
		width: 100%;
	}
	.choice {
		position: fixed;
		top: 0;
		left: 0;
		right: 0;
		text-align: center;
		padding: 20px;
		display: block;
	}
	*
	</style>
	<script>
	$(':radio').change(
		function(){
			$('.choice').text( this.value + ' stars' );
		} 
	)
	</script>
</head>
<body>
    			<div class = "col-md-12">
		            <?php
						if(isset($_GET['worker_id']))  {
							$worker_id = $_GET['worker_id'];
							
							$get_rate = "select * from ratings where worker_id = '$worker_id'";
							$run_rate = $con->query($get_rate);
							$num_rate = mysqli_num_rows($run_rate);
							if ($num_rate == 0)
								$rating = "Not Rated Yet.";
							else{
								$rating = 0;
								while($row_rate = $run_rate->fetch_array()){
									$r = $row_rate['rating'];
									$rating += $r;
								}
								$rating = $rating / $num_rate;
							}
							
							$get_pro = "select * from workers where worker_id= '$worker_id' ";
							$run_pro = mysqli_query($con, $get_pro);
							while($row_pro = mysqli_fetch_array($run_pro)) {
								$worker_id = $row_pro['worker_id'];
								$occ_id = $row_pro['occ_id'];
								$genre_id = $row_pro['genre_id'];
								
								$occ = "select * from occupations where occ_id = '$occ_id'";
								$genre = "select * from genre where genre_id = '$genre_id'";
								$run_occ = $con->query($occ);
								$run_genre = $con->query($genre);
								$get_occ = mysqli_fetch_array($run_occ);
								$get_genre = mysqli_fetch_array($run_genre);
								
								$occ_title = $get_occ['occ_title'];
								$genre_title = $get_genre['genre_title'];
								
								$name = $row_pro['name'];
								$dob = $row_pro['dob'];
								$religion = $row_pro['religion'];
								$gender = $row_pro['gender'];
								
								if($gender == 'f')
									$gender = "Female";
								else
									$gender = "Male";
								
								$fee = $row_pro['fee'];
								$org = $row_pro['org'];
								$state = $row_pro['state'];
								$city = $row_pro['city'];
								$area = $row_pro['area'];
								$experience = $row_pro['experience'];
								$work_desc = $row_pro ['work_desc'];
								$family_desc = $row_pro ['family_desc'];
								$image= $row_pro['image'];
								
								echo "
								<div class='row'>
									<div id = 'single_product' class='col-md-3'>
										<h3>$name</h3>
										<img src='admin_area/worker_images/$image' style='height:300px; width:250px' />
										<p><b>Rs. $fee</b></p>
										<p>$work_desc </p>
										<h3 style='color:red'>$occ_title : $genre_title</h3>
										<a href= 'index.php?worker_id=$worker_id'  style ='float:left;'>GO back</a>
										<a href= 'index.php?add_selection=$worker_id' ><button class=\"btn btn-danger\" style ='float:right'>Hire Me</button></a>
									</div>		
									<div class='col-md-2'>
									</div>
									<div class='col-md-7'>
										<p style='font-size:48px;text-align:center;color:red;'><strong>$name</strong></p>
										<p style='font-size:48px;text-align:center;color:red;'>Salary Expected:<strong>&#8377;$fee</strong></p>
										<p style='font-size:48px;text-align:center;color:red;'>Rating:<strong>$rating</strong></p>
										<a href= 'index.php?add_selection=$worker_id' ><button class=\"btn btn-danger\" style='font-size:32px; height:60px; width:200px; margin-bottom:5px;'>Hire Me</button></a>
									</div>
								</div>
									<div class='col-md-8'>
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
							}
						}
                    ?>
				</div>
			</div>
			<hr>
			<div class="container">
			<?php include("includes/comment_post.php"); ?>
			<hr>
			</div>
	<?php include("footer.php"); ?>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>

</body>
</html>