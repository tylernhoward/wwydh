<?php
	include("../helpers/conn.php");
	$project_id = $_GET['id'];
	// echo $project_id;
	session_name( 'kanban' );
	session_start();
	$_SESSION["projid"] = $project_id;
	// echo $_SESSION["projid"];
	$q = $conn->prepare("SELECT * FROM task_test WHERE test_id=?");
        $q->bind_param("s", $project_id);
        $q->execute();
        $result = $q->get_result();
//if there is no tasks for this project yet create default board
        if ($result->num_rows == 0) {
			$json = '{\"1488496527306\":{\"title\":\"New project\",\"id\":\"1488496527306\",\"responsible\":\"Unassigned\",\"state\":\"B\",\"color\":\"0\"}}';
            $q="INSERT INTO task_test(json, project_id, test_id) VALUES('$json', 0,'$project_id')";
			$result=mysqli_query($conn,$q)or die(mysqli_error($conn));
        }
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="refresh" content="3; url=https://wwydh-2017.herokuapp.com/lwkanban/nonmanager.php" /> <!-- hardcoded for now -->
		<title>WWYDH Project Manager</title>
	</head>
	<body>
	<a href="../lwkanban/nonmanager.php">Your browser will redirect you to Task Board view in 3 seconds. If it does not then click this.</a>
	</body>
</html>
