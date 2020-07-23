<!DOCTYPE html>
<html>
<head>
  <title>Ver videos</title>
</head>
<body>
<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

  require_once "../vendor/autoload.php";

  include './config/conneccion.php';

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

  //\Cloudinary\Uploader::upload_large("dog.mp4");
  if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $upload = \Cloudinary\Uploader::upload_large($_FILES['file']['tmp_name'], 
      array("folder" => $_POST['tipo'], 
      	"public_id" => $_POST['nombre'], 
        "overwrite" => TRUE, 
      	"invalidate" => TRUE,
      	"resource_type" => "video", 
      	"chunk_size" => 6000000,
        "raw_convert" => "google_speech:es-CL"
        
      ));

  //$sql = "INSERT INTO video (nombre, tipo, secure_url) VALUES ( '".$_POST['nombre']."', '".$_POST['tipo']."', '".$upload['secure_url']."')";
  //echo $sql;
  $pid = explode("/", $upload['public_id']);

  $consulta = "INSERT INTO video (nombre, tipo, secure_url) VALUES (?,?,?)";
  $sentencia = $conn->prepare($consulta);

  $sentencia->bind_param("sss", $pid[1], $_POST['tipo'], $upload['secure_url']);
  $sentencia->execute();



  //$conn->exec($sql);

  }

  include "./config/header.html"

?>
  <br/>
  <div class="container p-3 my-3 bg-primary text-white">
    Ver Lista de Videos
  </div>
  <div class="container">
  <kbd>Para ver un video pulse sobre el nombre del video</kbd><hr>

  <?php
    $api = new \Cloudinary\Api();
    $results = $api->resources(array("resource_type" => "video", "max_results" => 30));
    echo '<div class="list-group">';
    echo '<h3>Publicidad</h3>';

    foreach ($results["resources"] as $value) {
      if (strpos($value["public_id"], 'publicidad') !== false) {
        echo "<a href='".$value["secure_url"]."' class='list-group-item list-group-item-action'>".str_replace("publicidad/", "", $value["public_id"])."</a>";
      }
    }

    echo '</div><br><div class="list-group"><h3>Contenido</h3>';


    foreach ($results["resources"] as $value) {
      if (strpos($value["public_id"], 'contenido') !== false) {
        echo "<a href='".$value["secure_url"]."'  class='list-group-item list-group-item-action'>".str_replace("contenido/", "", $value["public_id"])."</a>";
      }
    }

    echo '</div><br><div class="list-group"><h3>Material</h3>';

    foreach ($results["resources"] as $value) {
      if (strpos($value["public_id"], 'material') !== false) {
        echo "<a href='".$value["secure_url"]."' class='list-group-item list-group-item-action'>".str_replace("material/", "", $value["public_id"])."</a><br>";
      }
    }
?>
</div>

<a href="index.php">Ir al inicio</a>
