
  <nav class="navbar navbar-expand-md navbar-dark" style="background-color: black;">
  <!-- Brand -->
  <a class="navbar-brand" href="#"><b><img src="/cloud/resources/eiam blanco transparente.png"></b></a>

  <!-- Toggler/collapsibe Button -->
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
    <span class="navbar-toggler-icon"></span>
  </button>


  <!-- Navbar links -->

<?php if (isset($_SESSION['user_id']))
{ ?>
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="https://eiam.site/cloud/center.php">Principal</a>
      </li>

      <?php if($_SESSION['user_type'] == 3){ ?>
      <li class="nav-item">
        <a class="nav-link" href="https://eiam.site/cloud/index2.php">Administración</a>
      </li>
      <?php } ?>
      <!--li class="nav-item">
        <a class="nav-link" href="user_dash.php">Mi perfil</a>
      </li-->
      <li class="nav-item">
        <a class="nav-link" href="https://eiam.site/cloud/quienes.php">Quiénes somos</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="https://eiam.site/cloud/contact.php">Contacto</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="https://eiam.site/cloud/logout.php">Salir</a>
      </li>
    </ul>
  </div>
</nav>
<?php
}
else 
{ ?>

  <div class="collapse navbar-collapse" id="collapsibleNavbar">
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" href="index2.php">Ingresar</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="registrar.php">Registrarse</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="quienes.php">Quiénes somos</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="contact.php">Contacto</a>
      </li>
     </ul>
  </div>
 </nav>
<?php	
}
?>
