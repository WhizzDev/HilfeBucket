<?php
include_once 'db_connect.php';
include_once 'psl-config.php';
 
$error_msg = "";
 
if (isset($_POST['org_name'], $_POST['email'], $_POST['p'])) {
    $org_name = filter_input(INPUT_POST, 'org_name', FILTER_SANITIZE_STRING);
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
    $password = filter_input(INPUT_POST, 'p', FILTER_SANITIZE_STRING);
    $std = filter_input(INPUT_POST, 'stdcode', FILTER_SANITIZE_STRING);
    $lndline = filter_input(INPUT_POST, 'lndline', FILTER_SANITIZE_STRING);
    $mob = filter_input(INPUT_POST, 'mob', FILTER_SANITIZE_STRING);
    $faxcode = filter_input(INPUT_POST, 'faxcode', FILTER_SANITIZE_STRING);
    $fax = filter_input(INPUT_POST, 'fax', FILTER_SANITIZE_STRING);
    $add = filter_input(INPUT_POST, 'add', FILTER_SANITIZE_STRING);
    $city = filter_input(INPUT_POST, 'city', FILTER_SANITIZE_STRING);
    $state = filter_input(INPUT_POST, 'state', FILTER_SANITIZE_STRING);
    $pin = filter_input(INPUT_POST, 'pin', FILTER_SANITIZE_STRING);
    $phno = $stdcode.$lndline;
	$faxno = $faxcode.$fax;
	
	if (strlen($password) != 128) {
        $error_msg .= '<p class="error">Invalid password configuration.</p>';
    }
 
    $prep_stmt = "SELECT id FROM ngo WHERE email = ? LIMIT 1";
    $stmt = $mysqli->prepare($prep_stmt);
 
   // check existing email  
    if ($stmt) {
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $stmt->store_result();
 
        if ($stmt->num_rows == 1) {
            $error_msg .= '<p class="error">A user with this email address already exists.</p>';
                        $stmt->close();
        }
                $stmt->close();
    } else {
        $error_msg .= '<p class="error">Database error Line 39</p>';
                $stmt->close();
    }
 
    if (empty($error_msg)) {
        $random_salt = hash('sha512', uniqid(mt_rand(1, mt_getrandmax()), true));
 
        $password = hash('sha512', $password . $random_salt);
 
        if ($insert_stmt = $mysqli->prepare("INSERT INTO ngo (id, org_name, email, password, salt, phno, mob, fax, add, city, state, pin) VALUES ('', ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)")) {
            $insert_stmt->bind_param('sssssssssss', $org_name, $email, $password, $random_salt, $phno, $mob, $faxno, $add, $city, $state, $pin);
            if (! $insert_stmt->execute()) {
                header('Location: ../error.php?err=Registration failure: INSERT');
            }
        }
        header('Location: ./register_success.php');
    }
}
?>