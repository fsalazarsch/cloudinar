<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

  require_once "../vendor/autoload.php";

  include './config/conneccion.php';

  $db = new Database();
  $conn = $db->connect();

  $sql = "SELECT  nombre, tipo, secure_url, subtitle FROM video WHERE nombre like '".$_GET["nombre"]."' LIMIT 1";
  $result = $conn->query($sql);

    $row = $result->fetch_assoc();

?>

  <video width="100%"controls  crossorigin="anonymous" style="height: 100%;">
  <source src=" <?php echo  $row["secure_url"]; ?> ">
    <track label="English" kind="subtitles" srclang="en" src="<?php echo  $row["subtitle"]; ?>" default>   
  </video>


