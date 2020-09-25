<?php  session_start(); ?>
<?php if (!isset($_SESSION['user_id'])) header ('Location: /index.php'); ?>
<?php if ($_SESSION["user_type"] != 3) header ('Location: /index.php'); ?>

<?php include "../resources/header.php" ?>
<?php include "../resources/navbar.php" ?>
<body>


<?php
if (isset($_SESSION["user_id"])){

  require_once "../../vendor/autoload.php";
  include '../config/conneccion.php';


  $db = new Database();
  $conn = $db->connect();

  $sql = "SELECT id, nombre, lista, start_at FROM lista";
  $result = $conn->query($sql);

  


?>
  <br/>
  <div class="container">
  <!--h2><center>Ver Listas de Reproducción</center></h2-->

<?php
   echo "<table class='table table-striped' style='color: white'>";
      echo "<thead><td>Lista</td><td>Videos</td><td>Acciones</td></thead>";
  if ($result->num_rows > 0) 
    while ($fila = $result->fetch_assoc()) {
      //print_r($fila);
     
      echo "<tr>";
      echo "<td><a onclick='agregar_visita(\"".$fila['nombre']."\")' href='play.php?nombre=".$fila['nombre']."' style='color:white'>".$fila["nombre"]."</a></td>";
      echo "<td><ol>";

      $lista =  explode(",", $fila["lista"]);
      foreach ($lista as $item) {    
        $sql2 = "SELECT nombre, tipo, secure_url FROM video WHERE nombre  LIKE '".$item."'";
        //echo $sql2;
        $result2 = $conn->query($sql2);

	while ($fila2 = $result2->fetch_assoc()) {
          echo "<li><a href='../video/play.php?nombre=".$fila2['nombre']."' style='color:white'>".$fila2['nombre']."</a></li>";
        }
      }
      echo "</ol></td>";

      if ( $fila['start_at'] )
        echo "<td><a onclick='ocultar(".$fila['id'].")' style='cursor: pointer;'><i class='fa fa-2x fa fa-eye-slash'></i></a></td>";
      else
        echo "<td></td>";

      echo "</tr>";

    }
      echo "</table>";
?>
</div>
</body>
<script type="text/javascript">
  function ocultar(id){
    $.post({
      url: "ocultar.php",
      data: "id="+id
    });
  alert("Programacion de evento eliminada");
  location.reload();
  }  


  function agregar_visita(nombre){
    $.post({
      url: "agregar_visita.php",
      data: "nombre="+nombre
    });
    
  }  

</script>

<br><br><br><br>
<?php include "../resources/footer.php" ?>
<?php
}
else
  header('Location: /cloud/index.php');

?>