<?php
session_start();


$_SESSION["errorMessage"] = "";
$error = false;

//Get Form Data - Get the To field, sanitize, and validate
 if(!empty($_POST["ToField"]))
 {
	 $toField	=$_POST["ToField"];
	 //the FILTER_SANITIZE_EMAIL filter removes all illegal email characters from a string
	 //the filter allows all letters, numbers, and $-_.+!*'{}~[]#%/?@&=
	 $toSanitized = filter_var($toField, FILTER_SANITIZE_EMAIL);
	 // filter validate email filter validates value as an email address.
	 if(!filter_var($toSanitized, FILTER_VALIDATE_EMAIL))
	 {	//Email is not a valid email address
	 $error = true;
	 }
 }
 else
 {
	 $error = true;
 }
 
 //get the from field, santize and validate
 if(!empty($_POST["FromField"]))
 {
	 $fromField = $_POST["FromField"];
	 //the FILTER_SANITIZE_EMAIL filter removes all illegal email characters from a string
	 //the filter allows all letters, numbers, and $-_.+!*'{}~[]#%/?@&=
	 $fromSanitized = filter_var($fromField, FILTER_SANITIZE_EMAIL);
	 // filter validate email filter validates value as an email address.
	 if(!filter_var($fromSanitized, FILTER_VALIDATE_EMAIL))
	 {
		 //email is not a valid email address
		 $error = true;
	 }
 }
 else
 {
	 $error = true;
 }
 

//Get the subject
if(!empty($_POST["Subject"]))
	$subject   = $_POST["Subject"];
else
	$error = true;

//Get the message body
if(!empty($_POST["Body"]))
	$body      = $_POST["Body"];
else
	$error = true;

//Redirect based on whether there was an error
if($error)
{
	//set the error message
	$_SESSION["errorMessage"] = "There was an error sending your mail";
	//redirect to email page to display the error
	header("Location:email.php");
	exit;
}
else
{
	//set the from filed for use with the mail function
	//if you know the persons name:
	// from: Caytlyn A. Trickey <ctrickey@purdue.edu>" Like:
	// $headers = "from: Caytlyn Trickey <".$fromField.">";
	$headers = "From: ".$fromField;
	//send the email
	if(!mail($toField, $subject, $body, $headers))
		echo "There was an error sending your email.";
	//Redirect to Email confirmation page
	header("Location: emailConfirm.php");
	exit;
}





?>
