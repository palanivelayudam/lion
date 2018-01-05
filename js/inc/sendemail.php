<?php
# request sent using HTTP_X_REQUESTED_WITH
if( isset( $_SERVER['HTTP_X_REQUESTED_WITH'] ) ){
	if (isset($_POST['name']) AND isset($_POST['email']) AND isset($_POST['message'])) {
	
	
	$to = 'example@webmail.com';  // Change it by your email address
   
   
   
    $subject='The Lion Support Contact From ';
	
	
	
	$name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
	$email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $phone = $_POST['phone'];
    $message = filter_var($_POST['message'], FILTER_SANITIZE_STRING);
    if(!empty($phone)) $message="Phone: ".$phone.'<br /><br />'.$message;
		$sent = email($to, $email, $name, $subject, $message);
		if ($sent) {
			echo '<div class="content-message"><i class="fa fa-rocket"></i> Email Sent Successfully</div>';
		} else {
			echo "<div class='content-message'><i class='fa fa-times'></i> An error has occured. Please try later.</div>";
		}
	}
	else {
		echo 'All Fields are required';
	}
	return;
}
