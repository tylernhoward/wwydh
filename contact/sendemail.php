
<?php
require("../helpers/sendgrid-php/sendgrid-php/sendgrid-php.php");
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
?>
