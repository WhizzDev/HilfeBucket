<?php
include_once 'includes/register.inc.php';
include_once 'includes/functions.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Registration Form</title>
        <script type="text/JavaScript" src="js/sha512.js"></script> 
        <script type="text/JavaScript" src="js/forms.js"></script>
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </head>
    <body>
        <!-- Registration form to be output if the POST variables are not
        set or if the registration script caused an error. -->
        <h1 class="text-center">NGO REGISTRATION FORM</h1>
        <?php
        if (!empty($error_msg)) {
            echo $error_msg;
        }
        ?>
		<div class="col-md-6">
			<form class="form-horizontal" action="<?php echo esc_url($_SERVER['PHP_SELF']); ?>" method="post" name="register">
				<div class="form-group">
					<label class="control-label col-sm-4">Name of Organization</label>
					<div class="col-sm-8"><input class="form-control" type='text' name='org_name' placeholder="Name of Organization"/></div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-4">Username</label>
					<div class="col-sm-8"><input class="form-control" type="text" name="uname" placeholder="Enter your Username" /></div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-4">Email Address</label>
					<div class="col-sm-8"><input class="form-control" type="text" name="email" placeholder="example@gmail.com" /></div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-4">Password</label>
					<div class="col-sm-8"><input class="form-control" type="password" name="password" id="password"/></div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-4">Confirm Password</label>
					<div class="col-sm-8"><input class="form-control"type="password" name="confirmpwd"/></div>	
				</div>
				<div class="form-group">
					<label class="control-label col-sm-4">Phone Number</label>
					<div class="col-sm-8">
					<div class="col-sm-4"><input class="form-control"type="text" name="stdcode" maxlength="5" /></div>
					<div class="col-sm-8"><input class="form-control"type="text" name="lndline" maxlength="8" /></div>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-4">Mobile</label>
					<label class="control-label col-sm-2">+91</label>
					<div class="col-sm-6"><input class="form-control" type="text" name="mob" maxlength="10" /></div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-4">Fax</label>
					<div class="col-sm-8">
					<div class="col-sm-4"><input class="form-control"type="text" name="faxcode" maxlength="5" /></div>
					<div class="col-sm-8"><input class="form-control"type="text" name="fax" maxlength="8" /></div>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-4" style="vertical-align:top">Address</label>
					<div class="col-sm-8"><textarea class="form-control" rows="5" cols="50" name="add"></textarea></div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-4">City</label>
					<div class="col-sm-8"><input class="form-control"type="text" name="city"/></div>	
				</div>
				<div class="form-group">
					<label class="control-label col-sm-4">State</label>
					<div class="col-sm-8"><select name="state" class="form-control">
						<option value="">Select State</option>
						<option value="Delhi NCR">Delhi NCR</option>
						<option value="Maharashtra">Maharashtra</option></select></div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-4">Pin</label>
					<div class="col-sm-8"><input class="form-control"type="text" name="confirmpwd"/></div>	
				</div>
				
            <input class="btn btn-danger btn-lg col-sm-offset-4" type="button" 
                   value="Register" style="margin-bottom:20px"
                   onclick="return regformhash(this.form,
                                   this.form.username,
                                   this.form.email,
                                   this.form.password,
                                   this.form.confirmpwd,
								   this.form.stdcode,
								   this.form.lndline,
								   this.form.mob,
								   this.form.faxcode,
								   this.form.fax,
								   this.form.add,
								   this.form.city,
								   this.form.state,
								   this.form.pin);" /> 
        </form>
		</div>
		<div class="col-md-6">
        <ul>
            <li>Usernames may contain only digits, upper and lowercase letters and underscores</li>
            <li>Emails must have a valid email format</li>
            <li>Passwords must be at least 6 characters long</li>
            <li>Passwords must contain
                <ul>
                    <li>At least one uppercase letter (A..Z)</li>
                    <li>At least one lowercase letter (a..z)</li>
                    <li>At least one number (0..9)</li>
                </ul>
            </li>
            <li>Your password and confirmation must match exactly</li>
        </ul>
		<p>Return to the <a href="index.php">login page</a>.</p>
		</div>
    </body>
</html>