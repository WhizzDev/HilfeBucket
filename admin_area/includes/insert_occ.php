<?php
include("includes/db.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Insert Occupation</title>
	<meta name="description" content="playschoolnoida">
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<script> 
		function valid(form){
			/*occupation*/
			chk_occ = /^[A-Za-z]+/;
			if(document.occupation.occ.value == ""){
				alert("Occupation should not be empty.");
				document.occupation.occ.focus();
				return false;
			}
			if(!chk_occ.test(document.occupation.occ.value)){
				alert("Occupation is Invalid");
				document.occupation.occ.focus();
				return false;
			}
			return true;
		}
	</script>
</head>
<body>
<form name="occupation" action="index.php?insert_occ"  method="post" enctype="multipart/form-data" onsubmit="return valid(this.form);" class="form-horizontal">
		<h2 align="center">Insert Occupation</h2>
		<div class="row form-group col-sm-offset-1 col-sm-12">
			<input class="form-control" type ="text" name ="occ" placeholder="Enter your occupation here" size="60" />
		</div>
		<div class="form-group col-sm-offset-1 col-sm-12">
			<input type ="submit" name ="insert_post"   value="Insert Now" class="btn btn-primary"/>
		</div>
</form>
</body>
</html>

<?php
	if(isset($_POST['insert_post']))  {
		$occ = $_POST['occ'];
		
		$insert_occupation = "insert into occupations(occ_id,occ_title) values('','".$occ."')";
		
		$insert_work = mysqli_query($con, $insert_occupation);
		
		if($insert_work) {
			echo"<script>alert ('Occupation has been inserted.')</script>";
            echo"<script>window.open('index.php?insert_occ','_self')</script>";
		}
	}
?>