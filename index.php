<?php
include("functions/function.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>JobBucket.com </title>
	<meta name="description" content="maidsjobs">
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="styles/style.css" media="all"   />
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
    <div class="container" style="background-color:#003366">
		<form class="form" method="get" action="results.php" enctype="multipart/form-data">
		    <div class="form-group">
                <div class="col-lg-11">				  
					<input type ="text" name="user_query" class="form-control input-lg" placeholder="Search Here"  />
				</div>
				<div class="col-lg-1">
					<input type ="submit" name="search"  value="search" class="btn btn-lg btn-danger" />
			    </div>
			</div>				   
		</form>
	</div>
	<div class="container">
		<div id="menubar" class="row">
			<ul  id="menu">
				<li><a href="index.php">Home</a></li>
				<li><a href="all_products.php">All Jobs</a></li>
				<li><a href="#">my account</a></li>
				<li><a href="#">sign up</a></li>
				<li><a href="#">JobBucket</a></li>
				<li><a href="#">Contact us</a></li>
			</ul>       
		</div>
		<div class="container">
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
				<span style="float:right; font-size:18px; padding:5px; line-height:40px;">
					<?php  selection();    ?>
					Welcome Guest!  <strong style ="color:red">JobBucket-</strong> Shortlisted : <strong style ="color:red"> <?php  echo  total_selections();?></strong>
					Total Price:<strong style ="color:red;text-decoration:underline;"><?php echo total_price(); ?></strong>
					<a href ="picked.php"  class="btn btn-danger">Go To JobBucket</a>
				</span>
				<div class ="col-md-9">
					<?php    getWorkers();    ?>
					<?php    getOccWorker();    ?>
					<?php    getGenreWorker();    ?>
				</div>
			</div>
		</div>
		<hr>
		<div class="container">
	        <div class="footer">
				<p><strong>Policies:</strong><a class="one" href="#">Terms of use | Security | Privacy | Infringement</a> <strong style="align:center">© 2007-2015</strong></p>
				<p><strong>Most searched :</strong></p> 
				<p><a class="one" href="#">Maids | Panditji | links</a></p> 
			</div>	  
	    </div>
	</div>
</body>
</html>	