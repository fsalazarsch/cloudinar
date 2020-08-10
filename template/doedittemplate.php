<?php
	include '../config/conneccion.php';

	$db = new Database();
	$conn = $db->connect();


	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);

	$db = new Database();
	$conn = $db->connect();
	
	$sql = "UPDATE template SET cuerpo = ? WHERE id= ?";


	$sentencia = $conn->prepare($sql);
  	$sentencia->bind_param("si",$_POST['cuerpo'],$_POST['id']);
  	$sentencia->execute();

	header("Location: /cloud/template/ver.php");

 ?>