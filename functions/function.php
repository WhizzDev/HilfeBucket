<?php

$con = mysqli_connect("localhost","root","","ij");

if  (mysqli_connect_errno() ){
    echo  "failed to connect" . mysqli_connect_error();
}	 
	
//getting user ip address	
function getIp() {
    $ip = $_SERVER['REMOTE_ADDR'];
	if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } else if (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    }
	return $ip;
}	
	
//getting shopping cart	
function selection() {
	if(isset($_GET['add_selection'])) {	
		global $con;
		$ip = getIp();
		$worker_id = $_GET['add_selection'];
		$check_pro =" select * from selections where ip_add ='$ip' AND w_id ='$worker_id' ";
		$run_check =mysqli_query($con, $check_pro);
		if(mysqli_num_rows($run_check)>0) {
			echo "";
		}
		else {
			$insert_pro = " insert into selections  (w_id,ip_add) values ('$worker_id' , '$ip')";
			$run_pro = mysqli_query($con,$insert_pro);
			echo "<script>window.open('index.php','_self')</script>";
		}
	}
}
	
// getting the total items
function total_selections() {
	if(isset($_GET['add_selection'])) {
		global $con;
		$ip = getIp();
		$get_items =  "select  *  from selections where ip_add='$ip' ";
		$run_items = mysqli_query($con,  $get_items);
		$count_items = mysqli_num_rows($run_items);
	}
	else{
		global $con;
		$ip = getIp();
		$get_items =  "select  *  from selections where ip_add='$ip' ";
		$run_items = mysqli_query($con,  $get_items);
		$count_items = mysqli_num_rows($run_items);
	}
	echo $count_items;
}

//getting total price of items in the cart
function total_price() {
	$total = 0;
	global $con;
	$ip =  getIp();
	$sel_price = "select  *  from selections where ip_add ='$ip' ";
	$run_price = mysqli_query($con,  $sel_price);
	while($p_price=mysqli_fetch_array($run_price)) {
		$worker_id = $p_price['w_id'];
		$pro_price = "select  *  from workers where worker_id ='$worker_id' ";
		$run_pro_price = mysqli_query($con, $pro_price);
		while  ($pp_price = mysqli_fetch_array($run_pro_price)) {
			$fee = array($pp_price['fee']);
			$values = array_sum($fee);
			$total +=$values;
		}
	}
	echo $total;
}
		 
//getting the categories
function getOccupation() {
    global $con;
    $get_occ = "select  * from occupations";
	$run_occ = mysqli_query($con, $get_occ);
	while  ($row_occ = mysqli_fetch_array($run_occ)) {
		$occ_id  = $row_occ['occ_id'];
		$occ_title  = $row_occ['occ_title'];
		echo "<li class='list-group-item'><a href='index.php?occ=$occ_id'>$occ_title</a></li>";		  
	}
}

//getting the brands
function getGenre() {
	global $con;
	$get_genre = "select  * from genre";
	$run_genre = mysqli_query($con, $get_genre);
	while  ($row_genre = mysqli_fetch_array($run_genre)) {
		$genre_id  = $row_genre['genre_id'];
		$genre_title  = $row_genre['genre_title'];
		echo "<li class='list-group-item'><a href='index.php?genre=$genre_id'>$genre_title</a></li>";		  
	}
}

function getWorkers() {   
	if(!isset($_GET['occ'])) {
		if(!isset($_GET['genre'])) {   
			global $con;
			$get_pro = "select * from workers order by RAND() LIMIT 0,6";
			$run_pro = mysqli_query($con, $get_pro);
			while($row_pro = mysqli_fetch_array($run_pro)) {
				$worker_id= $row_pro['worker_id'];
		        $occ_id= $row_pro['occ_id'];
		        $genre_id= $row_pro['genre_id'];
		        $name= $row_pro['name'];
		        $fee= $row_pro['fee'];
		        $image= $row_pro['image'];
				$religion = $row_pro['religion'];
				$experience = $row_pro['experience'];
				$area = $row_pro['area'];
				$city = $row_pro['city'];
				$state = $row_pro['state'];
				echo "
				    <a href= 'details.php?worker_id=$worker_id' target='blank' class='links'>
					<div id = 'single_product'>
						<h3>$name</h3>
						<img src='admin_area/worker_images/$image' width='120' height= '100'  />
							<p style='font-size:25px'><b>&#8377  $fee</b></p>
							<p style='color:black'>Work: $area, <br>$city, $state</p>
							<p><b>Religion: $religion</b><p>
							<p><b>Experience: $experience</b><p>
							<p><b>Age var</b><p>
							<a class='btn btn-success ' href= 'index.php?add_selection=$worker_id' >Add To JobBucket</a>
					</div>
					</a>	
				";
			}
		}
	}	
}		

function getOccWorker() {   
	if(isset($_GET['occ'])) {
		$cat_id = $_GET['occ'];
		global $con;
		$get_cat_pro = "select * from workers where occ_id='$cat_id'";
	    $run_cat_pro = mysqli_query($con, $get_cat_pro);
		if ($run_cat_pro)
			$count_cats = mysqli_num_rows($run_cat_pro);
		if($count_cats == 0) {		
			echo" <h1>Oops! no entry.</h1>";
		}
		if(isset($run_cat_pro) and !empty($run_cat_pro))
			while($row_pro = mysqli_fetch_array($run_cat_pro)) {
				$worker_id= $row_pro['worker_id'];
		        $occ_id= $row_pro['occ_id'];
		        $genre_id= $row_pro['genre_id'];
		        $name= $row_pro['name'];
		        $fee= $row_pro['fee'];
		        $image= $row_pro['image'];
				$religion = $row_pro['religion'];
				$experience = $row_pro['experience'];
				$area = $row_pro['area'];
				$city = $row_pro['city'];
				$state = $row_pro['state'];
				echo "
				    <a href= 'details.php?worker_id=$worker_id' target='blank' class='links'>
					<div id = 'single_product'>
						<h3>$name</h3>
						<img src='admin_area/worker_images/$image' width='120' height= '100'  />
							<p style='font-size:25px'><b>&#8377  $fee</b></p>
							<p style='color:black'>Work: $area, <br>$city, $state</p>
							<p><b>Religion: $religion</b><p>
							<p><b>Experience: $experience</b><p>
							<p><b>Age var</b><p>
							<a class='btn btn-success ' href= 'index.php?add_selection=$worker_id' >Add To JobBucket</a>
					</div>
					</a>	
				";
			}
	}
}		

function getGenreWorker() {   
	if(isset($_GET['genre'])) {
		$brand_id = $_GET['genre'];
		global $con;
		$get_brand_pro = "select * from workers where genre_id='$brand_id'";
	    $run_brand_pro = mysqli_query($con, $get_brand_pro);
		if ($run_brand_pro)
			$count_brands = mysqli_num_rows($run_brand_pro);
		if($count_brands == 0) {		
			echo"<h1>Oops! no entry.</h1>";
		}
		if(isset($run_brand_pro) and !empty($run_brand_pro))
			while($row_pro = mysqli_fetch_array($run_brand_pro)) {
				$worker_id= $row_pro['worker_id'];
		        $occ_id= $row_pro['occ_id'];
		        $genre_id= $row_pro['genre_id'];
		        $name= $row_pro['name'];
		        $fee= $row_pro['fee'];
		        $image= $row_pro['image'];
				$religion = $row_pro['religion'];
				$experience = $row_pro['experience'];
				$area = $row_pro['area'];
				$city = $row_pro['city'];
				$state = $row_pro['state'];
				echo "
				    <a href= 'details.php?worker_id=$worker_id' target='blank' class='links'>
					<div id = 'single_product'>
						<h3>$name</h3>
						<img src='admin_area/worker_images/$image' width='120' height= '100'  />
							<p style='font-size:25px'><b>&#8377  $fee</b></p>
							<p style='color:black'>Work: $area, <br>$city, $state</p>
							<p><b>Religion: $religion</b><p>
							<p><b>Experience: $experience</b><p>
							<p><b>Age var</b><p>
							<a class='btn btn-success ' href= 'index.php?add_selection=$worker_id' >Add To JobBucket</a>
					</div>
					</a>	
				";
			}
	}
}		
?>