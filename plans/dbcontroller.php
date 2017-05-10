<?php
class DBController {
	private $host = "mysql.winnerdigital.net";
	private $user = "wwydh";
	private $password = "foucheisbae";
	private $database = "wwydh";
	//private $conn = new mysqli("mysql.winnerdigital.net", "wwydh", "foucheisbae", "wwydh");
	//mysqli_select_db($database,$conn);
	function __construct() {
		$conn = $this->connectDB();
		if(!empty($conn)) {
			$this->selectDB($conn);
		}
	}
	
	function connectDB() {
		$conn = mysqli_connect($this->host,$this->user,$this->password);
		return $conn;
	}
	
	function selectDB($conn) {
		mysqli_select_db($this->database,$conn);
	}
	
	function runQuery($conn, $query) {
		$result = mysqli_query($conn, $query);
		while($row=mysqli_fetch_assoc($result)) {
			$resultset[] = $row;
		}		
		if(!empty($resultset))
			return $resultset;
	}
	
	function numRows($conn, $query) {
		$result  = mysqli_query($conn, $query);
		$rowcount = mysqli_num_rows($result);
		return $rowcount;	
	}
	
	function updateQuery($conn, $query) {
		$result = mysqli_query($conn, $query);
		if (!$result) {
			die('Invalid query: ' . mysqli_error());
		} else {
			return $result;
		}
	}
	
	function insertQuery($conn, $query) {
		$result = mysqli_query($conn, $query);
		if (!$result) {
			die('Invalid query: ' . mysqli_error());
		} else {
			return $result;
		}
	}
	
	function deleteQuery($conn, $query) {
		$result = mysqli_query($conn, $query);
		if (!$result) {
			die('Invalid query: ' . mysqli_error());
		} else {
			return $result;
		}
	}
}
?>