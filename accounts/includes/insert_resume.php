<?php
include("includes/db.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Insert Resume</title>
	<meta name="description" content="playschoolnoida">
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<script> 
		function valid(form){
			/*name, occ_id, genre_id, day, mon, yr, fee, religion, org, gender, state, city, area, experience*/
			chk_name = /^[A-Za-z]+/;
			chk_fee = /^[0-9]{1,7}/;
			chk_rel = /^[A-Za-z]+/;
			chk_city = /^[A-Za-z]+/;
			chk_area = /^[A-Za-z0-9]+/;
			if(!chk_name.test(document.resume.name.value)){
				alert("Name is Invalid");
				document.resume.name.focus();
				return false;
			}
			if(document.resume.occ_id.value == ""){
				alert("Occupation should not be empty.");
				document.resume.occ_id.focus();
				return false;
			}
			if(document.resume.genre_id.value == ""){
				alert("Genre should not be empty.");
				document.resume.genre_id.focus();
				return false;
			}
			if(document.resume.day.value == ""){
				alert("Day should not be empty.");
				document.resume.day.focus();
				return false;
			}
			if(document.resume.mon.value == ""){
				alert("Month should not be empty.");
				document.resume.mon.focus();
				return false;
			}
			if(document.resume.yr.value == ""){
				alert("Year should not be empty.");
				document.resume.yr.focus();
				return false;
			}
			if((document.resume.mon.value == 4 || document.resume.mon.value == 6 || document.resume.mon.value == 9 
			|| document.resume.mon.value == 11) && (document.resume.day.value > 30)){
				alert("Wrong Day Entered.");
				document.resume.day.focus();
				return false;
			}
			if(document.resume.mon.value == 2 && document.resume.day.value > 28){
				alert("Wrong Day Entered.");
				document.resume.day.focus();
				return false;
			}
			if(!chk_fee.test(document.resume.fee.value)){
				alert("Salary is Invalid");
				document.resume.fee.focus();
				return false;
			}
			if(!chk_rel.test(document.resume.religion.value)){
				alert("Religion is Invalid");
				document.resume.religion.focus();
				return false;
			}
			if(document.resume.gender.value == ""){
				alert("Gender should not be empty.");
				document.resume.gender.focus();
				return false;
			}
			if(document.resume.state.value == ""){
				alert("State should not be empty.");
				document.resume.gender.focus();
				return false;
			}
			if(!chk_city.test(document.resume.city.value)){
				alert("City is Invalid");
				document.resume.city.focus();
				return false;
			}
			if(!chk_area.test(document.resume.area.value)){
				alert("Area is Invalid");
				document.resume.area.focus();
				return false;
			}
			if(document.resume.experience.value == ""){
				alert("Experience should not be empty.");
				document.resume.experience.focus();
				return false;
			}
			return true;
		}
	</script>
</head>
<body>
<?php
include("db.php");
$select_product = "select * from self where member_id='".$_SESSION['user_id']."' ";
$run_query = mysqli_query($con, $select_product);
while ($row_product = mysqli_fetch_array($run_query)) {
	$worker_id = $row_product['worker_id'];
}
if(!isset($worker_id)){
?>
	<form name="resume" action="index.php?upload"  method="post" enctype="multipart/form-data" onsubmit="return valid(this.form);" class="form-horizontal">
		<h2 align="center">Upload Resume</h2>
		<div class="row form-group col-sm-offset-1 col-sm-12">
			<input class="form-control" type ="text" name ="name" placeholder="Person Name" size="60" />
		</div>
		<div class="form-group col-sm-2">Date of Birth:</div>
		<div class="form-group col-sm-3">	
			<select name="yr" class="form-control">
			<option>Select Year</option>
		<?php
			for ($i = 0; $i < 35; $i++)
				echo '<option value = "'.(1997 - $i).'">'.(1997 - $i).'</option>';
		?>	</select>
		</div>
		<div class="form-group col-sm-1"></div>	
		<div class="form-group col-sm-3">	
			<select name="mon" class="form-control">
			<option>Select Month</option>
		<?php
			for ($i = 1; $i <= 12; $i++)
				echo '<option value = "'.($i < 10 ? "0".$i : $i).'">'.($i < 10 ? "0".$i : $i).'</option>';
		?>	</select>
		</div>
		<div class="form-group col-sm-1"></div>	
		<div class="form-group col-sm-3">	
			<select name="day" class="form-control">
			<option>Select Day</option>
		<?php
			for ($i = 1; $i <= 31; $i++)
				echo '<option value = "'.($i < 10 ? "0".$i : $i).'">'.($i < 10 ? "0".$i : $i).'</option>';
		?>	</select>
		</div>
		<div class="form-group col-sm-offset-1 col-sm-6">
			<select name="occ_id" class="form-control">
			<option>Select Occupation</option>
		<?php 
			$get_occ = "select  * from occupations";
			$run_occ = mysqli_query($con, $get_occ);
			while  ($row_occ = mysqli_fetch_array($run_occ)) {
				$occ_id  = $row_occ['occ_id'];
				$occ_title  = $row_occ['occ_title'];
				echo "<option value='$occ_id'>$occ_title</option>";		  
			}
		?>
			</select>
		</div>
		<div class="form-group col-sm-1"></div>	
		<div class="form-group col-sm-offset-1 col-sm-6">
			<select name="genre_id" class="form-control">
			<option>Select a Genre</option>
		<?php
			$get_genre = "select  * from genre";
			$run_genre = mysqli_query($con, $get_genre);
			while  ($row_genre = mysqli_fetch_array($run_genre)) {
				$genre_id  = $row_genre['genre_id'];
				$genre_title  = $row_genre['genre_title'];
				echo "<option value='$genre_id'>$genre_title</option>";		  
			}  
		?>				  
			</select>
		</div>
		<div class="form-group col-sm-offset-1 col-sm-12">
			<label>Upload Image</label>
			<input type ="file" name ="image" class="form-control"/>
		</div>
		<div class="form-group col-sm-offset-1 col-sm-12">
			<input type ="text" name ="fee" placeholder="Salary Expected" class="form-control" />
		</div>
		<div = "row">
		<div class="form-group col-sm-offset-1 col-sm-6">
			<input type ="text" name ="religion" class="form-control" size="50" placeholder="Religion" />
		</div>
		<div class="form-group col-sm-1"></div>
		<div class="form-group col-sm-offset-1 col-sm-6">
			<select name="gender" class="form-control">
				<option>Select Gender</option>
				<option value="m">Male</option>
				<option value="f">Female</option>
			</select>
		</div>
		</div>
		<div class="col-sm-2">Place of Work:</div>
		<div class="form-group col-sm-offset-1 col-sm-3">
			<select name="state" class="form-control">
				<option>Select State</option>
				<option value="Delhi NCR">Delhi NCR</option>
				<option value="Maharashtra">Maharashtra</option>
			</select>
		</div>
		<div class="col-sm-1"></div>
		<div class="form-group col-sm-offset-1 col-sm-3">
			<input type ="text" name ="city" class="form-control" size="50" placeholder="City" />
		</div>
		<div class="col-sm-1"></div>
		<div class="form-group col-sm-offset-1 col-sm-3">
			<input type ="text" name ="area" class="form-control" size="50" placeholder="Area" />
		</div>
		<div class="form-group col-sm-offset-1 col-sm-12">
			<input type ="text" name ="experience" placeholder="Experience" class="form-control" />
		</div>
		<div class="form-group col-sm-offset-1 col-sm-12">
			<textarea name="work_desc" placeholder="Work Related Description" class="form-control" cols="50" rows="10"></textarea>
		</div>
		<div class="form-group col-sm-offset-1 col-sm-12">
			<textarea name="family_desc" placeholder="Family Background" class="form-control" cols="50" rows="10"></textarea>
		</div>
		<div class="form-group col-sm-offset-1 col-sm-12">
			<input type ="submit" name ="insert_post"   value="Upload Now" class="btn btn-primary"/>
		</div>
	</form>
<?php 
} else{ ?> <p class="text-danger" style="font-size:45px">You've already uploaded your Resume.</p>
<?php }?>
</body>
</html>
<?php
	if(isset($_POST['insert_post']))  {
        //getting text data from the fields		 
        $occ_id = $_POST['occ_id'];
        $genre_id = $_POST['genre_id'];
		$name = $_POST['name'];
		
		$yr = $_POST['yr'];
		$mon = $_POST['mon'];
		$day = $_POST['day'];
		$dob = $yr."-".$mon."-".$day;
		
        $religion = $_POST['religion'];
		$gender = $_POST['gender'];
		$fee = $_POST['fee'];
		$state = $_POST['state'];
		$city = $_POST['city'];
		$area = $_POST['area'];
		$experience = $_POST['experience'];
        $work_desc = $_POST['work_desc'];
        $family_desc = $_POST['family_desc'];
        
		//getting the image from the field
		$image = $_FILES['image']['name'];
        $image_tmp = $_FILES['image']['tmp_name'];	
        move_uploaded_file($image_tmp,"../admin_area/worker_images/$image");
		
		$insert_res = "insert into self
			(worker_id,occ_id,genre_id,name,dob,religion,gender,fee,org,state,city,area,
			experience,work_desc,family_desc,image,member_id,status)  values
			('','".$occ_id."','".$genre_id."','".$name."','".$dob."','".$religion."','".$gender."',
			'".$fee."','SELF','".$state."','".$city."','".$area."','".$experience."','".$work_desc."',
			'".$family_desc."','".$image."','".$_SESSION['user_id']."','unapproved')";
			
		$insert_worker = mysqli_query($con, $insert_res);
		
		if($insert_worker) {
			echo"<script>alert ('Resume has been inserted. We will review it before publishing')</script>";
            echo"<script>window.open('index.php','_self')</script>";
		}
	}
?>