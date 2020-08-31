<?php  require_once "../vendor/autoload.php"; ?>
<?php
	include './config/conneccion.php';

	use Postmark\PostmarkClient;
	use Postmark\Models\PostmarkException;

	$db = new Database();
	$conn = $db->connect();



	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);

	function envio_mail_postmark($destinatario, $titulo, $mensaje){
		$client = new PostmarkClient("e696de7c-a310-4090-86b8-b7a2788e8e3c");

		$sendResult = $client->sendEmail(
		  "eiam@infomagica.cl",
		  $destinatario,
		  $titulo,
		  $mensaje
		);
	}

	
	$sql = "INSERT INTO users(user_type, user_email, user_password, user_name, profession_id, university_id, user_company) values(1, ?, ?, ?, ?, ?, ?)";

	if($_POST['profesion'] != 4){
		 $_POST['universidad'] = "";
	}

	$sentencia = $conn->prepare($sql);
  	$sentencia->bind_param("sssiis",$_POST['email'],$_POST['passwd'],$_POST['nombre'],$_POST['profesion'],$_POST['universidad'],$_POST['empresa']);
  	$sentencia->execute();

  	//var_dump($_POST);

	$sql = "SELECT * FROM users WHERE user_email LIKE '".$_POST['email']."' LIMIT 1";	
	$result = $conn->query($sql);  
	$row = $result->fetch_assoc();

	session_start();
	$_SESSION = $row;
	//var_dump($row);

  $sql = "SELECT * FROM template WHERE accion like 'email_de_bienvenida'";
  $result = $conn->query($sql);
  $row2 = $result->fetch_assoc();

  $cuerpo = str_replace("{{user_name}}", $_POST['nombre'] , $row2['cuerpo']);
  
  envio_mail_postmark($_POST['email'], $row2['asunto'], $cuerpo);



	header("Location: main.php");

 ?>