<?php

include '../config/conneccion.php';

$flag = false;

$db = new Database();
$conn = $db->connect();
	
	//print_r($_POST);

		$sql = "INSERT INTO chat(msg, lista_id, user_id) VALUES (?,?,?)";
		$sentencia = $conn->prepare($sql);
		$sentencia->bind_param("sii", $_POST["msg"], $_POST["id_lista"], $_POST["user_id"]);
  		$sentencia->execute();

  	
	

?>