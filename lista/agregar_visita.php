<?php

  require_once "../../vendor/autoload.php";
  include '../config/conneccion.php';


  $db = new Database();
  $conn = $db->connect();
	$sql = "UPDATE lista set vistas = vistas + 1 WHERE nombre like ?";
	$sentencia = $conn->prepare($sql);
  	$sentencia->bind_param("s", $_POST["nombre"] );
  	$sentencia->execute();


?>