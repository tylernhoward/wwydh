<?php
require("../helpers/sendgrid-php/sendgrid-php/sendgrid-php.php");

if (isset($_POST["submit"])) {

	$email = $_POST["email"];

	$name=$_POST["name"];
	$message=$_POST["message"];
		
		$from = new SendGrid\Email("WWYDH", $email);
		$subject = "WE Received your Email";
		$to = new SendGrid\Email("Example User", "wwydh2017@gmail.com");
		$content = new SendGrid\Content("text/plain", "You recieved message from " . $name . " It Says: " .$message);
		$mail = new SendGrid\Mail($from, $subject, $to, $content);
		$apiKey = getenv('SENDGRID_API_KEY');
		$sg = new \SendGrid($apiKey);
		$response = $sg->client->mail()->send()->post($mail);
		//echo $response->statusCode();
		//echo $response->headers();
		//echo $response->body();
		echo "Your email has been sent to your e-mail address.";
		$link = "../home/index.php";
		$here = "Return to home";
		Echo "<a href=$link>$here</a>";
}
?>
