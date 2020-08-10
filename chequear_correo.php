<?php
	include './config/conneccion.php';	


ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

	$db = new Database();
	$conn = $db->connect();
	
	$sql = "SELECT user_email FROM users WHERE user_email LIKE '".$_POST['email']."' LIMIT 1";
	
	$result = $conn->query($sql);  


	echo $result->num_rows;




 ?>