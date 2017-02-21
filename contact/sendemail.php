
<?php
require("../helpers/sendgrid-php/sendgrid-php/sendgrid-php.php");

/*
$sendgrid = new SendGrid(getenv('SENDGRID_API_KEY');
$email    = new SendGrid\Email();

$email->addTo("wwydhContact@gmail.com")
      ->setFrom($_POST['email'])
      ->setSubject($_POST['name'])
      ->setHtml($_POST['message']);

$sendgrid->send($email);

echo "Thank you, message sent";
wait(5);
header("Location: ../home/index.php");
*/

if (isset($_POST["submit"])) {

	// Harvest submitted e-mail address
	if (filter_var($_POST["email"], FILTER_VALIDATE_EMAIL)) {
		$email = $_POST["email"];

	}else{
		echo "email is not valid";
		exit;
	}

		$from = new SendGrid\Email($_POST["name"], $_POST["email"]);
		$subject = "Contact from user: " . $POST_["name"] . "";
		$to = new SendGrid\Email("Example User", $userExists["email"]);
		$content = new SendGrid\Content($POST_["message"]);
		$mail = new SendGrid\Mail($from, $subject, $to, $content);
		$apiKey = getenv('SENDGRID_API_KEY');
		$sg = new \SendGrid($apiKey);
		$response = $sg->client->mail()->send()->post($mail);

		echo "Thank you for contacting the team at WWYDH. \n\n We will get back to you shortly.";
    wait(5);
    header("Location: ../home/index.php");

}
?>
