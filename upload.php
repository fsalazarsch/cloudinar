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

  $sentencia->bind_param("ssss", $pid[1], $_POST['tipo'], $upload['secure_url'], $_POST['ingles']);
  $sentencia->execute();



  //$conn->exec($sql);

  }

  include "./config/header.html";

?>
  <br/>
  <div class="container p-3 my-3 bg-primary text-white">
    Ver Lista de Videos
  </div>
  <div class="container">
  <kbd>Para ver un video pulse sobre el nombre del video</kbd><hr>

  <?php
    //$api = new \Cloudinary\Api();
    //$results = $api->resources(array("resource_type" => "video", "max_results" => 30));
    
    $sql = "SELECT secure_url, nombre, ingles, subtitle FROM video where tipo like 'publicidad'";
    $result = $conn->query($sql);
    
    echo '<div class="list-group">';
    echo '<h3>Publicidad</h3>';
    while ( $value = $result->fetch_assoc()) {
      echo "<a href='".$value["secure_url"]."' class='list-group-item list-group-item-action'>".str_replace("publicidad/", "", $value["nombre"])."</a>";
        echo "<div><a  href='play.php?nombre=".str_replace("publicidad/", "", $value["nombre"])."' class='btn btn-primary'>Ver</a>";
        if ($value["ingles"] == 1){
            echo "<a href='https://res.cloudinary.com/enmateria-specs/raw/upload/publicidad/".$value["nombre"].".vtt' download target='_blank' class='btn btn-primary' style='margin-left: 5px;'>Ver Subt generado</a>";
          
          echo "<a  href='subirsub.php?nombre=".$value["nombre"]."' class='btn bt-primary'  style='margin-left: 5px;'>Subir subtitulo</a></div>";
          }
        }

    echo '</div><br><div class="list-group"><h3>Contenido</h3>';


    $sql = "SELECT secure_url, nombre, ingles, subtitle FROM video where tipo like 'contenido'";
    $result = $conn->query($sql);
    while ( $value = $result->fetch_assoc()) {    
        echo "<a href='".$value["secure_url"]."'  class='list-group-item list-group-item-action'>".str_replace("contenido/", "", $value["nombre"])."</a>";
        echo "<div><a  href='play.php?nombre=".str_replace("contenido/", "", $value["nombre"])."' class='btn btn-primary'>Ver</a>";
        if ($value["ingles"] == 1){
          if (isset($value["subtitle"])){
            echo "<a href='".$value["subtitle"]."' download target='_blank' class='btn btn-primary' style='margin-left: 5px;'>Ver Subt generado</a>";
          }       
          else{
            echo "<a href='https://res.cloudinary.com/enmateria-specs/raw/upload/contenido/".$value["nombre"].".vtt' download target='_blank' class='btn btn-primary'  style='margin-left: 5px;'>Ver Subt generado</a>";
          }
        echo "<a  href='subirsub.php?nombre=".$value["nombre"]."' class='btn btn-primary' style='margin-left: 5px;'>Subir subtitulo</a>";
        }
        echo "</div>";

    }

    echo '</div><br><div class="list-group"><h3>Material</h3>';

    $sql = "SELECT secure_url, nombre, ingles, subtitle FROM video where tipo like 'material'";
    $result = $conn->query($sql);
    while ( $value = $result->fetch_assoc()) {    
        echo "<a href='".$value["secure_url"]."' class='list-group-item list-group-item-action'>".str_replace("material/", "", $value["nombre"])."</a>";
        echo "<div><a  href='play.php?nombre=".str_replace("material/", "", $value["nombre"])."' class='btn btn-primary'>Ver</a>";
        if ($value["ingles"] == 1){
          if (isset($value["subtitle"])){
            echo "<a href='".$value["subtitle"]."' download target='_blank' class='btn btn-primary' style='margin-left: 5px;'>Ver Subt generado</a>";
          }       
          else{
            echo "<a href='https://res.cloudinary.com/enmateria-specs/raw/upload/material/".$value["nombre"].".vtt' download target='_blank' class='btn btn-primary'  =style='margin-left: 5px;'>Ver Subt generado</a>";
          }
        echo "<a  href='subirsub.php?nombre=".$value["nombre"]."'class='btn btn-primary'  style='margin-left: 5px;'>Subir subtitulo</a>";

        }

    }
?>
</div>
<hr>

<h4><a href="index.php">Ir al inicio</a></h4><br>
<script type="text/javascript">
function borrar(name) {
   // name = name.split("/");
      $.ajax({
           type: "POST",
           url: 'delete.php',
           data:  'nombre='+name,
           success:function(html) {
            console.log(html);
            //location.reload();
           }

      });
 }
</script>