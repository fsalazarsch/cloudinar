<?php  session_start(); ?>

<?php include "./resources/header.html" ?>
<?php include "./resources/navbar.php" ?>

<?php 
  include './config/conneccion.php';  


  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);

  $db = new Database();
  $conn = $db->connect();

  
  $sql = "SELECT * FROM list_type";
  $lista = $conn->query($sql); 
  
  $row_user = $_SESSION;

  $sql = "SELECT cuerpo FROM template where accion like 'cuenta' LIMIT 1";
  $cuenta = $conn->query($sql)->fetch_assoc();
?>

  <body>


<div class="container">
<br>
<h2><center>Principal</center></h2>
<br>

<div class="row">
  <div class="col-6"> <img src="/cloud/resources/eiam.png"></div>
  <div class="col-6">
<?php
  if($lista->num_rows > 0){
  foreach ($lista as $item) {   
    echo '<a href="main.php/?id='.$item['list_type_id'].'" class="btn btn-primary boton" style="width: 100%">'.$item['list_type'].'</a><br>';
  }
  echo '<a href="https://enmateriaspecs.com" target="_blank" class="btn btn-primary boton" style="width: 100%">Matterport</a><br>';
  }
  else
        echo "<i>No hay eventos activos por el momento</i>";

?>
    <?php echo  $cuenta["cuerpo"] ?>

</div>
</div>

</div>
<br><br><br><br>
</body>
<?php include "./resources/footer.php" ?>