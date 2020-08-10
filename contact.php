<?php  session_start(); ?>
<?php include "./config/header.html" ?>
<?php include "./config/navbar.php" ?>
<body>

<br>

<div class="container">
  <h3>Contacto</h3>
  <form  method="POST" action="docontact.php">
  <input type="email" id="email" name="email" class="form-control" required="true" placeholder="Escribe tu e-mail" style=" text-transform: lowercase;"><br>
  <input type="text" name="asunto" class="form-control" required="true" placeholder="Escribe tu asunto" minlength="4"><br>
  <textarea name="cuerpo" style="width: 100%;resize: none;" placeholder=" Escribe aqui el cuerpo de tu mensaje" required></textarea>
  <button id="submitButton" type="submit"  name="submit" class="btn btn-primary">Enviar</button>
    </form>
  </div>

</body>
<?php include "./config/footer.php" ?>

