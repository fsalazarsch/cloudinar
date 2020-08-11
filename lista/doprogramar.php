

<?php
  include '../config/conneccion.php';

  $dirsub = "../posters";
  $tmp_name = $_FILES["file"]["tmp_name"];
  $name = $_FILES["file"]["name"];
  $ext= explode(".", $name)[1];
  move_uploaded_file($tmp_name, $dirsub."/".$_POST['lista'].".".$ext); 
  //chmod( $dirsub."/".$_POST['lista'].".".$ext, 0666);

  print_r($_POST);

  $db = new Database();
  $conn = $db->connect();

  $sql = "UPDATE lista SET start_at= ? WHERE id= ?";
  
  $sentencia = $conn->prepare($sql);
  $sentencia->bind_param("si", $_POST["start_at"], $_POST["lista"] );
  $sentencia->execute();

  $sql = "UPDATE lista SET end_at= ? WHERE id= ?";
  $sentencia = $conn->prepare($sql);
  $sentencia->bind_param("si", $_POST["end_at"], $_POST["lista"] );
  $sentencia->execute();

  header('Location: /cloud/lista/ver.php');
?>