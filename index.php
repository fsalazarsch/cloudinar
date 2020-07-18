<script src="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/js/bootstrap.esm.min.js" integrity="sha384-sKZy8g2KJhBTFCD6cIg8d4EifJxaa8c/iYIERdeKorHWhAgZgQOfqOKMe3xBqye1" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha1/css/bootstrap.min.css" integrity="sha384-r4NyP46KrjDleawBgD5tp8Y7UzmLA05oM1iAEQ17CSuDqnUK2+k9luXQOfXJCJ4I" crossorigin="anonymous">

<div class="container">
	<form enctype="multipart/form-data"  method="POST" action="upload.php">
		<div class="form-group">
			<label for="file">Archivo</label>
			<input id="upload-img" type="file" name="file" class="form-control">
		</div><br>

		<div class="form-group">
			<input id="nombre" type="text" name="nombre" placeholder="Escriba el nombre que tendra el archivo"  class="form-control"><br>
		</div>

		<div class="form-group">
			<label>Seleccione el tipo de Video</label><br>
			<select name="tipo" class="form-control">
				<option value="publicidad">Publicidad</option>
				<option value="contenido">Contenido</option>
				<option value="material">material</option>
			</select>
		</div><br>
		<button type="submit" class="btn btn-primary">Subir video</button>
	</form>
</div>
