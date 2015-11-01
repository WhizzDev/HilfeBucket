	<?php 
		include("functions/function.php");
		include_once 'login3/includes/db_connect.php';
		include_once 'login3/includes/functions.php';
		sec_session_start();
	?>
	<nav class="navbar navbar-inverse navbar-fixed-top" id="my-navbar" style="margin-bottom:40px"> 
		<div class="container-fluid">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbar-collapse">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
				</button>
				<a href="../HilfeBucket/" class="navbar-brand" id="hilfes">HilfeBucket</a>
			</div>
			<div class="collapse navbar-collapse" id="navbar-collapse">
				<ul class="nav navbar-nav">
					<li class="active"><a href="../HilfeBucket/">Home</a></li>	
					<li><a href="index.php">Start Hiring</a></li>	
					<li><a href="#aboutus">AboutUs</a></li>	
				</ul>
				<ul>
				<?php 
					if (login_check($mysqli) == true){
				?>
					<div style="float: right;margin-right:20px;margin-top:10px">
						<li class="dropdown nav navbar-nav">
							<a class="dropdown-toggle" style="font-size:20px;font-weight:bold;margin-top:10px !important;color:#abcdef" data-toggle="dropdown" href="#"><?php echo "Hi! ".$_SESSION['username'];?><span class="caret"></span></a>
							<ul class="dropdown-menu">
								<li><a href="accounts/index.php?account">My Account</a></li>
								<li><a href="accounts/index.php?upload">Upload Resume</a></li>
								<li><a href="accounts/index.php?bucketed">Bucketed???</a></li>
								<li><a class="text-danger" href="login3/includes/logout.php">Log Out</a></li>
							</ul>
						</li>
					</div>
					<a href="picked.php" class="btn btn-warning" style="float: right;margin-right:20px;margin-top:5px;">JobBucket<p class="badge" style="font-size:8px"><?php  echo  total_selections();?></p></a>
					<?php } 
					else{?>
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
					<a href="picked.php" class="btn btn-warning" style="float: right;margin-right:20px;margin-top:-8px;">JobBucket<p class="badge" style="font-size:8px"><?php  echo  total_selections();?></p></a>
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
						<input type ="submit" name="search"  value="search" class="btn btn-lg btn-primary" style="background-color:#ffffff;color:#222222"/>
					</div>
				</div>				   
			</form>
		</div>
	</nav>