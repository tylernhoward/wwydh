<?php
<<<<<<< HEAD
<<<<<<< HEAD
define('DATA_FILE', 'data.json');

function save($data) {
	$encoded = json_encode($data);
	$fh = fopen(DATA_FILE, 'w') or die ("Can't open file");
	fwrite($fh, strip_tags($encoded));
	fclose($fh);
}

function load() {
	$fh = fopen(DATA_FILE, 'r');
	$data = fread($fh, filesize(DATA_FILE));
	print $data;
=======
=======
>>>>>>> Alec_Kanban_Test
include("../helpers/conn.php");
define('DATA_FILE', 'data.json');
/*
mysql_connect("mysql.winnerdigital.net", "wwydh", "foucheisbae")or die(mysql_error());
mysql_select_db("wwydh")or dise(mysql_error());
$q = "SELECT json FROM task_test WHERE project_id=1";
$result=mysql_query($q)or die(mysql_error());
$row = mysql_fetch_assoc($result);
print $row["json"];

$fh = fopen(DATA_FILE, 'r');
$data = fread($fh, filesize(DATA_FILE));
print $data;
*/
//session_name( 'kanban' );
//session_start();
//echo $_SESSION["projid"];
//$update_id = $_SESSION["projid"];
//echo $update_id;
// remove all session variables
//session_unset(); 
	// destroy the session 
//session_destroy();
function save($data) {
	//session_name( 'kanban' );
	//session_start();
	//$project_id = $_SESSION["projid"];
	$encoded = json_encode($data);	
	$fh = fopen(DATA_FILE, 'w') or die ("Can't open file");
	fwrite($fh, strip_tags($encoded));
	fclose($fh);
	$encoded = strip_tags($encoded);
	$title = $encoded['title'];
	$id = $encoded['id'];
	$responsible = $encoded['responsible'];
	$state = $encoded['state'];
	$color = $encoded['color'];
	include("../helpers/conn.php");
	include("temp.php");
	$q="UPDATE task_test set json = '$encoded', test_id = '$project_test_id' WHERE test_id = '$project_test_id'";
	//$q="UPDATE task_test set json = '$encoded' WHERE project_id=3";
	$result=mysqli_query($conn,$q)or die(mysqli_error($conn));
	// remove all session variables
	//session_unset(); 
	// destroy the session 
	//session_destroy();
}

function load() {
	/*
	$fh = fopen(DATA_FILE, 'r');
	$data = fread($fh, filesize(DATA_FILE));
	
	mysql_connect("mysql.winnerdigital.net", "wwydh", "foucheisbae")or die(mysql_error());
	mysql_select_db("wwydh")or die(mysql_error());
	*/
	include("../helpers/conn.php");
	include("temp.php");
	$q = "SELECT json FROM task_test WHERE test_id= '$project_test_id'";
	$result=mysqli_query($conn,$q)or die(mysqli_error($conn));
	$row = mysqli_fetch_assoc($result);
	print $row["json"];
<<<<<<< HEAD
>>>>>>> Alec_Kanban_Test
=======
>>>>>>> Alec_Kanban_Test
}

if (function_exists($_POST['action'])) {
	$actionVar = $_POST['action'];
	@$actionVar($_POST['data']);
}

?>