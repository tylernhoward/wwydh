<?php

include("../helpers/conn.php");
require("../helpers/sendgrid-php/sendgrid-php/sendgrid-php.php");
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
		
		// Create a unique salt. This will never leave PHP unencrypted.
		$salt = "498#2D83B631%3800EBD!801600D*7E3CC13";

		// Create the unique user password reset key
		$password = hash('sha512', $salt.$userExists["email"]);

		// Create a url which we will direct them to reset their password
		$pwrurl = "http://wwydh-2017.herokuapp.com/login/reset_password.php?q=".$password;
		
		$from = new SendGrid\Email("WWYDH", "test@example.com");
		$subject = "Password Reset";
		$to = new SendGrid\Email("Example User", $userExists["email"]);
		$content = new SendGrid\Content("text/plain", "Dear user,\n\nIf this e-mail does not apply to you please ignore it. It appears that you have requested a password reset at our website www.wwydh.com\n\nTo reset your password, please click the link below. If you cannot click it, please paste it into your web browser's address bar.\n\n" . $pwrurl . "\n\nThanks,\nThe Administration");
		$mail = new SendGrid\Mail($from, $subject, $to, $content);
		$apiKey = getenv('SENDGRID_API_KEY');
		$sg = new \SendGrid($apiKey);
		$response = $sg->client->mail()->send()->post($mail);
		//echo $response->statusCode();
		//echo $response->headers();
		//echo $response->body();
		echo "Your password recovery key has been sent to your e-mail address.";
	}
	else{
		echo "No user with that e-mail address exists.";
		
	}
}
?>
