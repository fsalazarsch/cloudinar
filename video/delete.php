<?php

	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);

	require_once "../../vendor/autoload.php";
	include '../config/conneccion.php';

	$db = new Database();
	$conn = $db->connect();

	$sql = "SELECT cloudname, api_key, api_secret FROM config LIMIT 1";
	$result = $conn->query($sql);
	if ($result->num_rows == 1) 
		$row = $result->fetch_assoc();


	\Cloudinary::config(
	  	array(
			"cloud_name" => $row["cloudname"],
			"api_key" => $row["api_key"],
			"api_secret" => $row["api_secret"]
	    ));

	$param = ",".$_POST["nombre"];

	//Quitar de la lista de videos
	$sql = "DELETE FROM lista WHERE lista LIKE ?";
	$sentencia = $conn->prepare($sql);
	$sentencia->bind_param("s", $param );
	$sentencia->execute();


	$sql = "UPDATE lista SET lista= REPLACE(lista, ?, '')";
	$sentencia = $conn->prepare($sql);
	$sentencia->bind_param("s", $param );
	$sentencia->execute();

	//quitar de videos

	$sql = "DELETE FROM video WHERE nombre LIKE ?";
	$sentencia = $conn->prepare($sql);
	$sentencia->bind_param("s", $_POST["nombre"] );
	$sentencia->execute();

	//eliminar de cloudinary
	$delete = \Cloudinary\Uploader::destroy($_POST["tipo"].'/'.$_POST["nombre"], array( "resource_type" => "video"));
	//print_r($delete);

?>