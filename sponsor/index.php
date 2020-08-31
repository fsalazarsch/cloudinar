<?php  session_start(); ?>
<?php include "../resources/header.html" ?>
<?php include "../resources/navbar.php" ?>
<?php
if (isset($_SESSION["user_id"])){
  include '../config/conneccion.php';  


  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);

  $db = new Database();
  $conn = $db->connect();

  $sql = "SELECT * FROM sponsor ORDER BY id";
  $sponsors = $conn->query($sql);
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
	<h2><center>Auspiciadores</center></h2>
  <a class="btn btn-primary boton" href="agregar.php">Agregar auspiciador</a><br>
  <?php
  if($sponsors->num_rows > 0){
      echo "<table class=''><thead><tr><td>Url</td><td>Alt text</td><td>Url</td><td>Acciones</td></tr></head>";
    foreach ($sponsors as $item) {
      //id, url_file, alt_file, orden
      echo "<tr><td style='background-color: black'><img src='../sponsors/".$item['url_file']."'></td><td>".$item['alt_text']."</td><td>".$item['url']."</td>";
      echo "<td><a onclick='borrar(".$item['id'].")' style='cursor: pointer;'><i class='fa fa-2x fa fa-trash'></i></a></td></tr>";
    }
    echo "</table>";

  }
  else
    echo "<i>No hay auspiciadores para mostrar agregue uno</i>";
  ?>

</div>
<script type="text/javascript">
  function borrar(id){
    $.post({
      url: "borrar.php",
      data: "id="+id
    });
  alert("Sponsor eliminado");
  location.reload();
  }  


  function agregar_visita(nombre){
    $.post({
      url: "agregar_visita.php",
      data: "nombre="+nombre
    });
    
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