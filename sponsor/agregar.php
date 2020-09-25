<?php  session_start(); ?>
<?php if (!isset($_SESSION['user_id'])) header ('Location: /index.php'); ?>
<?php if ($_SESSION["user_type"] != 3) header ('Location: /index.php'); ?>

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
		<!--h2><center> Agregar Auspiciador</center></h2-->
		<form enctype="multipart/form-data"  method="POST" action="doagregar.php">

		<div class="md-form">
  		</div>

  		Archivo
		<div class="md-form">
			<input id="upload-img" style ="color: white" type="file" name="file" accept="image/x-png" class="form-control"required>
		</div>
		Alt text
		<div class="md-form">
		    <input class="form-control" style ="color: white" type="text" name="alt_text" required>
		</div>

		Url
		<div class="md-form">
		    <input class="form-control" style ="color: white" type="url" name="orden" required>
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