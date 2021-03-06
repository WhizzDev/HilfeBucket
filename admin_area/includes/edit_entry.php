<?php
include("includes/db.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>JobBucket.com</title>
	<meta name="description" content="Wiredwiki App">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
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
<body >
<?php
include("db.php");
if(isset($_GET['edit_entry'])) {
	$edit_id = $_GET['edit_entry'];
	$select_product = "select * from workers where worker_id='$edit_id' ";
	$run_query = mysqli_query($con, $select_product);
	while ($row_product = mysqli_fetch_array($run_query)) {
		$worker_id = $row_product['worker_id'];
        $occ_id = $row_product['occ_id'];
        $genre_id = $row_product['genre_id'];
		$name = $row_product['name'];
		$dob = $row_product['dob'];
		$year = substr($dob, 0, 4);
		$month = substr($dob, 5, 2);
		$dy = substr($dob, 8, 2);
		$religion = $row_product['religion'];
		$gender = $row_product['gender'];
        $fee = $row_product['fee'];
		$org = $row_product['org'];
		$state = $row_product['state'];
		$city = $row_product['city'];
		$area = $row_product['area'];
		$experience = $row_product['experience'];
		$work_desc= $row_product['work_desc'];
		$family_desc = $row_product['family_desc'];
        $image= $row_product['image'];
	}
}
?>
	<h2 align="center">Edit Resume of <?php echo $name;?><hr>
	<img src="worker_images/<?php if(!empty($image)) echo $image; else echo "noimg.jpg"; ?>" height="100" width="100"></h2>
    <form name="resume" onsubmit="return valid(this.form);" action="index.php?edit_entry=<?php echo $edit_id; ?>"  method="post" enctype="multipart/form-data" class="form-horizontal">
		<div class="row form-group col-sm-offset-1 col-sm-12">
			<input class="form-control" type ="text" name ="name" placeholder="Person Name" size="60" value="<?php echo $name; ?>" />
		</div>
		<div class="form-group col-sm-2">Date of Birth:</div>
		<div class="form-group col-sm-3">	
			<select name="yr" class="form-control">
			<option value="">Select Year</option>
		<?php
			for ($i = 0; $i < 35; $i++){
		?>
				<option value = "<?php echo (1997 - $i);?>" <?php if($year == (1997 - $i)) echo "selected";?>><?php echo (1997 - $i);?></option>
		<?php
			}
		?>	</select>
		</div>
		<div class="form-group col-sm-1"></div>	
		<div class="form-group col-sm-3">	
			<select name="mon" class="form-control">
			<option value="">Select Month</option>
		<?php
			for ($i = 1; $i <= 12; $i++){?>
				<option value = "<?php echo($i < 10 ? "0".$i : $i);?>" <?php if($month == ($i < 10 ? "0".$i : $i)) echo"selected";?>><?php echo($i < 10 ? "0".$i : $i);?></option>
		<?php
			}
		?>	</select>
		</div>
		<div class="form-group col-sm-1"></div>	
		<div class="form-group col-sm-3">	
			<select name="day" class="form-control">
			<option value="">Select Day</option>
		<?php
			for ($i = 1; $i <= 31; $i++){?>
				<option value = "<?php echo($i < 10 ? "0".$i : $i);?>"<?php if($dy == ($i < 10 ? "0".$i : $i)) echo"selected";?>><?php echo($i < 10 ? "0".$i : $i);?></option>
			<?php
			}
		?>	</select>
		</div>
		<div class="form-group col-sm-offset-1 col-sm-6">
			<select name="occ_id" class="form-control">
			<option value="">Select Occupation</option>
		<?php 
			$get_occ = "select  * from occupations";
			$run_occ = mysqli_query($con, $get_occ);
			while  ($row_occ = mysqli_fetch_array($run_occ)) {
				$occnew_id  = $row_occ['occ_id'];
				$occ_title  = $row_occ['occ_title'];
		?>
				<option value="<?php echo $occnew_id; ?>" <?php if($occ_id == $occnew_id){ echo "selected";}?>><?php echo $occ_title;?> </option>		  
		<?php
			}  
		?>
			</select>
		</div>
		<div class="form-group col-sm-1"></div>	
		<div class="form-group col-sm-offset-1 col-sm-6">
			<select name="genre_id" class="form-control">
			<option value="">Select a Genre</option>
		<?php
			$get_genre = "select  * from genre";
			$run_genre = mysqli_query($con, $get_genre);
			while  ($row_genre = mysqli_fetch_array($run_genre)) {
				$genrenew_id  = $row_genre['genre_id'];
				$genre_title  = $row_genre['genre_title'];
		?>
				<option value="<?php echo $genrenew_id;?>" <?php if($genre_id == $genrenew_id){ echo "selected";}?>><?php echo $genre_title;?> </option>		  
		<?php
			}  
		?>				  
			</select>
		</div>
		<div class="form-group col-sm-offset-1 col-sm-12">
			<label>Upload Image</label>
			<input type ="file" name ="image" class="form-control"/>
		</div>
		<div class="form-group col-sm-offset-1 col-sm-12">
			<input type ="text" name ="fee" placeholder="Salary Expected" class="form-control" value="<?php echo $fee; ?>" />
		</div>
		<div class="form-group col-sm-offset-1 col-sm-12">
			<input type ="text" name ="org" placeholder="Name of Organization/NGO/Self" class="form-control" value="<?php echo $org; ?>" />
		</div>
		<div = "row">
		<div class="form-group col-sm-offset-1 col-sm-6">
			<input type ="text" name ="religion" class="form-control" size="50" placeholder="Religion" value="<?php echo $religion; ?>" />
		</div>
		<div class="form-group col-sm-1"></div>
		<div class="form-group col-sm-offset-1 col-sm-6">
			<select name="gender" class="form-control">
				<option value="">Select Gender</option>
				<option value="m" <?php if($gender == "m"){ echo "selected";}?>>Male</option>
				<option value="f" <?php if($gender == "f"){ echo "selected";}?>>Female</option>
			</select>
		</div>
		</div>
		<div class="col-sm-2">Place of Work:</div>
		<div class="form-group col-sm-offset-1 col-sm-3">
			<select name="state" class="form-control">
				<option value="">Select State</option>
				<option value="Delhi NCR" <?php if($state == "Delhi NCR"){ echo "selected";}?>>Delhi NCR</option>
				<option value="Maharashtra" <?php if($state == "Maharashtra"){ echo "selected";}?>>Maharashtra</option>
			</select>
		</div>
		<div class="col-sm-1"></div>
		<div class="form-group col-sm-offset-1 col-sm-3">
			<input type ="text" name ="city" class="form-control" size="50" placeholder="City" value="<?php echo $city; ?>" />
		</div>
		<div class="col-sm-1"></div>
		<div class="form-group col-sm-offset-1 col-sm-3">
			<input type ="text" name ="area" class="form-control" size="50" placeholder="Area" value="<?php echo $area; ?>" />
		</div>
		<div class="form-group col-sm-offset-1 col-sm-12">
			<input type ="text" name ="experience" placeholder="Experience" class="form-control" value="<?php echo $experience; ?>" />
		</div>
		<div class="form-group col-sm-offset-1 col-sm-12">
			<textarea name="work_desc" placeholder="Work Related Description" class="form-control" cols="50" rows="10"><?php echo $work_desc; ?></textarea>
		</div>
		<div class="form-group col-sm-offset-1 col-sm-12">
			<textarea name="family_desc" placeholder="Family Background" class="form-control" cols="50" rows="10"><?php echo $family_desc; ?></textarea>
		</div>
		<div class="form-group col-sm-12">
			<input type ="submit" name ="update" value="Edit" class="btn btn-danger btn-lg" />
        </div>
	</form>
</body>
</html>
<?php
	if(isset($_POST['update'])){
		$update_id = $worker_id;						
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
		$org = $_POST['org'];
		$state = $_POST['state'];
		$city = $_POST['city'];
		$area = $_POST['area'];
		$experience = $_POST['experience'];
        $work_desc = $_POST['work_desc'];
        $family_desc = $_POST['family_desc'];
        
		//getting the image from the field
		$new_image = $_FILES['image']['name'];
        $image_tmp = $_FILES['image']['tmp_name'];	
        move_uploaded_file($image_tmp,"worker_images/$new_image");
		if(!empty($new_image))
			$image = $new_image;
		

		$update_product = "update workers set name = '$name', dob = '$dob', occ_id = '$occ_id', genre_id = '$genre_id',
		religion = '$religion', gender = '$gender', fee = '$fee', org = '$org', state = '$state', city = '$city',
		area = '$area', experience = '$experience', work_desc = '$work_desc', family_desc = '$family_desc',
		image = '$image' where  worker_id='$update_id'";
		$update_pro = mysqli_query($con, $update_product);
		if($update_pro) {
			echo"<script>alert ('entry has been updated.')</script>";
            echo"<script>window.open('index.php?view_entry','_self')</script>";
		}
	}
?>