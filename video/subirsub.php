<?php

session_start();
include "../resources/header.html";
include "../resources/navbar.php";

if (isset($_SESSION["user_id"])){

//ini_set('display_errors', 1);
//ini_set('display_startup_errors', 1);
//error_reporting(E_ALL);

  require_once "../../vendor/autoload.php";
  include '../config/conneccion.php';

if($_POST){


  $dirsub = "../subs";
  $tmp_name = $_FILES["file"]["tmp_name"];
  $name = $_FILES["file"]["name"];
  move_uploaded_file($tmp_name, "$dirsub/$name"); 

  $rutasub = $dirsub."/".$name;

  $db = new Database();
  $conn = $db->connect();

  $sql = "UPDATE video SET subtitle= ? WHERE nombre like ?";
  


  $sentencia = $conn->prepare($sql);
  $sentencia->bind_param("ss", $rutasub, $_POST["nombre"] );
  $sentencia->execute();

  header('Location: /cloud/video/listar.php');

}

echo "<body>";


  echo '<div class="container">';
  echo '<form enctype="multipart/form-data"  method="POST" action="subirsub.php?">';
  echo '<div class="md-form">';
  echo 'Archivo';
  echo '<input id="upload-img" type="file" name="file" class="form-control"  style="color: white">';
  echo '</div>';
  echo '<input id="nombre" type="hidden" name="nombre" value="'.$_GET['nombre'].'" class="form-control" required="true">';
  echo '<button id="submitButton" type="submit" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Subir video</button>
    </form>
  </div>';

echo "</body>";
include "../resources/footer.php";

}
else
  header('Location: /cloud/index.php');

?>



