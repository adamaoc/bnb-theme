<?php

function contact_email($email, $subject, $message, $auth){
	// mail(string to, string subject, string message [, string additional_headers [, string additional_parameters]]);
	$email = htmlentities($email);
	$subject = htmlentities($subject);
	$message = htmlentities($message);
	$auth = htmlentities($auth);
	
	$innerSubject = 'from txGarage'.$subject;
	$innerMessage = $email. "\r\n".$message; 
	$headers = 'From: laurenmanry@dfwbelliesandbabies.com';
	
	mail('laurenmanry@dfwbelliesandbabies.com', $innerSubject, $innerMessage, $headers);
	$submitted = 1; 
	
	header("Location: /?submitted=1&#contact");
	die();
	
}


?>