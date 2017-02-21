<?php
require("../helpers/sendgrid-php/sendgrid-php/sendgrid-php.php");

if (isset($_POST["submit"])) {

	// Harvest submitted e-mail address
	if (filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
		$email = $_POST["email"];


		$name=$POST_["name"];
		$message=$POST_["message"];

		$from = new SendGrid\Email($name, $email);
		$subject = "Contact from user";
		$to = new SendGrid\Email("WWYDH", "wwydh2017@gmail.com"]);
		$content = new SendGrid\Content($message);
		$mail = new SendGrid\Mail($from, $subject, $to, $content);
		$apiKey = getenv('SENDGRID_API_KEY');
		$sg = new \SendGrid($apiKey);
		$response = $sg->client->mail()->send()->post($mail);

		echo "Thank you for contacting the team at WWYDH. \n\n We will get back to you shortly.";


	}else{
		echo "email is not valid";
		exit;
	}
}
?>
