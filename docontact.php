<?php  session_start(); ?>
<?php include "./config/header.html" ?>
<?php include "./config/navbar.php" ?>
<body>
<div class="container">
	<br>
<?php
	include './config/conneccion.php';

	$db = new Database();
	$conn = $db->connect();


	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);

	$db = new Database();
	$conn = $db->connect();
	
	$sql = "INSERT INTO contact(email, asunto, cuerpo) values(?, ?, ?)";

	$sentencia = $conn->prepare($sql);
  	$sentencia->bind_param("sss",$_POST['email'],$_POST['asunto'],$_POST['cuerpo']);
  	$sentencia->execute();

  	echo "Su mensaje ha sido enviado correctamente";

 ?>
</div>
</body>
<?php include "./config/footer.php" ?>