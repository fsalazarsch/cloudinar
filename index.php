<?php include "./resources/header.html" ?>
<?php include "./resources/navbar.php" ?>
<?php
  include './config/conneccion.php';  

  $db = new Database();
  $conn = $db->connect();

  $sql = "SELECT cuerpo FROM template where accion like 'principal' LIMIT 1";
  $principal = $conn->query($sql)->fetch_assoc();
?>

<body>
  <div class="container">
  <br>
    <center>
    <h2 style="color: white"><center>Bienvenidos!</center></h2>
    <br>
    <div class="row">
  <div class="col-6"> <img src="/cloud/resources/eiam.png"></div>
  <div class="col-6">
    <a href="index2.php" class="btn btn-primary boton" style="width: 100%">Estoy registrado</a><br>
    <a href="registrar.php" class="btn btn-primary boton" style="width: 100%">No estoy registrado</a><br>
    <?php echo  $principal["cuerpo"] ?>
</div>
</div>


    </center>
  </div>
</body>
<?php include "./resources/footer.php" ?>