<?php include "./resources/header.php" ?>
<?php include "./resources/navbar.php" ?>
<?php
  include './config/conneccion.php';  

  $db = new Database();
  $conn = $db->connect();

  $sql = "SELECT cuerpo FROM template where accion like 'principal' LIMIT 1";
  $principal = $conn->query($sql)->fetch_assoc();
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
    <center>
    <h2 style="color: white"><center>Bienvenidos</center></h2>
    <br>
    <?php if (isset($_GET['login_error'])) { ?>
    <div class="alert alert-danger" role="alert">
  ERROR: email y/o usuario incorrectos
    </div>
    <?php } ?>
    <br>
    <div class="row">
     <div class="col-1"></div>
     <div class="col-4"><img src="/cloud/resources/eiam.png" class="img-fluid"></div>
     <div class="col-1"></div>
     <div class="col-6">
     <br><br><br>
     <a href="#modalLoginForm" data-toggle="modal" data-target="#modalLoginForm" class="btn btn-primary boton" style="width: 100%">Estoy registrado</a><br>
     <a href="registrar.php" class="btn btn-primary boton" style="width: 100%">No estoy registrado</a><br>
    </div>
   </div>
<?php echo  $principal["cuerpo"] ?>

<?php include "carousel.php" ?>
    </center>
  </div>
</body>
<?php include "./resources/footer.php" ?>