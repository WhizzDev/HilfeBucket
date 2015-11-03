<?php
include_once 'includes/register.inc.php';
include_once 'includes/functions.php';
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Registration Form</title>
        <link rel="stylesheet" href="css/bootstrap.min.css">
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
			<p class = "text-center"><small>All Required Fields are Marked with *</small></p>
			<form class="form-horizontal" action="<?php echo esc_url($_SERVER['PHP_SELF']); ?>" method="post" name="reg" onsubmit="return regformhash(this.form);" >
				<div class="form-group">
					<label class="control-label col-sm-4">Name of Organization*</label>
					<div class="col-sm-8"><input class="form-control" type='text' name='org_name' placeholder="Name of Organization"/></div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-4">Email Address*</label>
					<div class="col-sm-8"><input class="form-control" type="text" name="email" placeholder="example@gmail.com" /></div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-4">Password*</label>
					<div class="col-sm-8"><input class="form-control" type="password" name="password" id="password"/></div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-4">Confirm Password*</label>
					<div class="col-sm-8"><input class="form-control"type="password" name="confirmpwd"/></div>	
				</div>
				<div class="form-group">
					<label class="control-label col-sm-4">Phone Number*</label>
					<div class="col-sm-8">
					<div class="col-sm-4"><input class="form-control"type="text" name="stdcode" maxlength="5" /></div>
					<div class="col-sm-8"><input class="form-control"type="text" name="lndline" maxlength="8" /></div>
					</div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-4">Mobile*</label>
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
					<label class="control-label col-sm-4" style="vertical-align:top">Address*</label>
					<div class="col-sm-8"><textarea class="form-control" rows="5" cols="50" name="add"></textarea></div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-4">City*</label>
					<div class="col-sm-8"><input class="form-control"type="text" name="city"/></div>	
				</div>
				<div class="form-group">
					<label class="control-label col-sm-4">State*</label>
					<div class="col-sm-8"><select name="state" class="form-control">
						<option value="">Select State</option>
						<option value="Delhi NCR">Delhi NCR</option>
						<option value="Maharashtra">Maharashtra</option></select></div>
				</div>
				<div class="form-group">
					<label class="control-label col-sm-4">Pin*</label>
					<div class="col-sm-8"><input class="form-control" type="text" name="pin"/></div>	
				</div>
				
            <input class="btn btn-danger btn-lg col-sm-offset-4" type="submit" 
                   value="Register" style="margin-bottom:20px" /> 
        </form>
		</div>
		<div class="col-md-6">
        <ul>
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
		<p>Already Registered? Go to <a href="login.php">login page</a>.</p>
		<p>Register Later? Go <a href="../">back</a>.</p>
		</div>
		<script type="text/JavaScript" src="js/sha512.js"></script> 
        <script>
			function regformhash(form) {
				chk_org = /^[A-Za-z0-9\s]/;
				chk_email = /^[A-Z0-9._%+-]+@[A-Z0-9.-]+\.[A-Z]{2,4}$/;
				chk_pwd = /(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}/;
				chk_std = /^0[1-9][0-9]{1, 3}/;
				chk_phone = /^[1-9][0-9]{5, 7}/;
				chk_mob = /^[6-9][0-9]{9}/; 
				chk_city = /^[A-Za-z\s]/;
				chk_pin = /^[0-9]{6}/;
				if (document.reg.org_name.value == ''  || document.reg.email.value == ''  || 
					document.reg.password.value == ''  || document.reg.confirmpwd.value == ''  || 
					document.reg.stdcode.value == ''  ||  document.reg.lndline.value == ''  || 
					document.reg.add.value == ''  ||  document.reg.city.value == ''  || 
					document.reg.state.value == ''  ||  document.reg.mob.value == ''  ||  
					document.reg.pin.value == '') {
					
					document.reg.password.value = '';
					document.reg.confirmpwd.value = '';
					alert("You must provide all the required details. Please try again");
					return false;
				}
			  
				if(!chk_org.test(document.reg.org_name.value)){
					alert("Invalid Organization Name");
					document.reg.org_name.value = "";
					document.reg.org_name.focus();
					return false;
				}
				
				if(!chk_email.test(document.reg.email.value)){
					alert("Invalid Email Address");
					document.reg.email.value = "";
					document.reg.email.focus();
					return false;
				}
			 
				if (document.reg.password.value.length < 6) {
					alert('Passwords must be at least 6 characters long.  Please try again');
					document.reg.password.focus();
					return false;
				}
			  
				if (!chk_pwd.test(document.reg.password.value)) {
					alert('Passwords must contain at least one number, one lowercase and one uppercase letter.  Please try again');
					document.reg.password.value = "";
					document.reg.password.focus();
					return false;
				}
			 
				if (document.reg.password.value != document.reg.confirmpwd.value) {
					alert('Your password and confirmation do not match. Please try again');
					document.reg.confirmpwd.value = '';
					document.reg.confirmpwd.focus();
					return false;
				}
				
				if(!chk_std.test(document.reg.stdcode.value)){
					alert("Invalid STD code");
					document.reg.stdcode.value = "";
					document.reg.stdcode.focus();
					return false;
				}
				
				if(!chk_phone.test(document.reg.lndline.value)){
					alert("Invalid Phone Number");
					document.reg.lndline.value = "";
					document.reg.lndline.focus();
					return false;
				}
				
				if(document.reg.stdcode.value.length + document.reg.lndline.value.length != 11){
					alert("Invalid STD and Phone Number Combination");
					document.reg.stdcode.value = "";
					document.reg.lndline.value = "";
					document.reg.stdcode.focus();
					return false;
				}
				
				if(!chk_mob.test(document.reg.mob.value)){
					alert("Invalid Mobile Number");
					document.reg.mob.value = "";
					document.reg.mob.focus();
					return false;
				}
				
				if(!chk_std.test(document.reg.faxcode.value)){
					alert("Invalid FAX number");
					document.reg.faxcode.value = "";
					document.reg.faxcode.focus();
					return false;
				}
			
				if(!chk_phone.test(document.reg.fax.value)){
					alert("Invalid FAX Number");
					document.reg.fax.value = "";
					document.reg.fax.focus();
					return false;
				}
				
				if(document.reg.faxcode.value.length + document.reg.fax.value.length != 11){
					alert("Invalid FAX Number");
					document.reg.faxcode.value = "";
					document.reg.fax.value = "";
					document.reg.faxcode.focus();
					return false;
				}
				
				if(!chk_city.test(document.reg.city.value)){
					alert("Invalid City Name");
					document.reg.city.value = "";
					document.reg.city.focus();
					return false;
				}
				
				if(!chk_pin.test(document.reg.pin.value)){
					alert("Incorrect Pin Code");
					document.reg.pin.value = "";
					document.reg.pin.focus();
					return false;
				}
			 
				var p = document.createElement("input");
			 
				document.reg.appendChild(p);
				document.reg.p.name = "p";
				document.reg.p.type = "hidden";
				document.reg.p.value = hex_sha512(document.reg.password.value);
			 
				document.reg.password.value = "";
				document.reg.confirmpwd.value = "";
			 	
				return true;
			}
		</script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>