<?php  session_start(); ?>
<?php include "../config/header.html" ?>
<?php include "../config/navbar.php" ?>
<body>


<?php
if (isset($_SESSION["user_id"])){

  require_once "../../vendor/autoload.php";
  include '../config/conneccion.php';


  $db = new Database();
  $conn = $db->connect();

  $sql = "SELECT nombre, lista FROM lista";
  $result = $conn->query($sql);

  


?>
  <br/>
  <div class="container">
  <h3>Ver Listas de Reproducción</h3>

<?php
   echo "<table class='table table-striped'>";
      echo "<thead><td>Lista</td><td>Videos</td></thead>";
  if ($result->num_rows > 0) 
    while ($fila = $result->fetch_assoc()) {
      //print_r($fila);
     
      echo "<tr>";
      echo "<td><a href='play.php?nombre=".$fila['nombre']."'>".$fila["nombre"]."</a></td>";
      echo "<td><ol>";

      $lista =  explode(",", $fila["lista"]);
      foreach ($lista as $item) {    
        $sql2 = "SELECT nombre, tipo, secure_url FROM video WHERE nombre  LIKE '".$item."'";
        //echo $sql2;
        $result2 = $conn->query($sql2);

	while ($fila2 = $result2->fetch_assoc()) {
          echo "<li><a href='../video/play.php?nombre=".$fila2['nombre']."'>".$fila2['nombre']."</a></li>";
        }
      }
      echo "</ol></td>";
      echo "</tr>";

    }
      echo "</table>";
?>
</div>
</body>
<br><br><br>
<?php include "../config/footer.php" ?>
<?php
}
else
  header('Location: /cloud/index.php');

?>