<?php  session_start(); ?>
<?php if (!isset($_SESSION['user_id'])) header ('Location: /index.php'); ?>
<?php if ($_SESSION["user_type"] != 3) header ('Location: /index.php'); ?>

<?php include "../resources/header.php" ?>
<?php include "../resources/navbar.php" ?>
<?php
if (isset($_SESSION["user_id"])){
   include '../config/conneccion.php';  
	$dirsub = "../fondo_pantalla";
	$fondos = array_diff(scandir($dirsub), array('..', '.'));



  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);
  $db = new Database();
  $conn = $db->connect();

  ?>

<body>
<style type="text/css">
  tr{    padding: .75rem;
    vertical-align: top;
    border-top: 1px solid #dee2e6;
    padding-left: 5px
  }

  td{
        padding: 5px;
  }
</style>
<div class="container">
	<br>
	<h2><center>Fondo</center></h2>
  <a class="btn btn-primary boton" href="agregar.php">Agregar fondo</a><br>
  <?php
  if(count($fondos) > 0){
      echo "<table class='table' style='color: white'><thead><tr><td>Nombre</td><td>Imagen</td><td>Acciones</td></tr></head>";
    foreach ($fondos as $item) {
      echo "<tr><td>".$item."</td><td><img style='width: 10%' src='../fondo_pantalla/".$item."'></td>";
      echo "<td><a onclick='borrar(\"".$item."\")' style='cursor: pointer;'><i class='fa fa-2x fa fa-trash'></i></a></td></tr>";
    }
    echo "</table>";

  }
  else
    echo "<i>No hay fondos para mostrar agregue uno</i>";
  ?>

</div>
<script type="text/javascript">
  function borrar(id){
    $.post({
      url: "borrar.php",
      data: "id="+id
    });
  alert("Fondo eliminado");
  location.reload();
  }  


</script>
<br><br><br>
</body>
<?php include "../resources/footer.php" ?>

<?php
}
else
  header('Location: /cloud/index.php');

?>