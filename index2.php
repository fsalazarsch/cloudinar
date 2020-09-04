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
    echo "<script> alert('Usuario o clave incorrecta, intenta otra vez');</script>";
}



if (isset($_SESSION["user_id"])){
  if ($_SESSION["user_type"] == 3){
    header('Location: /cloud/adm.php');
  }

  if ($_SESSION["user_type"] != 3){
    header('Location: /cloud/center.php');

  }


}

else{

?>
<div class="container text-white" style="width:40%;background: linear-gradient(40deg,#4B534A,#303f9f) !important;"><br>
  <h2><center>Ingresar</center></h2>
  <form  method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
  	<br>
        <label>E-mail</label>
    <div class="md-form" >
    <i class="fa fa-user prefix"></i>
    <input id="nombre" type="email" name="nombre" class="form-control" size="25" style=" text-transform: lowercase; color: white" required="true">
    </div>
  	<label>Contraseña</label>
    <div class="md-form" >
    <i class="fa fa-lock prefix"></i>
    <input id="nombre" type="password" name="passwd" class="form-control" size="25" required="true" style=" color: white">
    </div>
    
  <button id="submitButton" type="submit"  name="submit" class="btn btn-primary" style="background-color: transparent !important;border-style: solid !important;border: 1px;">Ingresar</button><br>
  <a href="./forgot.php"   class="btn"  style="background-color: transparent !important; color: white; box-shadow: none;">Olvidé mi Contraseña</a>
    </form>
</div>
<?php
}
?>

</body>
<?php include "./resources/footer.php" ?>

