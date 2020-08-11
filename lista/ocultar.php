<?php
  include '../config/conneccion.php';


  $db = new Database();
  $conn = $db->connect();

  $sql = "UPDATE lista SET start_at= NULL,  end_at= NULL WHERE id= ?";
  
  $sentencia = $conn->prepare($sql);
  $sentencia->bind_param("i", $_POST["id"] );
  $sentencia->execute();

  header('Location: /cloud/lista/ver.php');
?>