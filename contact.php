<?php  session_start(); ?>
<?php include "./resources/header.html" ?>
<?php include "./resources/navbar.php" ?>
<link rel="stylesheet" href="/cloud/resources/css/main.css" crossorigin="anonymous">

<body>

<br>

<div class="container">
  <h2><center>Contacto</center></h2>
  <form  method="POST" action="docontact.php">
  <div class="md-form">
  <input type="email" id="email" name="email" class="form-control" required="true" placeholder="Escribe tu e-mail" style="color: white"></div>
  <div class="md-form">
  <input type="text" name="asunto" class="form-control" required="true" placeholder="Escribe tu asunto" minlength="4" style="color: white"></div>
  <div class="md-form">
  <textarea name="cuerpo" style="width: 100%;resize: none;background-color: transparent;color: white" placeholder=" Escribe aquí el cuerpo de tu mensaje" required></textarea>
  </div>
  <button id="submitButton" type="submit"  name="submit" class="btn btn-primary boton">Enviar</button>
    </form>
  </div>

</body>
<?php include "./resources/footer.php" ?>

