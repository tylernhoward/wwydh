<?php
require("../helpers/sendgrid-php/sendgrid-php/sendgrid-php.php");

echo "1";
	// Harvest submitted e-mail address
	if (filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
		$email = $_POST["email"];

	}else{
		echo "email is not valid";
		exit;
	}
echo "2";

		$from = new SendGrid\Email($_POST["name"], $_POST["email"]);
		$subject = "Contact from user: " . $POST_["name"] . "";
		$to = new SendGrid\Email("WWYDH", "wwydh2017@gmail.com);
		$content = new SendGrid\Content($POST_["message"]);
		$mail = new SendGrid\Mail($from, $subject, $to, $content);
		$apiKey = getenv('SENDGRID_API_KEY');
		$sg = new \SendGrid($apiKey);
		echo "3"
		$response = $sg->client->mail()->send()->post($mail);
		
		echo "Thank you for contacting the team at WWYDH. \n\n We will get back to you shortly.";
    wait(1);
    header("Location: ../home/index.php");

?>
