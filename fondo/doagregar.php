

<?php
  include '../config/conneccion.php';

  $dirsub = "../fondo_pantalla";

  $tmp_name = $_FILES["file"]["tmp_name"];
  $name = $_FILES["file"]["name"];
  $ext= explode(".", $name)[1];
  move_uploaded_file($tmp_name, $dirsub."/".$name); 


  print_r($_POST);


  header('Location: /cloud/fondo/index.php');
?>