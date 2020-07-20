<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

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
<div class="progress">
  <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="100" aria-valuemin="0" aria-valuemax="100" style="width: 100%"></div>
</div>
      </div>

    </div>
  </div>
</div>
