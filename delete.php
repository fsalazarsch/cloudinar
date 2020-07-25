<?php

  require_once "../vendor/autoload.php";
  include './config/conneccion.php';
  $db = new Database();
  $conn = $db->connect();

  $sql = "SELECT cloudname, api_key, api_secret FROM config LIMIT 1";
  $result = $conn->query($sql);

  if ($result->num_rows == 1) 
    $row = $result->fetch_assoc();

  $options = ["invalidate" => true];
	
  \Cloudinary::config(
    array(
      "cloud_name" => $row["cloudname"],
      "api_key" => $row["api_key"],
      "api_secret" => $row["api_secret"]
    )
  );
  signature = sha1($payload_to_sign . $api_secret)


  try{
	$nombre= explode("/", $_POST["nombre"]);
  	$destroy = \Cloudinary\Uploader::destroy($nombre );
  	print_r($destroy);
	}
  catch (Throwable $t)
	{
   	print_r($t);
   	}





?>
