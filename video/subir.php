<?php

session_start();

if (isset($_SESSION["user_id"])){
?>
<!DOCTYPE html>
<html>
<head>
	<title>Subir Video Nuevo</title>
</head>
<body>
	<?php include "../config/header.html" ?>

	<br/>
	<div class="container p-3 my-3 bg-primary text-white">
		Subir Video
	</div>

	<div class="container">
		<form enctype="multipart/form-data"  method="POST" action="upload.php">
			<div class="form-group">
				<label for="file">Archivo</label>
				<input id="upload-img" type="file" name="file" class="form-control">
			</div><br>

			<div class="form-group">
				<input id="nombre" type="text" name="nombre" placeholder="Escriba el nombre que tendra el archivo" class="form-control" required="true"><br>
			</div>

			 <div class="form-check">
			  <label class="form-check-label">
			    <input type="checkbox"  name="check" class="form-check-input" value="1">Video en Inglés
			  </label>
			</div>
 
			<div class="form-group">
				<label>Seleccione el tipo de Video</label><br>
				<select name="tipo" class="form-control">
					<option value="moda">Moda</option>
					<option value="contenido">Contenido</option>
					<option value="material">Material</option>
				</select>
			</div><br>
			<kbd>NOTA: Luego de subir el video se irá automáticamente a la lista de subidos</kbd><hr>
	
			<button id="submitButton" type="submit" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">Subir video</button>
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
</body>

<?php
}
else
  header('Location: /cloud/index.php');

?>