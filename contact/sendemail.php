<?php
require("../helpers/sendgrid-php/sendgrid-php/sendgrid-php.php");

if (isset($_POST["submit"])) {

	// Harvest submitted e-mail address
	if (filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
		$email = $_POST["email"];

	}else{
		echo "email is not valid";
		exit;
	}


			$name=$POST_["name"];
			$message=$POST_["message"];

			$apiKey = getenv('SENDGRID_API_KEY');
			$sg = new SendGrid($apiKey);

			$mail = new SendGrid\Email();
			$mail
			->addTo('wwydh2017@gmail.com')
			->setFrom($email)
			->setSubject($name)
			->setText($message);


			$sg->send($mail);

			echo "Thank you for contacting the team at WWYDH. \n\n We will get back to you shortly.";



}
?>
