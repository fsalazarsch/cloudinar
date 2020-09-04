<?php  session_start(); ?>
<?php include "./resources/header.php" ?>
<?php include "./resources/navbar.php" ?>
<body onload="document.body.style.opacity='1'">
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
  	$sentencia->bind_param("sss",strtolower($_POST['email']),$_POST['asunto'],$_POST['cuerpo']);
  	$sentencia->execute();

  	echo "Su mensaje ha sido enviado correctamente";

 ?>
</div>
</body>
<?php include "./resources/footer.php" ?>