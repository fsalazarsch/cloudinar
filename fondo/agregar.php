<?php  session_start(); ?>
<?php include "../resources/header.php" ?>
<?php include "../resources/navbar.php" ?>
<?php include '../config/conneccion.php'; ?>

<body>

<?php
if (isset($_SESSION["user_id"])){
?>

<body>

	<br/>

	<div class="container">
		<h2><center> Agregar Fondo</center></h2>
		<form enctype="multipart/form-data"  method="POST" action="doagregar.php">

		<div class="md-form">
  		</div>

  		Fondo
		<div class="md-form">
			<input id="upload-img" style ="color: white" type="file" name="file" accept="image/x-jpg" class="form-control"required>
		</div>	
			<button id="submitButton" type="submit" class="btn btn-primary boton">Agregar</button>
		</form>
	</div>


<br><br><br><br>
</body>
<?php include "../resources/footer.php" ?>

<?php
}
else
  header('Location: /cloud/index.php');

?>