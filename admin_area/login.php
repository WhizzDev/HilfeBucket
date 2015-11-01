<?php
include_once 'includes/db_connect.php';
include_once 'includes/functions.php';
 
sec_session_start();
 
if (login_check($mysqli) == true) {
    $logged = 'in';
} else {
    $logged = 'out';
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Secure Login: Log In</title>
		<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
        
        <script type="text/JavaScript" src="js/sha512.js"></script> 
        <script type="text/JavaScript" src="js/forms.js"></script> 
    </head>
    <body>
        <?php
        if (isset($_GET['error'])) {
            echo '<div class="alert alert-danger"<p class="error">Error Logging In!</p></div>';
        }
        ?> 
		<div class="container">
		<div class="row">
        <form action="includes/process_login.php" method="post" name="login_form" class="form-horizontal">                      
			<div class="form-group">
            <label>Email:</label><input type="email" name="email" class="form-control"/>
            <label>Password:</label> <input type="password" 
                             name="password" 
                             id="password" class="form-control"/>
            </div>
			<div class="form-group">
			<input type="button" 
                   value="Login" 
                   onclick="formhash(this.form, this.form.password);" class="btn btn-danger" /> 
			</div>	   
        </form>
		</div>
		</div>
 
<?php
        if (login_check($mysqli) == true) {
                        echo '<p>Currently logged ' . $logged . ' as <b>' . htmlentities($_SESSION['username']) . '</b>.</p>';
 
            echo '<p>Do you want to change user? <a href="includes/logout.php">Log out</a>.</p>';
        } else {
                        echo '<p>Currently logged ' . $logged . '.</p>';
                        echo "<p>If you don't have a login, please <a href='register.php'>register</a></p>";
                }
?>      
    </body>
</html>