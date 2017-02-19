<?php

include("../helpers/conn.php");
//require("C:/xampp/htdocs/412/wwydh_first/wwydh/helpers/sendgrid-php/sendgrid-php");
// Was the form submitted?
if (isset($_POST["ForgotPassword"])) {
	
	// Harvest submitted e-mail address
	if (filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
		$email = $_POST["email"];
		
	}else{
		echo "email is not valid";
		exit;
	}

	// Check to see if a user exists with this e-mail
	$q = $conn->prepare("SELECT * FROM users WHERE email=?");
    $q->bind_param("s", $email);
	$q->execute();
	$result = $q->get_result();
	$userExists = $result->fetch_array(MYSQLI_ASSOC);
	$conn = null;
	
	if ($userExists["email"])
	{
		/*
		// Create a unique salt. This will never leave PHP unencrypted.
		$salt = "498#2D83B631%3800EBD!801600D*7E3CC13";

		// Create the unique user password reset key
		$password = hash('sha512', $salt.$userExists["email"]);

		// Create a url which we will direct them to reset their password
		$pwrurl = "http://wwydh-2017.herokuapp.com/login/reset_password.php?q=".$password;
		$headers =  'MIME-Version: 1.0' . "\r\n"; 
		$headers .= 'From: Your name <info@address.com>' . "\r\n";
		$headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";		// Mail them their key
		$mailbody = "Dear user,\n\nIf this e-mail does not apply to you please ignore it. It appears that you have requested a password reset at our website www.wwydh.com\n\nTo reset your password, please click the link below. If you cannot click it, please paste it into your web browser's address bar.\n\n" . $pwrurl . "\n\nThanks,\nThe Administration";
		mail("alecdavid95@comcast.net", "www.wwydh.com - Password Reset", $mailbody, $headers);
		echo "Your password recovery key has been sent to your e-mail address.";
		*/
		$from = new SendGrid\Email("Example User", "test@example.com");
		$subject = "Sending with SendGrid is Fun";
		$to = new SendGrid\Email("Example User", "alecdavid95@comcast.net");
		$content = new SendGrid\Content("text/plain", "and easy to do anywhere, even with PHP");
		$mail = new SendGrid\Mail($from, $subject, $to, $content);
		$apiKey = "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"
		$sg = new \SendGrid($apiKey);
		$response = $sg->client->mail()->send()->post($mail);
		echo $response->statusCode();
		echo $response->headers();
		echo $response->body();
	}
	else
		echo "No user with that e-mail address exists.";
}
?>
