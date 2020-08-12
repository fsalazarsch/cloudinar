<!DOCTYPE html>
<html>
<head>
  <title>Reproduciendo...</title>
</head>
<body>
<!--link rel="stylesheet" href="video.css"-->

<?php
	include "../resources/header.html";
	include '../config/conneccion.php';

	$db = new Database();
	$conn = $db->connect();

	if ($_POST){
		$consulta = "INSERT INTO lista (nombre, lista, user_id) VALUES (?,?,?)";
		$sentencia = $conn->prepare($consulta);
		$sentencia->bind_param("sss",$_POST['nombre'],$_POST['detlista'], $_POST['user_id']);
		$sentencia->execute();
		
		
		  header("Location: /cloud/lista/play.php?nombre=".$_POST['nombre']);

	}

session_start();

if (isset($_SESSION["user_id"])){

}
else
  header('Location: /cloud/index.php');

?>