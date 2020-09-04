<?php  session_start(); ?>
<?php include "./resources/header.php" ?>
<?php include "./resources/navbar.php" ?>
<link rel="stylesheet" href="/cloud/resources/css/main.css" crossorigin="anonymous">

<body>
<div style="padding-top: 5%"><br></div>
<?php

if($_POST){

  require_once "../vendor/autoload.php";
  include './config/conneccion.php';

  $db = new Database();
  $conn = $db->connect();

  $passwd = $_POST["passwd"];
  $sql = "SELECT user_id, user_name, user_type FROM users WHERE user_email like '".$_POST["nombre"]."' and user_password like '".$passwd."' LIMIT 1";
  //echo $sql;
  $result = $conn->query($sql);
  $row = $result->fetch_assoc();
  $_SESSION = $row;
  if ($result->num_rows == 0)
    header('Location: /cloud/index.php?login_error=1');
}



if (isset($_SESSION["user_id"])){
  if ($_SESSION["user_type"] == 3){
    header('Location: /cloud/adm.php');
  }

  if ($_SESSION["user_type"] != 3){
    header('Location: /cloud/center.php');

  }


}

?>

</body>
<?php include "./resources/footer.php" ?>

