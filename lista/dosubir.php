<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

  $dirsub = "../posters";
  $tmp_name = $_FILES["file"]["tmp_name"];
  $name = $_FILES["file"]["name"];
  $ext= explode(".", $name);
  $ext = $ext[1];
  echo "$dirsub/$_POST['lista'].$ext";
 
  $db = new Database();
  $conn = $db->connect();

  $sql = "UPDATE lista SET start_at= ?,  end_at= ? WHERE id= ?";
  
  $sentencia = $conn->prepare($sql);
  $sentencia->bind_param("ssi", $_POST["start_at"], $_POST["end_at"], $_POST["lista"] );
  $sentencia->execute();

  //header('Location: /cloud/video/listar.php');
?>