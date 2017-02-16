<!DOCTYPE html>
<html>
    <head>
        <title>WWYDH | Login</title>
        <link href="../helpers/header_footer.css" type="text/css" rel="stylesheet" />
        <link href="style.css" type="text/css" rel="stylesheet" />
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
        <script src="../helpers/globals.js" type="text/javascript"></script>
		<script type="text/JavaScript" src="check.js"></script>
	</head>
	<body>
		<div id="signin">
			<div class="title">Enter Email for Password Reset Email</div>
				<form action="change.php" method="POST">
				E-mail Address: <input type="text" name="email" size="20" /> 
				<input type="submit" name="ForgotPassword" value=" Request Reset " />
				</form>
			</div>
		</div>
		<div id="footer">
            <div class="grid-inner">
                &copy; Copyright WWYDH <?php echo date("Y") ?>
            </div>
        </div>
	</body>
</html>
