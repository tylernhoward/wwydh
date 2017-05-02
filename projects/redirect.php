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

        if ($result->num_rows == 0) {
			$jsonq = "SELECT json FROM json_sample WHERE id= 1";
			$jsonresult=mysqli_query($conn,$jsonq)or die(mysqli_error($conn));
			$jsonrow = mysqli_fetch_assoc($result);
			$j = $jsonrow["json"];
			echo $jsonrow["json"];
            $q="INSERT INTO task_test(json, project_id, test_id) VALUES('$j', 0,'$project_id')";
			$result=mysqli_query($conn,$q)or die(mysqli_error($conn));
        }
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8" />
		<meta http-equiv="refresh" content="3; url=https://wwydh-2017.herokuapp.com/lwkanban/" /> <!-- hardcoded for now -->
		<title>WWYDH Project Manager</title>
	</head>
	<body>
	<a href="../lwkanban">Your browser will redirect you to Project Manager view in 3 seconds. If it does not then click this.</a>
	</body>
</html>
