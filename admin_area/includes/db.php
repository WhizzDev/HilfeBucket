<?php
$con = mysqli_connect("localhost", "root", "", "ij");

if  (mysqli_connect_errno() ){
	echo  "failed to connect" . mysqli_connect_error();
}	 
?>