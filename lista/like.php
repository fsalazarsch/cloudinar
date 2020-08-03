<?php

include '../config/conneccion.php';

$flag = false;

$db = new Database();
$conn = $db->connect();

$sql = "SELECT user_id, comment_id, voto FROM votes WHERE comment_id = ".$_POST["comment_id"]." AND user_id = ".$_POST["user_id"];
$result = $conn->query($sql);  
if ($result->num_rows == 1){

	echo $result->fetch_assoc()["voto"];

	if ($result->fetch_assoc()["voto"] == $_POST["cantidad"])
		$flag = true;


	$sql = "UPDATE votes SET voto = ? WHERE comment_id = ? AND user_id = ?";

	$sentencia = $conn->prepare($sql);
  	$sentencia->bind_param("sss", $_POST["cantidad"], $_POST["comment_id"], $_POST["user_id"] );


}
else{
	$sql = "INSERT INTO votes(user_id, comment_id, voto) VALUES (?,?,?)";
	
	$sentencia = $conn->prepare($sql);
  	$sentencia->bind_param("sss", $_POST["user_id"], $_POST["comment_id"], $_POST["cantidad"]);

}
  	$sentencia->execute();


		$sql = "UPDATE comments SET votes = (SELECT SUM(voto) FROM votes where comment_id = ?) WHERE comment_id = ?";
		$sentencia = $conn->prepare($sql);
	  	$sentencia->bind_param("ss", $_POST["comment_id"], $_POST["comment_id"] );
  		$sentencia->execute();




?>