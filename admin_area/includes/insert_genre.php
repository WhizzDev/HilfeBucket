<?php
include("includes/db.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Insert Genre</title>
	<meta name="description" content="playschoolnoida">
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<script> 
		function valid(form){
			/*genre*/
			chk_genre = /^[A-Za-z]+/;
			if(document.genre.gen.value == ""){
				alert("Genre should not be empty.");
				document.genre.gen.focus();
				return false;
			}
			if(!chk_genre.test(document.genre.gen.value)){
				alert("Genre is Invalid");
				document.genre.gen.focus();
				return false;
			}
			return true;
		}
	</script>
</head>
<body>
	<form name="genre" action="index.php?insert_genre"  method="post" enctype="multipart/form-data" onsubmit="return valid(this.form);" class="form-horizontal">
		<h2 align="center">Insert Genre</h2>
		<div class="row form-group col-sm-offset-1 col-sm-12">
			<input class="form-control" type ="text" name ="gen" placeholder="Enter your genre here" size="60" />
		</div>
		<div class="form-group col-sm-offset-1 col-sm-12">
			<input type ="submit" name ="insert_post"   value="Insert Now" class="btn btn-primary"/>
		</div>
	</form>
</body>
</html>

<?php
	if(isset($_POST['insert_post']))  {
		$gen = $_POST['gen'];
		
		$insert_genre = "insert into genre(genre_id,genre_title) values('','".$gen."')";
		
		$insert_work = mysqli_query($con, $insert_genre);
		
		if($insert_work) {
			echo"<script>alert ('Genre has been inserted.')</script>";
            echo"<script>window.open('index.php?insert_genre','_self')</script>";
		}
	}
?>