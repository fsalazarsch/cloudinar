<?php  session_start(); ?>
<?php if (!isset($_SESSION['user_id'])) header ('Location: /index.php'); ?>
<?php if ($_SESSION["user_type"] != 3) header ('Location: /index.php'); ?>

<?php include "../resources/header.php" ?>
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
<style type="text/css">
input[type="datetime-local"]::-webkit-calendar-picker-indicator {
  color: rgba(255, 255, 255, 0.3);
  cursor: pointer;
}

</style>
	<br/>

	<div class="container">
		<!--h2><center>Programar lista</center></h2-->
		<form enctype="multipart/form-data"  method="POST" action="doprogramar.php">
		
		Elige una lista
		<div class="md-form">
    	<select class="form-control" name="lista" required style="color: white">
      		<option value="" selected style="color: black"> Elige una lista</option>
      		<?php
      			foreach ($listas as $item) {
      			echo "<option value='".$item['id']."' style='color: black'>".$item['nombre']."</option>"; 
      			}
      		?>
    	</select>
  		</div>
  			Poster
			<div class="md-form">
				<input id="upload-img" style="color: white" type="file" name="file" accept="image/x-png,image/jpeg" class="form-control"required>
			</div>
		
		Fecha y hora de estreno
		<div class="md-form">  
		    <input class="form-control" style="background-color: white" type="datetime-local" name="start_at" required>
		</div>

		Fecha y hora de cierre
		<div class="md-form">
		    <input class="form-control" style="background-color: white" type="datetime-local" name="end_at">
		</div>

	
			<button id="submitButton" type="submit" class="btn btn-primary boton">Programar</button>
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