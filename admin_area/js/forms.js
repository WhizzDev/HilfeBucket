function formhash(form, password) {
    // Create a new element input, this will be our hashed password field. 
    var p = document.createElement("input");
 
    // Add the new element to our form. 
    form.appendChild(p);
    p.name = "p";
    p.type = "hidden";
    p.value = hex_sha512(password.value);
 
    // Make sure the plaintext password doesn't get sent. 
    password.value = "";
 
    // Finally submit the form. 
    form.submit();
}
 
function regformhash(form, uid, email, password, conf, std, lndline, mob, fxcode, fax, add, city, state, pin) {
    // Check each field has a value
	if (uid.value == ''  || email.value == ''  || 
        password.value == ''  || std.value == ''  || 
        lndline.value == ''  ||  add.value == ''  || 
        city.value == ''  ||  state.value == ''  || 
        pin.value == ''  ||  mob.value == ''  ||  conf.value == '') {
		
		form.password.value = '';
		form.conf.value = '';
        alert('You must provide all the requested details. Please try again');
        return false;
    }
 
    // Check the username
 
    re = /^\w+$/; 
    if(!re.test(form.username.value)) { 
        alert("Username must contain only letters, numbers and underscores. Please try again"); 
        form.username.focus();
        return false; 
    }
 
    // Check that the password is sufficiently long (min 6 chars)
    // The check is duplicated below, but this is included to give more
    // specific guidance to the user
    if (password.value.length < 6) {
        alert('Passwords must be at least 6 characters long.  Please try again');
        form.password.focus();
        return false;
    }
 
    // At least one number, one lowercase and one uppercase letter 
    // At least six characters 
 
    var re = /(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,}/; 
    if (!re.test(password.value)) {
        alert('Passwords must contain at least one number, one lowercase and one uppercase letter.  Please try again');
        form.password.value = "";
        form.password.focus();
		return false;
    }
 
    // Check password and confirmation are the same
    if (password.value != conf.value) {
        alert('Your password and confirmation do not match. Please try again');
		form.conf.value = '';
		form.conf.focus();
        return false;
    }
	
	st=/^0[1-9][0-9]{1, 3}/;
	if(!st.test(std.value)){
		alert("Invalid STD code");
		form.std.value = "";
		form.std.focus();
		return false;
	}
	
	ll=/^[1-9][0-9]{5, 7}/;
	if(!ll.test(lndline.value)){
		alert("Invalid Phone Number");
		form.lndline.value = "";
		form.lndline.focus();
		return false;
	}
	
	mb=/^[7-9][0-9]{9}/;
	if(!mb.test(mob.value)){
		alert("Invalid Mobile Number");
		form.mob.value = "";
		form.mob.focus();
		return false;
	}
	
	if(!st.test(fxcode.value)){
		alert("Invalid FAX number");
		form.fxcode.value = "";
		form.fxcode.focus();
		return false;
	}
	
	if(!ll.test(fax.value)){
		alert("Invalid FAX Number");
		form.fax.value = "";
		form.fax.focus();
		return false;
	}
	
	ci=/^[A-Za-z\s]+/;
	if(!ci.test(city.value)){
		alert("Invalid City Name");
		form.city.value = "";
		form.city.focus();
		return false;
	}
	
	pn=/^[0-9]{6}/;
	if(!pn.test(pin.value)){
		alert("Incorrect Pin Code");
		form.pin.value="";
		form.pin.focus();
		return false;
	}
 
    // Create a new element input, this will be our hashed password field. 
    var p = document.createElement("input");
 
    // Add the new element to our form. 
    form.appendChild(p);
    p.name = "p";
    p.type = "hidden";
    p.value = hex_sha512(password.value);
 
    // Make sure the plaintext password doesn't get sent. 
    password.value = "";
    conf.value = "";
 
    // Finally submit the form. 
    form.submit();
    return true;
}