<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>JobBucket.com </title>
	<meta name="description" content="maidsjobs">
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="styles/style.css" media="all"/>
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
if (login_check($mysqli) == true){
?>	<div class="container" style="border:solid #000000;margin-top:50px;">
		<p style="margin-bottom:20px;margin-top:20px">You are Logged In as <strong><?php echo $_SESSION['username']; ?></strong>. If its not your account <a href="login3/index.php">Login here and Checkout Again</a></p>
		<form name="hire" method="post" action="checkout.php" onsubmit="return valid(this.form);">
			<div class="form-group col-sm-6">
				<input class="form-control" type ="text" name ="name" placeholder="Name" size="60" />
			</div>
			<div class="form-group col-sm-6">
				<input class="form-control" type ="text" name ="phno" placeholder="Contact Number (with 0 if mobile and with STD code if landline)" size="60" />
			</div>
			<div class="form-group col-sm-12">
				<textarea name="add" placeholder="Complete Address with Pin Code" class="form-control" cols="50" rows="10"></textarea>
			</div>
			<div class="form-group col-sm-6">
				<input type ="reset" name ="reset"   value="Reset" class="btn btn-danger btn-lg"/>
			</div>
			<div class="form-group col-sm-6">
				<input type ="submit" name ="submit"   value="Continue" class="btn btn-primary btn-lg"/>
			</div>
		</form>
	</div>
	<script>
	function valid(form){
		chk_name = /^[A-Za-z\s]+/;
		chk_no = /^[0-9]{11}/;
		if(!chk_name.test(document.hire.name.value)){
			alert("Invalid Name Entered");
			document.hire.name.focus();
			return false;
		}
		if(!chk_no.test(document.hire.phno.value)){
			alert("Invalid Contact Number Entered");
			document.hire.phno.focus();
			return false;
		}
		if(document.hire.add.value == ""){
			alert("Address should not be left empty");
			document.hire.add.focus();
			return false;
		}
		return true;
	}
	</script>
<?php	
} else { ?>
	<div class="container" align="center" style="border:solid #000000;">
	<p align="center" style="margin-top:20px;">You will have to register with us first and Checkout again</p>
	<a align="center" href="login3/register.php" >
		<input type="button" 
			value="Register"
			class="btn btn-danger"/></a>
	<p align="center" style="margin-top:20px;">Already Registered? Login and Checkout again</p>
	<a align="center" href="login3/index.php">
		<input type="button" 
			value="Login"
			class="btn btn-success"/></a>
	<p align="center" style="margin-top:20px;">Do You want to Checkout Later?</p>
	<a align="center" href="index.php">
		<input style="margin-bottom:20px;" type="button" 
			value="Continue Shopping"
			class="btn btn-info"/></a>
	</div>		
<?php }
include("footer.php");
?>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>