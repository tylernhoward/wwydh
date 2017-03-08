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
		<meta http-equiv="refresh" content="3; url=https://wwydh-2017.herokuapp.com/lwkanban/" /> //hardcoded for now
		<title>WWYDH Project Manager</title>
	</head>
	<body>
	<a href="../lwkanban">Your browser will redirect you to Project Manager view in 3 seconds. If it does not then click this.</a>
	</body>
</html>
