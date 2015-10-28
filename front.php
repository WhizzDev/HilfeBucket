<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="animate.css">
  <link rel="stylesheet" href="styles/front.css">
  <link rel="stylesheet" href="styles/style.css">
  <link href="css/bootstrap.min.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <link rel="stylesheet" type="text/css" href="http://www.dreamtemplate.com/dreamcodes/social_icons/tsc_social_icons.css">
  
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
	<nav class="navbar navbar-inverse navbar-fixed-top" id="my-navbar" style="margin-bottom:40px"> 
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
				</button>
				<a href="#" class="navbar-brand" id="hilfes">HilfeBucket</a>
			</div>
			<div class="collapse navbar-collapse" id="navbar-collapse">
				<ul class="nav navbar-nav">
					<li class="active"><a href="#home">Home</a></li>	
					<li><a href="#works">How it Works</a></li>	
					<li><a href="#offer">What We Offer</a></li>	 
					<li><a href="#whyus">Why Us</a></li>	 
					<li><a href="#aboutus">AboutUs</a></li>	
				</ul>
				<ul>
				
					<div class="form-group">
					<a href="login3/register.php"	>
						<input type="button" 
							   value="Register"
							   style="float: right;margin-right:20px;margin-top:-5px;"
								class="btn btn-danger" />
					</a>				
					</div>
					
					<div class="form-group">
					<a href="login3/index.php"	>
						<input type="button" 
							   value="Login"
								style="float: right;margin-right:20px;margin-top:-5px;"	
								class="btn btn-success" /> 
					</a>			
					</div>	
				</ul>
			</div>
		</div>
	</nav>
	<br><br>
	<div id="home">
	
	 <div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="3000">
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
			
				<h1 style="text-align:center;color:white;">What We Offer?</h1>
			
			<br /><br />
			<div class="row text-center">
			
				<div class="col-sm-2 red-tooltip" data-toggle="tooltip" title="1500 Jobs Available!">
					<a href="index.php">
						<div class="animated fadeIn" id="anim">
							<div id="type_offer">
							<blockquote> 
								<img src='images/maid.jpg' class='img-responsive img-circle' alt='Text of the image' align='middle' style = "height:150px; width:150px;">
								<h4 style="text-align:center;">Maid</h4>
							</blockquote>
							</div>
						</div>
					</a>
				</div>
				
				<div class="col-sm-2 red-tooltip" data-toggle="tooltip" title="1600 Jobs Available!">
					<a href="front2.php">
						<div class="animated fadeIn" id="anim">
							<div id="type_offer">
							<blockquote> 
								<img src='images/secure.png' class='img-responsive img-circle' alt='Text of the image' align='middle' style = "height:150px; width:150px;">
								<h4 style="text-align:center;">Security Guard</h4>
							</blockquote>	
							</div>
						</div>	
					</a>
				</div>
				<div class="col-sm-2 red-tooltip" data-toggle="tooltip" title="1000 Jobs Available!">
					<a href="front2.php">
						<div class="animated fadeIn" id="anim">
							<div id="type_offer">
							<blockquote> 
								<img src='images/plumber.jpg' class='img-responsive img-circle' alt='Text of the image' align='middle' style = "height:150px; width:150px;">
								<h4 style="text-align:center;">Plumber</h4>
							</blockquote>	
							</div>
						</div>
					</a>		
				</div>
				<div class="col-sm-2 red-tooltip" data-toggle="tooltip" title="2000 Jobs Available!">
					<a href="front2.php">
						<div class="animated fadeIn" id="anim">
							<div id="type_offer">
							<blockquote> 
								<img src='images/tutor.jpg' class='img-responsive img-circle' alt='Text of the image' align='middle' style = "height:150px; width:150px;">
								<h4 style="text-align:center;">Tutor</h4>
							</blockquote>	
							</div>
						</div>
					</a>		
				</div>
				<div class="col-sm-2 red-tooltip" data-toggle="tooltip" title="1100 Jobs Available!">
					<a href="front2.php">
						<div class="animated fadeIn" id="anim">
							<div id="type_offer">
							<blockquote> 
								<img src='images/babysitter.jpg' class='img-responsive img-circle' alt='Text of the image' align='middle' style = "height:150px; width:150px;">
								<h4 style="text-align:center;">Babysitter</h4>
							</blockquote>
							</div>
						</div>
					</a>	
				</div>
				<div class="col-sm-2 red-tooltip" data-toggle="tooltip" title="1900 Jobs Available!">
					<a href="front2.php">
						<div class="animated fadeIn" id="anim">
							<div id="type_offer">
							<blockquote> 
								<img src='images/cook.jpg' class='img-responsive img-circle' alt='Text of the image' align='middle' style = "height:150px; width:150px;">
								<h4 style="text-align:center;">Cook</h4>
							</blockquote>
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
					<h2 style="text-align:center;">View</h2><h5>Use our simple search and tell us what you require. See list of all the available informal job workers in your area</h5>
				</div>
				
				<div class="col-sm-4">
					<img src='images/shortlist.png' class='img-responsive img-circle' alt='Text of the image' align='right' style = "height:150px; width:150px;">
					<h2 style="text-align:center;">Shortlist</h2><h5>Use our simple search and tell us what you require. See list of all the available informal job workers in your area</h5>
				</div>
			</div>
			
			<br /> <br /> <br /> <br /> 
			
			<div class="row text-center">
				<div class="col-sm-4">
					<img src='images/hire.png' class='img-responsive img-circle' alt='Text of the image' align='left' style = "height:150px; width:150px;">
					<h2 style="text-align:center;">Hire Me </h2><h5>Use our simple search and tell us what you require. See list of all the available informal job workers in your area</h5>
				</div>	
				
				<div class="col-sm-4">
					<img src='images/refer.png' class='img-responsive img-circle' alt='Text of the image' align='left' style = "height:150px; width:150px;">
					<h2 style="text-align:center;">Refer Me</h2><h5>Use our simple search and tell us what you require. See list of all the available informal job workers in your area</h5>
				</div>
				<div class="col-sm-4">
					<img src='images/help.jpg' class='img-responsive img-circle' alt='Text of the image' align='left' style = "height:150px; width:150px;">
					<h2 style="text-align:center;">Help India</h2><h5>Use our simple search and tell us what you require. See list of all the available informal job workers in your area</h5>
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
	
	<div class="container-fluid" id="aboutus">
	<br />
		<div class="container">
			<div class="row text-center">
				<div class="col-sm-4" style="text-align:left">
					<h3><b style="color:red;">Pledge</b> Of HilfeBucket.com</h3>
					<br />
					<h3>Our Aim </h3>
					
					<br />
				</div>	
				<div class="col-sm-4 verticalLine" style="text-align:left">
					<h3><b style="color:red;">About</b> HilfeBucket.com</h3>
					<div id="anchors">
						<h5><a href="#home" style="text-decoration:none;">Home</a></h5>
						<h5><a href="#" style="text-decoration:none;">About Us</a></h5>
						<h5><a href="#" style="text-decoration:none;">Terms Of Use</a></h5>
						<h5><a href="#" style="text-decoration:none;">Privacy Policy</a></h5>
						<br />
					</div>
				</div>
				<div class="col-sm-4" style="text-align:left">
					<h3><b style="color:red;">Contact</b> Us At:</h3>
					<br />
					<h4>My Email End</h4>
					<br />
					<a class="facebook_cube3d tsc_social_cube64" title="facebook" href="#">facebook</a>
					<a class="youtube_cube3d tsc_social_cube64" title="youtube" href="#">youtube</a>
					<a class="twitter_cube3d tsc_social_cube64" title="twitter" href="#">twitter</a>
					<a class="mail_cube3d tsc_social_cube64" title="mail" href="#">mail</a>
					<a class="in_cube3d tsc_social_cube64" title="linkedin" href="#">in</a>
					
					
					<br />
				</div>	
		    </div>
		</div>
	<br />
	</div>
	
</body>
</html>
