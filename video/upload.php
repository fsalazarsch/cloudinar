<?php

session_start();

if (isset($_SESSION["user_id"])){


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
    )
  );



  if($_SERVER['REQUEST_METHOD'] === 'POST'){
    if( isset($_POST['check']) &&  ($_POST['check'] == 1) ){

    $upload = \Cloudinary\Uploader::upload_large($_FILES['file']['tmp_name'], 
      array("folder" => $_POST['tipo'], 
        "public_id" => $_POST['nombre'], 
        "overwrite" => TRUE, 
        "invalidate" => TRUE,
        "resource_type" => "video", 
        "chunk_size" => 6000000,
        "raw_convert" => "google_speech:srt:vtt"
      ));
    }
    $upload = \Cloudinary\Uploader::upload_large($_FILES['file']['tmp_name'], 
      array("folder" => $_POST['tipo'], 
      	"public_id" => $_POST['nombre'], 
        "overwrite" => TRUE, 
      	"invalidate" => TRUE,
      	"resource_type" => "video", 
      	"chunk_size" => 6000000//,
        //"raw_convert" => "google_speech:srt:vtt"
        
      ));
    
  //$sql = "INSERT INTO video (nombre, tipo, secure_url) VALUES ( '".$_POST['nombre']."', '".$_POST['tipo']."', '".$upload['secure_url']."')";
  //echo $sql;
  $pid = explode("/", $upload['public_id']);

  $consulta = "INSERT INTO video (nombre, tipo, secure_url, ingles) VALUES (?,?,?,?)";
  $sentencia = $conn->prepare($consulta);

  $sentencia->bind_param("ssss", $pid[1], $_POST['tipo'], $upload['secure_url'], $_POST['check']);
  $sentencia->execute();



  header('Location: /cloud/video/listar.php');
  }
}
else
  header('Location: /cloud/index.php');

?>