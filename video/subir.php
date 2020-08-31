<?php  session_start(); ?>
<?php include "../resources/header.html" ?>
<?php include "../resources/navbar.php" ?>

<?php
  include '../config/conneccion.php';

  $db = new Database();
  $conn = $db->connect();
?>
<body>

<?php
if (isset($_SESSION["user_id"])){
?>

<body>

	<br/>

	<div class="container">
		<h2> <center>Subir Video</center></h2>
		<form enctype="multipart/form-data"  method="POST" action="upload.php">
			Video
			<div class="md-form">
				<input id="upload-img" type="file" name="file" class="form-control" style="color: white">
			</div>
				Escriba el nombre que tendra el video
				<div class="md-form">
				<input id="nombre" type="text" name="nombre" placeholder="Escriba el nombre que tendra el video" class="form-control" required="true" style="color: white"></div>

			 <div class="form-check">
			  <label class="form-check-label">
			    <input type="checkbox"  name="check" class="form-check-input" value="1">Video en Inglés
			  </label>
			</div>
			Seleccione el tipo de Video
			<div class="md-form">
				<select name="tipo" class="form-control" style="color: white">
					<option style="color: black" value="moda">Moda</option>
					<option style="color: black" value="contenido">Contenido</option>
					<option style="color: black" value="material">Material</option>
				</select>
			</div><br>
			<kbd>NOTA: Luego de subir el video se irá automáticamente a la lista de subidos</kbd><hr>
	
			<button id="submitButton" type="submit" class="btn btn-primary boton" data-toggle="modal" data-target="#exampleModal">Subir video</button>
		</form>
	</div>

	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Subiendo archivo</h5>
				</div>
				<div class="modal-body">
					<span>Esto puede demorar varios minutos dependiendo del tamaño del archivo<span>
					<div class="progress">
						<div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%"></div>
					</div>
				</div>
			</div>
		</div>
	</div>
<br><br><br><br><br>
</body>
<?php include "../resources/footer.php" ?>

<?php
}
else
  header('Location: /cloud/index.php');

?>