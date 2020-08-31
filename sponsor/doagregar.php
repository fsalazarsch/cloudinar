

<?php
  include '../config/conneccion.php';

  $dirsub = "../sponsors";
  $tmp_name = $_FILES["file"]["tmp_name"];
  $name = $_FILES["file"]["name"];
  move_uploaded_file($tmp_name, $dirsub."/".$name); 
  //chmod( $dirsub."/".$_POST['lista'].".".$ext, 0666);

  print_r($_POST);

  $db = new Database();
  $conn = $db->connect();

  $sql = "INSERT INTO sponsor(url_file, alt_text, url) values (?,?,?)";
  
  $sentencia = $conn->prepare($sql);
  $sentencia->bind_param("sss", $name, $_POST["alt_text"], $_POST["orden"] );
  $sentencia->execute();

  header('Location: /cloud/sponsor/index.php');
?>