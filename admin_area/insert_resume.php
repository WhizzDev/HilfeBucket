<?php
include("includes/db.php");

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>PlaySchool </title>
	<meta name="description" content="playschoolnoida">
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">
</head>
<body>

   

                 <form action="insert_resume.php"  method="post" enctype="multipart/form-data" class="form-horizontal">

                            
							        
									
							
									      <h2 align="center">Upload Resume</h2>
                                     
									 
									 <div class="form-group">
									     
									      
										  <input class="form-control" type ="text" name ="product_title" placeholder="Person Name" size="60"  required />
                                     </div>
									 
									  
									    
										  <div class="form-group">
										       <select name="product_cat" class="form-control">
										            <option>Select an Occupation</option>
													
													<?php 
													       
														    $get_cats = "select  * from occupations";
			
			                                                $run_cats = mysqli_query($con, $get_cats);
			
			                                                while  ($row_cats = mysqli_fetch_array($run_cats)) {
			
			                                                $cat_id  = $row_cats['occ_id'];
			                                                $cat_title  = $row_cats['occ_title'];
					  
			                                             echo "<option value='$cat_id'>$cat_title</option>";		  
			
			
			
			}
													
													   
													?>
										  
				
										        </select>
										  
                                     </div>
									 
									 
									       <div class="form-group">
										  
										       <select name="product_brand" class="form-control">
										            <option>Select a brand </option>
										  <?php
										   $get_brands = "select  * from genre";
			
			                               $run_brands = mysqli_query($con, $get_brands);
			
			                               while  ($row_brands = mysqli_fetch_array($run_brands)) {
			
			                                $brand_id  = $row_brands['genre_id'];
			                               $brand_title  = $row_brands['genre_title'];
					  
			                               echo "<option value='$brand_id'>$brand_title</option>";		  
			                      
			          
			
			}  
										  
										  
						                         ?>				  
										  
										  </select>
										  </div>
										  
										  
                                   
									 
								
									     <div class="form-group">
										 <label>Upload Image</label>
										 <input type ="file" name ="product_image" class="form-control"/>
                                          </div>
									 
									 
									      <div class="form-group">
										  <input type ="text" name ="product_price" placeholder="Salary Expected" class="form-control" required/>
                                           </div>
									 
									  
									      <div class="form-group">
										  <textarea name="product_desc" placeholder="description" class="form-control" cols="50" rows="10"></textarea>
                                           </div>
									 
									 
									  
									      <div class="form-group">
										  <input type ="text" name ="product_keywords" class="form-control" size="50" placeholder="keywords for search" required />
                                          </div>
									 
									 
								
									      <div class="form-group">
									       <input type ="submit" name ="insert_post"   value="Upload Now" class="btn btn-primary"/>
                                           </div>

                             
                 </form>
</body>
</html>

              <?php
			     
				 
                         if(isset($_POST['insert_post']))  {
                             
							 
					    //getting text data from the fields		 
                              $product_title = $_POST['product_title'];
                              $product_cat = $_POST['product_cat'];
                              $product_brand = $_POST['product_brand'];
                              $product_price = $_POST['product_price'];
                              $product_desc = $_POST['product_desc'];
                              $product_keywords = $_POST['product_keywords'];
                              
							  
						//getting the image from the field

                         $product_image = $_FILES['product_image']['name'];
                          $product_image_tmp = $_FILES['product_image']['tmp_name'];	
                          
						   move_uploaded_file($product_image_tmp,"worker_images/$product_image");

						 $insert_product = "insert into workers
						  (worker_occ,worker_brand,worker_title,worker_price,worker_desc,worker_image,worker_keywords)  values
						  ('$product_cat', '$product_brand','$product_title','$product_price','$product_desc','$product_image','$product_keywords')";
				
						   $insert_pro = mysqli_query($con, $insert_product);
						  
						  if($insert_pro) {
						  
						  
             				echo"<script>alert ('Resume has been inserted.')</script>";
             				echo"<script>window.open('insert_resume.php','_self')</script>";
							
							}
						  
}
                      ?>








						   

	 