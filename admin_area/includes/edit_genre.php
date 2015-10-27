<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>JobBucket.com</title>
	<meta name="description" content="Wiredwiki App">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
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
<?php
$con = mysqli_connect("127.0.0.1", "root", "", "imformaljob");

if  (mysqli_connect_errno() ){
	echo  "failed to connect" . mysqli_connect_error();
}	
if(isset($_GET['edit_genre']))  {
	$edit_id = $_GET['edit_genre'];
	$select_product = "select * from genre where genre_id='$edit_id' ";
	$run_query = mysqli_query($con, $select_product);
	while ($row_product = mysqli_fetch_array($run_query)) {
	       $genre_id = $row_product['genre_id'];
		   $genre_title = $row_product['genre_title'];
        }
    }
?>
	<form name="genre" action="index.php?edit_genre=<?php echo $edit_id; ?>"  method="post" enctype="multipart/form-data" onsubmit="return valid(this.form);" class="form-horizontal">
		<h2 align="center">Edit Genre</h2>
		<div class="row form-group col-sm-offset-1 col-sm-12">
			<input class="form-control" type ="text" name ="gen" value = "<?php echo $genre_title;?>" placeholder="Enter your genre here" size="60" />
		</div>
		<div class="form-group col-sm-offset-1 col-sm-12">
			<input type ="submit" name ="edit"   value="Edit Now" class="btn btn-danger btn-lg"/>
		</div>
	</form>
</body>
<?php
 if(isset($_POST['edit']))  {
	$title = $_POST['gen'];
	
	$update_product = "update genre set genre_title = '$title' where genre_id = '$edit_id'";
	$run_update = mysqli_query($con,$update_product);
	if($run_update) {
			echo"<script>alert ('Entry has been Updated.')</script>";
            echo"<script>window.open('index.php?view_genre','_self')</script>";
		}
 }

?>
</html>