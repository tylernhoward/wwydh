<?php echo '
<link href="../helpers/header_footer.css" type="text/css" rel="stylesheet" />
<link href="style.css" type="text/css" rel="stylesheet" />
<form action="reset.php" method="POST">
E-mail Address: <input type="text" name="email" size="20" /><br />
New Password: <input type="password" name="password" size="20" /><br />
Confirm Password: <input type="password" name="confirmpassword" size="20" /><br />
<input type="hidden" name="q" value="';
if (isset($_GET["q"])) {
	echo $_GET["q"];
}
	echo '" /><input type="submit" name="ResetPasswordForm" value=" Reset Password " />
</form>';

?>