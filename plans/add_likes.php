<?php
session_start();
if(!empty($_POST["id"])) {
require_once("dbcontroller.php");
$db_handle = new DBController();
	switch($_POST["action"]){
		case "like":
			$query = "INSERT INTO ipaddress_likes_map (ip_address,tutorial_id) VALUES ('" . $_SESSION['user']['id'] . "','" . $_POST["id"] . "')";
			$result = $db_handle->insertQuery($query);
			if(!empty($result)) {
				$query ="UPDATE plans SET likes = likes + 1 WHERE id='" . $_POST["id"] . "'";
				$result = $db_handle->updateQuery($query);				
			}			
		break;		
		case "unlike":
			$query = "DELETE FROM ipaddress_likes_map WHERE ip_address = '" . $_SESSION['user']['id'] . "' and tutorial_id = '" . $_POST["id"] . "'";
			$result = $db_handle->deleteQuery($query);
			if(!empty($result)) {
				$query ="UPDATE plans SET likes = likes - 1 WHERE id='" . $_POST["id"] . "' and likes > 0";
				$result = $db_handle->updateQuery($query);
			}
		break;		
	}
}
?>