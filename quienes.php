<?php  session_start(); ?>
<?php include "./resources/header.php" ?>
<?php include "./resources/navbar.php" ?>
<link rel="stylesheet" href="/cloud/resources/css/main.css" crossorigin="anonymous">

<?php
  include './config/conneccion.php';  


  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);

  $db = new Database();
  $conn = $db->connect();

  $sql = "SELECT cuerpo FROM template where accion like 'quienes_somos' LIMIT 1";
  $quienes_somos = $conn->query($sql)->fetch_assoc();
  ?>

<!--Modal: Login Form-->
<div class="modal fade" id="modalLoginForm" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog cascading-modal modal-avatar modal-sm" role="document">
    <!--Content-->
    <div class="modal-content">

      <!--Header-->
      <div class="modal-header">
        <img src="resources/login.jpg" alt="avatar" class="rounded-circle img-responsive">
      </div>
      <!--Body-->
      <div class="modal-body text-center mb-1">

        <h5 class="mt-1 mb-2">Estoy registrado</h5>

        <div class="md-form ml-0 mr-0">
        <form  method="POST" action="dologin.php">
          <h5>email</h5>
          <input id="nombre" type="email" name="nombre" class="form-control" required="true">
        </div> 
         <div class="md-form ml-0 mr-0">
          <h5>contraseña</h5>
          <input id="nombre" type="password" name="passwd" class="form-control" required="true">
        </div>
        <br>
        <h5><a href="forgot.php" style='color: black'>Olvidé mi contraseña</a></h5>
        <br>
        <div class="text-center mt-4">
          <button id="submitButton" type="submit"  name="submit" class="btn btn-dark">Ingresar</button>
          <button type="button" class="btn btn-dark" data-dismiss="modal">Cerrar</button>

          </form>
        </div>
      </div>

    </div>
    <!--/.Content-->
  </div>
</div>
<!--Modal: Login  Form-->

<body onload="document.body.style.opacity='1'">
<div class="container">
	<br>
	<!--h2><center>Quiénes somos</center></h2-->
	<?php echo $quienes_somos['cuerpo']; ?>
</div>
</body>
<?php include "./resources/footer.php" ?>