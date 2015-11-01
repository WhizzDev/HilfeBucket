	<?php 
		include("functions/function.php");
		include_once 'login3/includes/db_connect.php';
		include_once 'login3/includes/functions.php';
		sec_session_start();
	?>
	<head>
		<style>
			.dropdown-menu1{width:800px;height:auto;}
			a.one{text-decoration:none;font-size:18px;color:red;margin-bottom:15px;}
			a.one:hover{text-decoration:none;font-size:19px;color:#789abc;}
			a.two{font-size:18px;}
			a.two:hover{font-size:19px;}
			.links{list-style:none;}
			.center{margin-left:10%}
		</style>
	</head>
	<nav class="navbar navbar-inverse navbar-fixed-top" id="my-navbar" style="margin-bottom:40px"> 
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
				</button>
				<img class="nav navbar-nav" src="images/hbico.png" alt="logo"><a href="../HilfeBucket/" class="navbar-brand" id="hilfes" style="margin-left:2px">HilfeBucket</a>
			</div>
			<div class="collapse navbar-collapse" id="navbar-collapse">
				<ul class="nav navbar-nav">
					<li><a href="../HilfeBucket/" style="font-size:17px"><span class="glyphicon glyphicon-home"></span></a></li>
					<li class="dropdown">
					<a class="dropdown-toggle" data-toggle="dropdown" href="index.php">All Categories</a>
					<ul class="dropdown-menu dropdown-menu1">
					<div class="col-md-3">
					<img class="center" src="images/maid.jpg" height="50px" width="50px"/>
					<h2>Household</h2>
					<ul class="links">
					<li><a class="one" href="#">Maid</a> </li>
					<li><a class="one" href="#">Babysitter</a> </li>
					<li><a class="one" href="#">Cook</a> </li>
					<li><a class="one" href="#">Laundress</a></li> 
					<li><a class="one" href="#">Masseur</a> </li>
					<li><a class="one" href="#">Pandit Ji</a> </li>
					<li><a class="one" href="#">Physio</a> </li>
					<li><a class="one" href="#">Security Guard</a> </li>
					
					</ul>
					</div>
			        <div class="col-md-3">
					<img class="center" src="images/plumber.jpg" height="50px" width="50px"/>
					<h2>Skilled</h2>
					<ul class="links">
					<li><a class="one" href="#">Barber</a> </li>
					<li><a class="one" href="#">Carpenter</a> </li>
					<li><a class="one" href="#">Driver</a> </li>
					<li><a class="one" href="#">Electrician</a></li> 
					<li><a class="one" href="#">Mechanic</a> </li>
					<li><a class="one" href="#">Painter</a> </li>
					<li><a class="one" href="#">Plumber</a> </li>
					<li><a class="one" href="#">Tailor</a> </li>
					<li><a class="one" href="#">Welder</a> </li>
					<li><a class="one" href="#">Photographer</a> </li>
					</ul>
					</div>
			        <div class="col-md-3">
					<img class="center" src="images/tutor.jpg" height="50px" width="50px"/>
					<h2>Assistant</h2>
					<ul class="links">
					<li><a class="one" href="#">Computer Operator</a> </li>
					<li><a class="one" href="#">Home-Tutor</a> </li>
					<li><a class="one" href="#">Delivery Boy</a> </li>
					<li><a class="one" href="#">Machine Operator</a></li> 
					<li><a class="one" href="#">Molding</a> </li>
					<li><a class="one" href="#">Pharmacist</a> </li>					
					<li><a class="one" href="#">Sales Clerk</a> </li>
					<li><a class="one" href="#">Sari work</a> </li>
					<li><a class="one" href="#">Seaman</a> </li>
					<li><a class="one" href="#">WardBoy</a> </li>
					
					</ul>
					</div>
					
			        <div class="col-md-3">
					<img class="center" src="images/popular.png" height="50px" width="50px"/>
					<h3>Popular</h3>
					</div>
					</ul>
					</li>
					<li><a href="index.php">Start Hiring</a></li>	
					<li><a href="#aboutus">AboutUs</a></li>	
				</ul>
				<ul>
				<ul class="nav navbar-nav navbar-right" style="font-size:17px;">
					<li><a href="picked.php" style="color:orange"><span class="glyphicon glyphicon-shopping-cart"></span> JobBucket<sup class="badge" style="font-size:9px;background-color:orange;color:#222222"><?php  echo  total_selections();?></sup></a></li>
				<?php 
					if (login_check($mysqli) == true){
				?>
					<li class="dropdown">
						<a class="dropdown-toggle" style="font-weight:bold;color:#abcdef" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-user"></span> <?php echo "Hi! ".$_SESSION['username'];?><span class="caret"></span></a>
						<ul class="dropdown-menu">
							<li><a href="accounts/index.php?account"><span class="glyphicon glyphicon-tasks"></span> My Account</a></li>
							<li><a href="accounts/index.php?upload"><span class="glyphicon glyphicon-upload"></span> Upload Resume</a></li>
							<li><a href="accounts/index.php?bucketed"><span class="glyphicon glyphicon-briefcase"></span> Bucketed???</a></li>
							<li><a href="accounts/index.php?check"><span class="glyphicon glyphicon-check"></span> You've Hired</a></li>
							<li><a href="login3/includes/logout.php"><span class="glyphicon glyphicon-log-out"></span> Log Out</a></li>
						</ul>
					</li>
				</ul>
				<?php } 
					else{?>
						<li><a href="login3/register.php" style="color:#d9534f"><span class="glyphicon glyphicon-user"></span> Sign Up</a></li>
						<li><a href="login3/index.php" style="color:#5cb85c"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
					</ul>
					<?php }?>
				</ul>
			</div>
		</div>
		<div class="container-fluid" style="background-color:#3a3333" id="searches">
			<form class="form" method="get" action="results.php" enctype="multipart/form-data">
				<div class="form-group">
					<div class="col-lg-11">				  
						<input type ="text" name="user_query" class="form-control input-lg" placeholder="Start Hiring by our quick search"  />
					</div>
					<div class="col-lg-1" id="searches1" style="margin-bottom:15px">
						<button type ="submit" name="search" class="btn btn-lg btn-primary" style="background-color:#abcdef;color:#222222"><span class="glyphicon glyphicon-search"></span></button>
					</div>
				</div>				   
			</form>
		</div>
	</nav>