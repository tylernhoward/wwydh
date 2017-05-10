<?php
require("../helpers/sendgrid-php/sendgrid-php/sendgrid-php.php");

if (isset($_POST["submit"])) {

	$email = $_POST["email"];

<<<<<<< HEAD
<<<<<<< HEAD
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
=======
	$name=$_POST["name"];
	$message=$_POST["message"];
		
		$from = new SendGrid\Email($name, $email);
		$subject = "(WWYDH) Contact Message from $name";
		$to = new SendGrid\Email("WWYDH", "wwydh2017@gmail.com");
		$content = new SendGrid\Content("text/plain", "Recieved message from " . $name . " It Says: \n" .$message);
=======
	$name=$_POST["name"];
	$message=$_POST["message"];
		
		$from = new SendGrid\Email("WWYDH", $email);
		$subject = "WE Received your Email";
		$to = new SendGrid\Email("Example User", "wwydh2017@gmail.com");
		$content = new SendGrid\Content("text/plain", $message);
>>>>>>> Alec_Kanban_Test
		$mail = new SendGrid\Mail($from, $subject, $to, $content);
		$apiKey = getenv('SENDGRID_API_KEY');
		$sg = new \SendGrid($apiKey);
		$response = $sg->client->mail()->send()->post($mail);
<<<<<<< HEAD
		//echo $response->statusCode();
		//echo $response->headers();
		//echo $response->body();
		echo "Thank you for contacting the team at WWYDH. \n\n We will get back to you shortly.\n";
		$link = "../home/index.php";
		$here = "Return to home";
		Echo "<a href=$link>$here</a>";
>>>>>>> master
=======
		echo $response->statusCode();
		echo $response->headers();
		echo $response->body();
		echo "Your email has been sent to your e-mail address.";
>>>>>>> Alec_Kanban_Test
}
?>
