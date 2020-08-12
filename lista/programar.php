<?php  session_start(); ?>
<?php include "../resources/header.html" ?>
<?php include "../resources/navbar.php" ?>
<?php include '../config/conneccion.php'; ?>

<?php

  $db = new Database();
  $conn = $db->connect();

  $sql = "SELECT id, nombre FROM lista order by nombre";
  $listas = $conn->query($sql); 
  ?>
<body>

<?php
if (isset($_SESSION["user_id"])){
?>

<body>

	<br/>

	<div class="container">
		<h3> Programar lista</h3>
		<form enctype="multipart/form-data"  method="POST" action="doprogramar.php">

		<div class="form-group">
    	<select class="form-control" name="lista" required>
      		<option value="" selected> Elige una opción</option>
      		<?php
      			foreach ($listas as $item) {
      			echo "<option value='".$item['id']."'>".$item['nombre']."</option>"; 
      			}
      		?>
    	</select>
  		</div>

			<div class="form-group">
				<label for="file">Poster</label>
				<input id="upload-img" type="file" name="file" class="form-control"required>
			</div>

		<div class="form-group">
		  <label for="example-datetime-local-input">Fecha y hora de estreno</label>
		    <input class="form-control" type="datetime-local" name="start_at" required>
		</div>

		<div class="form-group">
		  <label for="example-datetime-local-input">Fecha y hora de cierre</label>
		    <input class="form-control" type="datetime-local" name="end_at">
		</div>

	
			<button id="submitButton" type="submit" class="btn btn-primary">Programar</button>
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