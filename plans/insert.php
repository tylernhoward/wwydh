<?php
	session_start();
	include "../helpers/conn.php";
	$plan = $_GET["id"];
	$manager = $_SESSION["user"]["id"];
	echo "plan is $plan and manager is $manager";
	
	//add as a new porject in sql
	
	$q="INSERT INTO project_test(plan_id, manager_id) VALUES('$plan','$manager')";
	$result=mysqli_query($conn,$q)or die(mysqli_error($conn));
	
	//update plan as being publishded
	
	$updateq = "UPDATE plans SET published= 1 WHERE id = '$plan'";
	$result=mysqli_query($conn,$updateq)or die(mysqli_error($conn));
	
	//update user as manager
	
	$updateuser = "UPDATE users SET manager= '$plan' WHERE id = '$manager'";
	$result=mysqli_query($conn,$updateuser)or die(mysqli_error($conn));
	echo '<p><a href="../projects" target="_blank">Projects</a></p>';

  ?>
