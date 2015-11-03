

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>HilfeBucket.com </title>
	<meta name="description" content="maidsjobs">
	<!-- Latest compiled and minified CSS -->
</head>
<body>
    <?php
include "navbar.php";
?>
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
				<div class ="col-md-9">
					<?php    getWorkers();    ?>
					<?php    getOccWorker();    ?>
					<?php    getGenreWorker();    ?>
				</div>
			</div>
		</div>
		<hr>
		
		<?php include "footer.php"; ?>
	</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>	