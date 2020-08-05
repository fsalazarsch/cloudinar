<!DOCTYPE html>
<html>
<head>
	<title>Principal</title>
</head>
<body>
	   <?php include "./config/header.html" ?>

<br/>
<div class="container">

<?php
	session_start();
if($_POST){

  require_once "../vendor/autoload.php";

  include './config/conneccion.php';

  $db = new Database();
  $conn = $db->connect();

  //$passwd = hash('sha256', $_POST["passwd"]);
  $passwd =  $_POST["passwd"];

  $sql = "SELECT user_id, user_name FROM users WHERE user_email like '".$_POST["nombre"]."' and user_password like '".$passwd."' LIMIT 1";
  //echo $sql;
  $result = $conn->query($sql);
  $row = $result->fetch_assoc();
  $_SESSION = $row;


}



if (isset($_SESSION["user_id"])){

?>

	<h3>Que desea hacer, <?php echo $_SESSION['user_name']; ?></h3>
	<ol>
		<li><a href="video/subir.php">Subir un video</a></li>
		<li><a href="video/listar.php">Ver lista de videos Subidos</a></li>
		<li><a href="lista/crear.php">Crear una Lista de Reproducción</a></li>
		<li><a href="lista/ver.php">Ver Listas de Reproducción</a></li>
	</ol>


<?php
}

else{

?>

  <form  method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
  	Nombre usuario
  <input id="nombre" type="text" name="nombre" class="form-control" required="true">
  	Password
  <input id="nombre" type="password" name="passwd" class="form-control" required="true">
  <button id="submitButton" type="submit"  name="submit" class="btn btn-primary">Login</button>
    </form>

<?php
}
?>

</div>


</body>
</html>
