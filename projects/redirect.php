<?php
	$project_id = $_GET['id'];
	echo $project_id;
	session_name( 'kanban' );
	session_start();
	$_SESSION["projid"] = $project_id;
	echo $_SESSION["projid"];

	
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8" />
		<title>WWYDH Project Manager</title>
	</head>
	<body>
	<a href="../lwkanban">Tasks</a>
	</body>
</html>