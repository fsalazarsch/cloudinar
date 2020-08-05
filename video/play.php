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


  $sql = "SELECT  nombre, tipo, secure_url, subtitle, ingles FROM video WHERE nombre like '".$_GET["nombre"]."' LIMIT 1";
  $result = $conn->query($sql);

  $row = $result->fetch_assoc();

  $subt = "";

  if ($row["ingles"] == 1){
    if (is_null($row["subtitle"]))
      $subt = "https://res.cloudinary.com/enmateria-specs/raw/upload/".$row["tipo"]."/".$row["nombre"].".vtt";
    else
      $subt = $row["subtitle"];
  }
  

?>
  <link href="https://unpkg.com/cloudinary-video-player@1.4.0/dist/cld-video-player.min.css" rel="stylesheet">
  <script src="https://unpkg.com/cloudinary-core@2.8.2/cloudinary-core-shrinkwrap.min.js" type="text/javascript"></script>
  <script src="https://unpkg.com/cloudinary-video-player@1.4.0/dist/cld-video-player.min.js" 
    type="text/javascript"></script>

  <?php
  echo cl_video_tag($row["secure_url"], array("controls" => true), array("overlay"=>array("resource_type"=>"subtitles", "public_id"=> $subt)));
  ?>

  <!--video width="100%"controls  crossorigin="anonymous" style="height: 100%;">
  <source src=" <?php echo  $row["secure_url"]; ?> ">
    <track label="English" kind="subtitles" srclang="en" src="<?php echo $subt; ?>" default>   
  </video-->

<?php
}
else
  header('Location: /cloud/index.php');

?>