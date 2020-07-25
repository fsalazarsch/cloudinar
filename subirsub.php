<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

  require_once "../vendor/autoload.php";

  include './config/conneccion.php';

if($_POST){

  $db = new Database();
  $conn = $db->connect();

  $sql = "UPDATE video SET subtitle= ? WHERE nombre like ?";
  echo $sql;
  
  $sentencia = $conn->prepare($sql);
  $sentencia->bind_param("ss", $_FILES['file']['name'], $_POST["nombre"] );
  $sentencia->execute();

  header('Location: /cloud/upload.php');

}
  include "./config/header.html";


  echo '<div class="container">';
  echo '<form enctype="multipart/form-data"  method="POST" action="subirsub.php?">';
  echo '<div class="form-group">';
  echo '<label for="file">Archivo</label>';
  echo '<input id="upload-img" type="file" name="file" class="form-control">';
  echo '</div>';
  echo '<input id="nombre" type="hidden" name="nombre" value="'.$_GET['nombre'].'" class="form-control" required="true">';
  echo '<button id="submitButton" type="submit" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Subir video</button>
    </form>
  </div>';

?>



