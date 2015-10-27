<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>JobBucket.com</title>
	<meta name="description" content="Wiredwiki App">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
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
<?php
$con = mysqli_connect("127.0.0.1", "root", "", "imformaljob");

if  (mysqli_connect_errno() ){
	echo  "failed to connect" . mysqli_connect_error();
}	
if(isset($_GET['edit_occ']))  {
	$edit_id = $_GET['edit_occ'];
	$select_product = "select * from occupations where occ_id='$edit_id' ";
	$run_query = mysqli_query($con, $select_product);
	while ($row_product = mysqli_fetch_array($run_query)) {
	       $occ_id = $row_product['occ_id'];
		   $occ_title = $row_product['occ_title'];
        }
    }
?>
	<form name="occupation" action="index.php?edit_occ=<?php echo $edit_id; ?>"  method="post" enctype="multipart/form-data" onsubmit="return valid(this.form);" class="form-horizontal">
		<h2 align="center">Edit Occupation</h2>
		<div class="row form-group col-sm-offset-1 col-sm-12">
			<input class="form-control" type ="text" name ="occ" value = "<?php echo $occ_title;?>" placeholder="Enter your occupation here" size="60" />
		</div>
		<div class="form-group col-sm-offset-1 col-sm-12">
			<input type ="submit" name ="edit"   value="Edit Now" class="btn btn-danger btn-lg"/>
		</div>
	</form>
</body>
<?php
 if(isset($_POST['edit']))  {
	$title = $_POST['occ'];
	
	$update_product = "update occupations set occ_title = '$title' where occ_id = '$edit_id'";
	$run_update = mysqli_query($con,$update_product);
	if($run_update) {
			echo"<script>alert ('Entry has been Updated.')</script>";
            echo"<script>window.open('index.php?view_occ','_self')</script>";
		}
 }

?>
</html>