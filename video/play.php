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

  <video width="100%"controls  crossorigin="anonymous" style="height: 100%;">
  <source src=" <?php echo  $row["secure_url"]; ?> ">
    <track label="English" kind="subtitles" srclang="en" src="<?php echo $subt; ?>" default>   
  </video>

<?php
}
else
  header('Location: /cloud/index.php');

?>