<?php  session_start(); 


	ini_set('display_errors', 1);
	ini_set('display_startup_errors', 1);
	error_reporting(E_ALL);

use Postmark\PostmarkClient;
use Postmark\Models\PostmarkException;

function generateRandomString($length = 10) {
    return substr(str_shuffle(str_repeat($x='0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ', ceil($length/strlen($x)) )),1,$length);
}
function envio_mail_postmark($destinatario, $titulo, $mensaje){
	$client = new PostmarkClient("e696de7c-a310-4090-86b8-b7a2788e8e3c");

	$sendResult = $client->sendEmail(
	  "eiam@infomagica.cl",
	  $destinatario,
	  $titulo,
	  $mensaje
	);
}


?>



<?php include "./resources/header.php" ?>
<?php include "./resources/navbar.php" ?>
<?php  require_once "../vendor/autoload.php"; ?>
<link rel="stylesheet" href="/cloud/resources/css/main.css" crossorigin="anonymous">


<body onload="document.body.style.opacity='1'">

<br>
<div class="container">
  <div class="md-form">
	<h2><center>Olvido de contraseña</center></h2>
      E-mail usuario
	<form  method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
		<input type="email" id="email" name="email" class="form-control" required="true" placeholder="Escribe tu e-mail" style=" text-transform: lowercase;color: white"><br>
		<button id="submitButton" type="submit"  name="submit" class="btn btn-primary boton">Reiniciar contraseña</button>
    </form>

<?php if ($_POST) {
  include './config/conneccion.php';

  $newpass = generateRandomString();

  $db = new Database();
  $conn = $db->connect();

  $sql = "UPDATE users SET user_password = ? WHERE user_email= ?";


	$sentencia = $conn->prepare($sql);
  	$sentencia->bind_param("ss",$newpass,$_POST['email']);
  	$sentencia->execute();

  $sql = "SELECT * FROM users where user_email  like '".$_POST['email']."'";
  $result = $conn->query($sql);
  $row2 = $result->fetch_assoc();


  $sql = "SELECT * FROM template WHERE accion like 'email_de_reseteo_de_clave'";
  $result = $conn->query($sql);
  $row = $result->fetch_assoc();

  $cuerpo = str_replace("{{user_name}}", $row2['user_name'] , $row['cuerpo']);
  $cuerpo = str_replace("{{passwd}}", $newpass , $cuerpo);

  envio_mail_postmark($_POST['email'], $row['asunto'], $cuerpo);

  echo "Si tu email fue registrado entonces se ha enviado un correo para reiniciar la clave";

} ?>
</div>
</div>

</body>
<?php include "./resources/footer.php" ?>
