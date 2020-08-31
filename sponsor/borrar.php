<?php
  include '../config/conneccion.php';

  $db = new Database();
  $conn = $db->connect();

  $sql = "SELECT FROM sponsor WHERE id= ".$_POST["id"]." LIMIT 1";
  $sponsor = $conn->query($sql); 
  unlink("../sponsors/".$sponsor["url_file"] );


  $sql = "DELETE FROM sponsor WHERE id= ?";
  
  $sentencia = $conn->prepare($sql);
  $sentencia->bind_param("i", $_POST["id"] );
  $sentencia->execute();

  header('Location: /cloud/sponsor/index.php');
?>