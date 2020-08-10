<?php include "./config/header.html" ?>
<?php include "./config/navbar.php" ?>
<?php include './config/conneccion.php'; ?>

<?php

  $db = new Database();
  $conn = $db->connect();

  $sql = "SELECT * FROM professions";
  $profesiones = $conn->query($sql); 

  $sql = "SELECT * FROM universities";
  $universities = $conn->query($sql); 

?>
<body>
  <div class="container">
  <br>

  <form  method="POST" action="doregister.php">
  <input type="text" name="nombre" class="form-control" required="true" placeholder="Escribe tu nombre" minlength="4"><br>
  <input type="email" id="email" name="email" class="form-control" required="true" placeholder="Escribe tu e-mail" style=" text-transform: lowercase;"><br>
  <input type="password" name="passwd" class="form-control" required="true" placeholder="Elige tu clave"><br>
    <select class="form-control" id="profesion" name="profesion">
      <option value="" selected> Elige una opción</option>
      <?php
      foreach ($profesiones as $item) {
      echo "<option value='".$item['profession_id']."'>".$item['profession']."</option>"; 
      }
      ?>
    </select><br>

  <div class="form-group" id="universidad" style="display: none">
    <select class="form-control"name="universidad">
      <option value="" selected> Elige una opción</option>
      <?php
      foreach ($universities as $item) {
      echo "<option value='".$item['university_id']."'>".$item['university']."</option>"; 
      }
      ?>
    </select>
  </div>

  <input type="text" name="empresa" class="form-control" required="true" placeholder="Escribe nombre de empresa"><br>
   <div class="form-check">
			  <label class="form-check-label">
			    <input type="checkbox"  name="check" class="form-check-input" required>Estoy de acuerdo con los <a href="#"  data-toggle="modal" data-target="#exampleModal">Términos y condiciones</a>
			  </label>
	</div><br>
 
  <button id="submitButton" type="submit"  name="submit" class="btn btn-primary">Registrar</button>
    </form>
  </div>
	<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Términos y condiciones</h5>
				</div>
				<div class="modal-body">
					<span>Lorem ipsum dolor sit amet<span>
				</div>
			</div>
		</div>
	</div>
</body>

<script type="text/javascript">
	$("#profesion").change(function(){
		if($("#profesion").val() == 4)
			$("#universidad").show();
		else
			$("#universidad").hide();

	});

	$("#email").focusout(function(){
		$.post({
		  url: "chequear_correo.php",
		  data: "email="+$(this).val()
		}).done(function(data) {
		  if (data == "1"){
		  	$("#email").val("");
		  	alert("Ya existe un usuario con este correo");

		  }
		});
	});

</script>

<?php include "./config/footer.php" ?>
