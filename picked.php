
<?php

include("functions/function.php");

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>JobBucket.com </title>
	<meta name="description" content="maidsjobs">
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="styles/style.css" media="all"   />
	</head>

<body>
    <div class="container" style="background-color:#003366">
		<form class="form" method="get" action="results.php" enctype="multipart/form-data">
		    <div class="form-group">
                <div class="col-lg-11">				  
					<input type ="text" name="user_query" class="form-control input-lg" placeholder="search here"  />
				</div>
				<div class="col-lg-1">
					<input type ="submit" name="search"  value="search" class="btn btn-lg btn-danger" />
			    </div>
			</div>				   
		</form>
	</div>
	<div class="container">
		<div id="menubar" class="row">
			<ul  id="menu">
				<li><a href="index.php">Home</a></li>
				<li><a href="all_products.php">All Jobs</a></li>
				<li><a href="#">my account</a></li>
				<li><a href="#">sign up</a></li>
				<li><a href="#">JobBucket</a></li>
				<li><a href="#">Contact us</a></li>
			</ul>       
		</div>
		<div class="container">
			<div class="row">
                <div class="col-md-3">						             
					<span><h2>Occupation</h2></span>
					<ul class="list-group">
						<?php  getOccupation(); ?>
					</ul>
					<span><h2>Genre</h2></span>
					<ul class="list-group">
						<?php    getGenre(); ?>
					</ul>
				</div>
				<span style= " float:right; font-size:18px; padding:5px; line-height:40px;">
					<?php  selection();    ?>
					Welcome Guest!  <strong style ="color:red">JobBucket-</strong> Shortlisted : <strong style ="color:red"> <?php  echo  total_selections();?></strong>
					Total Price:<strong style ="color:red;text-decoration:underline;"><?php total_price(); ?></strong>
					<a href ="picked.php"  class="btn btn-danger">Go To JobBucket</a>
				</span>
				<div class="col-md-9">
					<form action="picked.php" method="post" enctype="multipart/form-data" class="form-horizontal">
						<table class="table table-hover">
							<thead>	 
								<tr>
									<th>Deselect</th>
									<th>ShortListed</th>
									<th>Total Price:</th>
								</tr>
		                    </thead>
							<?php                                         
								$total = 0;
								global $con;
								$ip =  getIp();
								$sel_price = "select  *  from selections where ip_add ='$ip' ";
								$run_price = mysqli_query($con,  $sel_price);
								while($p_price=mysqli_fetch_array($run_price)) {
									$pro_id = $p_price['w_id'];
									$pro_price = "select  *  from workers where worker_id ='$pro_id' ";
									$run_pro_price = mysqli_query($con, $pro_price);
									while  ($pp_price = mysqli_fetch_array($run_pro_price)) {
										$product_price = array($pp_price['fee']);
										$product_title = $pp_price['name'];
										$product_image = $pp_price['image'];
										$single_price = $pp_price ['fee'];
										$values = array_sum($product_price);
										$total += $values;
							?>
		                    <tbody>
		                        <tr>
									<td><input type="checkbox" name = "remove[]"  value="<?php echo $pro_id; ?>" /></td>
									<td><p><?php echo $product_title; ?></p>
										<img src = "admin_area/worker_images/<?php echo $product_image;?>" width="60" height="60" />
									</td>
									<td><?php echo $single_price; ?></td>
								</tr>
								<?php  
									} 
								}  ?>
								<tr align ="right">
									<td colspan ="5"><b>Sub Total :</b></td>
									<td><?php  echo $total;  ?></td>
								</tr>	 
								<tr align ="center">
									<td colspan ="2"><input class="btn btn-success " type = "submit" name ="update_cart" value="Update Cart" /></td>
									<td ><input class="btn btn-primary" type = "submit" name ="continue" value="Continue Shopping" /></td>
									<td ><a  class="btn btn-info" href="checkout.php">Checkout</a></td>
								</tr>	 
							</tbody>
						</table> 
					</form>
				</div>
				<!--jobbucket ke update ke lia hain-->
				<?php
					$ip = getIp();
					if(isset($_POST['update_cart'])) {
						foreach($_POST['remove'] as $remove_id) {
							$delete_product = "delete from selections where w_id = '$remove_id' AND ip_add='$ip' ";
							$run_delete = mysqli_query ($con, $delete_product);
							if($run_delete) {
								echo"<script>window.open('picked.php','_self')</script>";
							}
						}
					}
					if(isset($_POST['continue'])) {
						echo"<script>window.open('index.php','_self')</script>";
					}
				?>												 
			</div>
		</div>
		<div>
			<div id="footer"></div>	  
	    </div>
	</div>	
</body>
</html>	