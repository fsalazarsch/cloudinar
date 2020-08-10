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

}



if (isset($_SESSION["user_id"])){
  if ($_SESSION["user_type"] == 3){
?>
  <br/>
<div class="container">
	<h3>Que desea hacer, <?php echo $_SESSION['user_name']; ?></h3>
	<ol>
		<li><a href="video/subir.php">Subir un video</a></li>
		<li><a href="video/listar.php">Ver lista de videos Subidos</a></li>
		<li><a href="lista/crear.php">Crear una Lista de Reproducción</a></li>
    <li><a href="lista/ver.php">Ver Listas de Reproducción</a></li>
    <li><a href="lista/programar.php">Programar lista</a></li>
    <li><a href="lista/asistentes.php">Bajar lista asistentes</a></li>
    <li><a href="template/ver.php">Editar cuerpo de correos</a></li>
	</ol>
</div>

<?php
  }
  if ($_SESSION["user_type"] != 3){
     include './main.php';

  }


}

else{

?>
<div class="container"><br>
  <form  method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
  	Nombre usuario
  <input id="nombre" type="text" name="nombre" class="form-control" required="true">
  	Password
  <input id="nombre" type="password" name="passwd" class="form-control" required="true">
  <button id="submitButton" type="submit"  name="submit" class="btn btn-primary">Login</button>
  <a href="./forgot.php"   class="btn btn-primary">Olvide mi Clave</a>
    </form>
</div>
<?php
}
?>

</body>
<?php include "./config/footer.php" ?>

