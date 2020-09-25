<?php  session_start(); ?>
<?php include "./resources/header.php" ?>
<?php include "./resources/navbar.php" ?>
<link rel="stylesheet" href="/cloud/resources/css/main.css" crossorigin="anonymous">

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

<br>

<div class="container">
  <!--h2><center>Contacto</center></h2-->
  <form  method="POST" action="docontact.php">
  <div class="md-form">
  <input type="email" id="email" name="email" class="form-control" required="true" placeholder="Escribe tu e-mail" style="color: white"></div>
  <div class="md-form">
  <input type="text" name="asunto" class="form-control" required="true" placeholder="Escribe el asunto" minlength="4" style="color: white"></div>
  <div class="md-form">
  <textarea name="cuerpo" style="width: 100%;resize: none;background-color: transparent;color: white" placeholder=" Escribe el mensaje" required></textarea>
  </div>
  <button id="submitButton" type="submit"  name="submit" class="btn btn-primary boton">Enviar</button>
    </form>
  </div>
<br><br><br><br><br><br><br><br>
</body>
<?php include "./resources/footer.php" ?>

