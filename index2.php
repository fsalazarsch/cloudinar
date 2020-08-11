<?php  session_start(); ?>
<?php include "./config/header.html" ?>
<?php include "./config/navbar.php" ?>
<body>

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
    header('Location: /cloud/main.php');

  }


}

else{

?>
<div class="container"><br>
  <h3>Login</h3>
  <form  method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
  	E-mail usuario
  <input id="nombre" type="email" name="nombre" class="form-control" placeholder="Escribe tu e-mail" style=" text-transform: lowercase;" required="true"><br>
  	Password
  <input id="nombre" type="password" name="passwd" class="form-control" required="true"><br>
  <button id="submitButton" type="submit"  name="submit" class="btn btn-primary">Login</button>
  <a href="./forgot.php"   class="btn btn-primary">Olvide mi Clave</a>
    </form>
</div>
<?php
}
?>

</body>
<?php include "./config/footer.php" ?>

