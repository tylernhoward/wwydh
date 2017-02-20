<?php

include("../helpers/conn.php");
// Was the form submitted?
if (isset($_POST["ResetPasswordForm"]))
{
	// Gather the post data
	$email = $_POST["email"];
	$password = md5($_POST["password"]);
	$confirmpassword = md5($_POST["confirmpassword"]);
	$hash = $_POST["q"];

	// Use the same salt from the forgot_password.php file
	$salt = "498#2D83B631%3800EBD!801600D*7E3CC13";

	// Generate the reset key
	$resetkey = hash('sha512', $salt.$email);

	// Does the new reset key match the old one?
	if ($resetkey == $hash)
	{
		if ($password == $confirmpassword)
		{

			// Update the user's password
			$q = $conn->prepare("UPDATE users SET login =? WHERE email =?");
			$q->bind_param("ss", $password, $email);
			$q->execute();
			$result = $q->get_result();
			echo "Your password has been successfully reset.";
		}
		else
			echo "Your password's do not match.";
	}
    else
		//echo "Your password reset key is invalid.";
}
else
	echo "Form error";

?>
