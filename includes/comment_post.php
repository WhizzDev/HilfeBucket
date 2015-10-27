<script>
	function valid(form){
		chk_name = /^[A-Za-z\s]+/;
		chk_email = /^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}$/;
		chk_cmt = /^[A-Za-z0-9\s\.\-@]{50}[A-Za-z0-9\s\.\-@]*/;
		if(!chk_name.test(document.cmt.comment_name.value)){
			alert("Invalid Name Entered");
			document.cmt.comment_name.focus();
			return false;
		}
		if(!chk_name.test(document.cmt.comment_email.value)){
			alert("Invalid Email Entered");
			document.cmt.comment_email.focus();
			return false;
		}
		if(!chk_name.test(document.cmt.comment.value)){
			alert("Enter Valid Comment");
			document.cmt.comment.focus();
			return false;
		}
		return true;
	}
</script>
<?php
    if(isset($_GET['worker_id']))  {
		$product_id = $_GET['worker_id'];
		$get_pro = "select * from workers where worker_id= '$worker_id' ";
	    $run_pro = mysqli_query($con, $get_pro);
		$row = mysqli_fetch_array($run_pro);
		$pro_new_id = $row['worker_id'];
	}
?>
	<form name="cmt" method="post" action="details.php?worker_id=<?php  echo $worker_id; ?>" class="form-horizontal" onsubmit="return valid(this.form);" >
		<h2 align="center">Your View About Employee work</h2>
		<div class="form-group">
			<label>Name</label>
			<input class="form-control" type="text" name="comment_name"  />
		</div>
		<div class="form-group">
			<label>Email</label>
			<input class="form-control" type="text" name="comment_email"  />
		</div>
		<div class="form-group">
			<label>Comment</label>
			<textarea class="form-control" name="comment" ></textarea>
		</div>
		<div class="form-group">
			<label>Rating</label>
			<span class="star-rating">
				<input type="radio" name="rating" value="1"><i></i>
				<input type="radio" name="rating" value="2"><i></i>
				<input type="radio" name="rating" value="3"><i></i>
				<input type="radio" name="rating" value="4"><i></i>
				<input type="radio" name="rating" value="5"><i></i>
			</span>
		</div>
		<div class="form-group">
			<input type="submit" name="submit" value="post comment" class="btn btn-danger" />
		</div>
	</form>
	<h2 align="center">Reviews<sup class="badge">
	<?php
		$get_comments = "select * from comments where worker_id='$worker_id' AND status='approved' ";
		$run_comments = mysqli_query($con, $get_comments);
		$count = mysqli_num_rows($run_comments);
		echo $count;
	?>
	</sup></h2>
	<?php		  
		$get_comments = "select * from comments where worker_id='$worker_id' AND status='approved' ";
		$run_comments = mysqli_query($con, $get_comments);
	    while($row_comments=mysqli_fetch_array($run_comments)) {
			$comment_name=$row_comments['comment_name'];
			$comment_text=$row_comments['comment_text'];
			echo "
				<div class='container'>
					<hr>
					<div class='row'><h3>$comment_name <i>says:</i></h3></div>
					<div class='row'><p>$comment_text</p></div>
				</div>
			";
		}									 
		include("admin_area/includes/db.php");
		if(isset($_POST['submit'])) {
			$pro_con_id = $pro_new_id;
			$comment_name = $_POST['comment_name'];
			$comment_email = $_POST['comment_email'];
			$comment = $_POST['comment'];
			$status = 'unapproved';
			
			$query_comment = "insert into comments (comment_id, worker_id, comment_name, comment_email, comment_text, status) values
			('','$pro_con_id','$comment_name', '$comment_email', '$comment', '$status')";
			$run_query = mysqli_query($con, $query_comment);
			
			if(isset($_POST['rating'])){ 
				$sel = "SELECT comment_id FROM comments WHERE comment_name = '$comment_name' AND 
				comment_email = '$comment_email' AND worker_id = '$pro_con_id' AND comment_text = '$comment'";
				$run = $con->query($sel);
				$row = $run->fetch_assoc();
				$com_id = $row['comment_id'];
				$rating = $_POST['rating'];
				$rate = "insert into ratings(r_id, worker_id, rating_email, rating, comment_id) values
					('', '$pro_con_id', '$comment_email', '$rating', '$com_id')";
				$run_rate = mysqli_query($con, $rate);
			}
			
			echo "<script>alert('yoyr comment will be published after approval')</script>";
			echo "<script>window.open('details.php?worker_id='$worker_id' )</script>";
		}
	?>