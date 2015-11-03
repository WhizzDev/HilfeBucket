<!DOCTYPE html>
<html lang="en">
<head>
  <title>HilfeBucket.com</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <style>
  .carousel-inner > .item > img,
  .carousel-inner > .item > a > img {
      width: 100%;  
  }  
  </style>
  
  <script>
  
	<!-- for tooltip -->
	$(document).ready(function(){
		$('[data-toggle="tooltip"]').tooltip();   
	});
	
	<!-- for scrolling the bar to the top -->
	
	window.onbeforeunload = function(){
	window.scrollTo(0,0);
	}
	
	</script>
</head>
<body data-spy="scroll" data-target="#my-navbar">
<?php include "navbar.php"; ?>	
	<div id="home">
	
	 <div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="3000" style="margin-top:-25px">
		<!-- Indicators -->
		<ol class="carousel-indicators">
		  <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
		  <li data-target="#myCarousel" data-slide-to="1"></li>
		  <li data-target="#myCarousel" data-slide-to="2"></li>
		  <li data-target="#myCarousel" data-slide-to="3"></li>
		</ol>

		<!-- Wrapper for slides -->
		<div class="carousel-inner" role="listbox">
		  <div class="item active">
			<img src="images/b2.jpg" alt="friends1" style="height:350px ;width:1400px;" class="img-responsive">
		  </div>

		  <div class="item">
			<img src="images/bannerfpage.jpg" alt="friends2" style="height:350px ;width:1400px;" class="img-responsive">
		  </div>
		
		  <div class="item">
			<img src="images/b3.jpg" alt="friends3" style="height:350px ;width:1400px;" class="img-responsive">
		  </div>

		  <div class="item">
			<img src="images/bannerfpg.jpg" alt="friends4" style="height:350px ;width:1400px;" class="img-responsive">
		  </div>
		  </div>
		</div>

	</div>
	


	
	<div class="container-fluid" id="offer">
		<section>
			
			<h1 style="text-align:center;margin-top:20px">What We Offer?</h1>
			
			<br /><br />
			<div class="row text-center">
			
				<div class="col-sm-2 red-tooltip" data-toggle="tooltip" title="1500 Jobs Available!">
					<a href="index.php?occ=1">
						<div class="animated fadeIn" id="anim">
							<div id="type_offer">
							 
								<img src='images/maid.jpg' class='img-responsive img-circle' alt='Text of the image' align='middle' style = "height:150px; width:150px;">
								<h4 style="text-align:center;">Maid</h4>
							
							</div>
						</div>
					</a>
				</div>
				
				<div class="col-sm-2 red-tooltip" data-toggle="tooltip" title="1600 Jobs Available!">
					<a href="index.php?occ=6">
						<div class="animated fadeIn" id="anim">
							<div id="type_offer">
							
								<img src='images/secure.png' class='img-responsive img-circle' alt='Text of the image' align='middle' style = "height:150px; width:150px;">
								<h4 style="text-align:center;">Security Guard</h4>
							
							</div>
						</div>	
					</a>
				</div>
				<div class="col-sm-2 red-tooltip" data-toggle="tooltip" title="1000 Jobs Available!">
					<a href="index.php?occ=3">
						<div class="animated fadeIn" id="anim">
							<div id="type_offer">
							
								<img src='images/plumber.jpg' class='img-responsive img-circle' alt='Text of the image' align='middle' style = "height:150px; width:150px;">
								<h4 style="text-align:center;">Plumber</h4>
							
							</div>
						</div>
					</a>		
				</div>
				<div class="col-sm-2 red-tooltip" data-toggle="tooltip" title="2000 Jobs Available!">
					<a href="index.php?occ=5">
						<div class="animated fadeIn" id="anim">
							<div id="type_offer">
							
								<img src='images/m.jpg' class='img-responsive img-circle' alt='Text of the image' align='middle' style = "height:150px; width:150px;">
								<h4 style="text-align:center;">Masseur</h4>
							
							</div>
						</div>
					</a>		
				</div>
				<div class="col-sm-2 red-tooltip" data-toggle="tooltip" title="1100 Jobs Available!">
					<a href="index.php?occ=4">
						<div class="animated fadeIn" id="anim">
							<div id="type_offer">
							
								<img src='images/babysitter.jpg' class='img-responsive img-circle' alt='Text of the image' align='middle' style = "height:150px; width:150px;">
								<h4 style="text-align:center;">Babysitter</h4>
							
							</div>
						</div>
					</a>	
				</div>
				<div class="col-sm-2 red-tooltip" data-toggle="tooltip" title="1900 Jobs Available!">
					<a href="index.php?occ=2">
						<div class="animated fadeIn" id="anim">
							<div id="type_offer">
							
								<img src='images/cook.jpg' class='img-responsive img-circle' alt='Text of the image' align='middle' style = "height:150px; width:150px;">
								<h4 style="text-align:center;">Cook</h4>
							
							</div>
						</div>	
					</a>	
				</div>
			</div>
			<br />
		</section>
	</div>
	
	
	<div class="container-fluid" id="works">
		<section>
			
				<h1 style="text-align:center;padding:10px;">How It Works?</h1>
			<br />
			<div class="row text-center">
				<div class="col-sm-4">
					<img src='images/search1.png' class='img-responsive img-circle' alt='Text of the image' align='right' style = "height:150px; width:150px;">
					<h2 style="text-align:center;">Search</h2><h5>Use our simple search and tell us what you require. See list of all the available informal job workers in your area</h5>
				</div>
				
				<div class="col-sm-4">
					<img src='images/view1.jpg' class='img-responsive img-circle' alt='Text of the image' align='right' style = "height:150px; width:150px;">
					<h2 style="text-align:center;">View</h2><h5>View the information about various informal umemployed people in your locality with the help of extensive database.</h5>
				</div>
				
				<div class="col-sm-4">
					<img src='images/shortlist.png' class='img-responsive img-circle' alt='Text of the image' align='right' style = "height:150px; width:150px;">
					<h2 style="text-align:center;">Shortlist</h2><h5>As per your requirements 'bucket' the people that you want to hire and filter them accordingly.</h5>
				</div>
			</div>
			
			<br /> <br /> <br /> <br /> 
			
			<div class="row text-center">
				<div class="col-sm-4">
					<img src='images/hire.png' class='img-responsive img-circle' alt='Text of the image' align='left' style = "height:150px; width:150px;">
					<h2 style="text-align:center;">Hire Me </h2><h5>Hire the people after shortlisting list with just a simple click</h5>
				</div>	
				
				<div class="col-sm-4">
					<img src='images/refer.png' class='img-responsive img-circle' alt='Text of the image' align='left' style = "height:150px; width:150px;">
					<h2 style="text-align:center;">Refer Me</h2><h5>If you like the work of the person help them in their progress by Reffering them to other people with just a simple click..</h5>
				</div>
				<div class="col-sm-4">
					<img src='images/help.jpg' class='img-responsive img-circle' alt='Text of the image' align='left' style = "height:150px; width:150px;">
					<h2 style="text-align:center;">Help India</h2><h5>Feeling Bad about thee beggars!!.Now don't just sit there watch them.. Help the by our Help India section by uploading their Resume with your selfie and be their guardian and help them  </h5>
				</div>
			    <br />
			</div>
		</section>
		<br />
	</div>

	<div class="container-fluid" style="background-color: black;">
		<section>
			<div id="whyus">	
				<h1 id="difference">Difference Between other hiring Agencies and HilfeBucket</h1>
			</div>
			<div class="container" style="background-color: white;">
				<div class="row text-center">
					<div class="col-sm-6" style="text-align:left">
						<h3 id="names">Other Agencies</h3>
						<hr>
						<p>Have a Small Database of only 20-30 workers</p>
						<hr>
						<p>Most of them are limited to only 2-3 types of workers</p>
						<hr>
						<p>Will only claim to do a background check. Will never do it</p>
						<hr>
						<p>Run by a single person</p>
						<hr>
						<p>Charge renewal fees after 1 year</p>
						<hr>
					</div>	
					<div class="col-sm-6" style="text-align:right">
						<h3 id="names">HilfeBucket</h3>
						<hr>
						<p>Have a Database of Over 350 workers</p>
						<hr>
						<p>We provide all types of informal jobs</p>
						<hr>
						<p>We do Documentation of the workers</p>
						<hr>
						<p>Currently run by a Team</p>
						<hr>
						<p>No Renewal Fees and Entry Fees only pay at the time of hiring</p>
						<hr>
					</div>	
			</div>
		</section>	
		<br />
	</div>
	
	<?php 
	include("footer.php");?>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>
