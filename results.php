<!DOCTYPE>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>JobBucket.com </title>
	<meta name="description" content="maidsjobs">
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="styles/style.css" media="all"   />
	<link rel="stylesheet" href="styles/style1.css" media="all"/>
	<link rel="stylesheet" href="styles/style2.css" media="all"/>
	<style>
	body{
		margin-top:150px;
	}
	</style>
</head>
<body>
    <?php
include("navbar.php");
?>	<div class="container">
			<div class="row">
                <div class="col-md-3">						             
					<span><h2>Occupation</h2></span>
					<ul class="list-group">
						<?php  getOccupation(); ?>
					</ul>
					<span><h2>Genre</h2></span>
					<ul class="list-group">
						<?php    getGenre(); ?>
					</ul>
				</div>
				
				<div class="col-md-9">
					<?php
						if(isset($_GET['search']) and !empty($_GET['user_query'])) {
							$search_query =$_GET['user_query'];
							$get_pro = "select * from workers,genre,occupations WHERE workers.occ_id = occupations.occ_id AND workers.genre_id= genre.genre_id AND (MATCH(name,state,area,city) AGAINST('$search_query' IN BOOLEAN MODE) OR MATCH(occ_title) AGAINST('$search_query' IN BOOLEAN MODE) OR MATCH(genre_title) AGAINST('$search_query' IN BOOLEAN MODE)) ";
							$run_pro = mysqli_query($con, $get_pro);
							if(!empty($run_pro))
								while($row_pro = mysqli_fetch_array($run_pro)) {
									$worker_id= $row_pro['worker_id'];
									$occ_id= $row_pro['occ_id'];
									$genre_id= $row_pro['genre_id'];
									$name= $row_pro['name'];
									$fee= $row_pro['fee'];
									$image= $row_pro['image'];
									$religion = $row_pro['religion'];
									$experience = $row_pro['experience'];
									$area = $row_pro['area'];
									$city = $row_pro['city'];
									$state = $row_pro['state'];
									echo  "
				    <a href= 'details.php?worker_id=$worker_id' target='blank' class='links'>
					<div id = 'single_product'>
						<h3>$name</h3>
						<img src='admin_area/worker_images/$image' width='120' height= '100'  />
							<p style='font-size:25px'><b>&#8377  $fee</b></p>
							<p style='color:black'>Work: $area, <br>$city, $state</p>
							<p><b>Religion: $religion</b><p>
							<p><b>Experience: $experience</b><p>
							<p><b>Age var</b><p>
							<a class='btn btn-success ' href= 'index.php?add_selection=$worker_id' >Add To JobBucket</a>
					</div>
					</a>	
				";
								}
							else echo "<p style=\"font-size:30px\">Result Not Found.</p>";	
						}
					?>
				</div>
			</div>
			<hr>
	        <?php
include("footer.php");
?>
		</div>	  	  
	</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>