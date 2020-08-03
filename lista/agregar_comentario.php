<?php

include '../config/conneccion.php';

$flag = false;

$db = new Database();
$conn = $db->connect();
	
	//print_r($_POST);
	
	if ($_POST["id_padre"] != ""){

		$sql = "INSERT INTO comments(descripcion, lista_id, user_id, comment_father_id) VALUES (?,?,?,?)";
		$sentencia = $conn->prepare($sql);
		$sentencia->bind_param("siii", $_POST["comment"], $_POST["id_lista"], $_POST["user_id"], $_POST["id_padre"] );
  		$sentencia->execute();
  	}
  	else{
		$sql = "INSERT INTO comments(descripcion, lista_id, user_id) VALUES (?,?,?)";
		$sentencia = $conn->prepare($sql);
		$sentencia->bind_param("sii", $_POST["comment"], $_POST["id_lista"], $_POST["user_id"]);
  		$sentencia->execute();

  	}
	

?>