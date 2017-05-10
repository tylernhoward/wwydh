<?php
session_start();
include "../helpers/conn.php";
if(!empty($_POST["id"])) {
require_once("dbcontroller.php");
$db_handle = new DBController();
	switch($_POST["action"]){
		case "like":
			$query = "INSERT INTO projects_likes_map (ip_address,tutorial_id) VALUES ('" . $_SESSION['user']['id'] . "','" . $_POST["id"] . "')";
			$result = $db_handle->insertQuery($conn, $query);
			if(!empty($result)) {
				$query ="UPDATE project_test SET likes = likes + 1 WHERE id='" . $_POST["id"] . "'";
				$result = $db_handle->updateQuery($conn, $query);				
			}			
		break;		
		case "unlike":
			$query = "DELETE FROM projects_likes_map WHERE ip_address = '" . $_SESSION['user']['id'] . "' and tutorial_id = '" . $_POST["id"] . "'";
			$result = $db_handle->deleteQuery($conn, $query);
			if(!empty($result)) {
				$query ="UPDATE project_test SET likes = likes - 1 WHERE id='" . $_POST["id"] . "' and likes > 0";
				$result = $db_handle->updateQuery($conn, $query);
			}
		break;		
	}
}
?>