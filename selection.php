<!DOCTYPE>


<html>
<head>
    <title>HilfeBucket.com</title>
	
</head>
<body>
<?php
include("navbar.php");
?>
 		<div class="content_wrapper">
			<div id="sidebar">
				<div id="sidebar_title">Occupations</div>
				<ul id="cats">
					<?php  getOccupation(); ?>
				</ul>
				<div id="sidebar_title">Genre</div>
				<ul id="cats">
					<?php    getGenre(); ?>
				</ul>
			</div>
				<div id = "product_box">
					<form action="" method="post" enctype="multipart/form-data">
						<table align="center" width="700"  bgcolor="skyblue">
							<tr align= "center">
								<th>Remove</th>
								<th>Product($)</th>
								<th>Total Price:</th>
							</tr>
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
									$product_price = array($pp_price['worker_price']);
									$product_title = $pp_price['worker_title'];
									$product_image = $pp_price['worker_image'];
									$single_price = $pp_price ['worker_price'];
									$values = array_sum($product_price);
									$total += $values;
						?>
							<tr align ="center">
								<td><input type="checkbox" name = "remove[]"  value="<?php echo $pro_id; ?>" /></td>
								<td><?php echo $product_title; ?><br>
									<img src = "admin_area/product_images/<?php echo $product_image;?>" width="60" height="60" />
								</td>
								<td><?php echo $single_price; ?></td>
							</tr>
						<?php  } }  ?>
							<tr align ="right">
								<td colspan ="5"><b>Sub Total :</b></td>
								<td><?php  echo $total;  ?></td>
							</tr>	 
							<tr align ="center">
								<td colspan ="2"><input type = "submit" name ="update_selection" value="Update Cart" /></td>
								<td ><input type = "submit" name ="continue" value="Continue Shopping" /></td>
								<td ><button><a href="checkout.php" style="text-decoration:none; color:black;">
									Checkout</a></button>
								</td>
							</tr>	 
						</table> 
					</form>
					<?php
						$ip = getIp();
						if(isset($_POST['update_selection'])) {
							foreach($_POST['remove'] as $remove_id) {
								$delete_product = "delete from selections where w_id = '$remove_id' AND ip_add='$ip' ";
								$run_delete = mysqli_query ($con, $delete_product);
								if($run_delete) {
									echo"<script>window.open('selection.php','_self')</script>";
								}
							}
						}
						if(isset($_POST['continue'])) {
							echo"<script>window.open('index.php','_self')</script>";
						}
					?>												 
				</div>
			</div>
		</div>
		<?php
include("footer.php");
?>
	</div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</body>
</html>	