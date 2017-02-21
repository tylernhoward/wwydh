<?php
require("../helpers/sendgrid-php/sendgrid-php/sendgrid-php.php");

if (isset($_POST["submit"])) {

	$email = $_POST["email"];

	$name=$_POST["name"];
	$message=$_POST["message"];
		
		$from = new SendGrid\Email($name, $email);
		$subject = "(WWYDH) Contact Message from $name";
		$to = new SendGrid\Email("WWYDH", "wwydh2017@gmail.com");
		$content = new SendGrid\Content("text/plain", "Recieved message from " . $name . " It Says: \n" .$message);
		$mail = new SendGrid\Mail($from, $subject, $to, $content);
		$apiKey = getenv('SENDGRID_API_KEY');
		$sg = new \SendGrid($apiKey);
		$response = $sg->client->mail()->send()->post($mail);
		//echo $response->statusCode();
		//echo $response->headers();
		//echo $response->body();
		echo "Thank you for contacting the team at WWYDH. \n\n We will get back to you shortly.\n";
		$link = "../home/index.php";
		$here = "Return to home";
		Echo "<a href=$link>$here</a>";
}
?>
