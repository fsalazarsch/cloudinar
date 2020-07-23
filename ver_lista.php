<!DOCTYPE html>
<html>
<head>
  <title>Ver videos</title>
</head>
<body>
<?php
  require_once "../vendor/autoload.php";

  include './config/conneccion.php';
  include "./config/header.html";


  $db = new Database();
  $conn = $db->connect();

  $sql = "SELECT nombre, lista FROM lista";
  $result = $conn->query($sql);

  


?>
  <br/>
  <div class="container p-3 my-3 bg-primary text-white">
    Ver Listas de Reproduccion
  </div>
  <div class="container">

<?php
   echo "<table class='table table-striped'>";
      echo "<thead><td>Lista</td><td>Videos</td></thead>";
  if ($result->num_rows > 0) 
    while ($fila = $result->fetch_assoc()) {
      //print_r($fila);
     
      echo "<tr>";
      echo "<td>".$fila["nombre"]."</td>";
      echo "<td><ol>";

      $lista =  explode(",", $fila["lista"]);
      foreach ($lista as $item) {    
        $sql2 = "SELECT nombre, tipo, secure_url FROM video WHERE nombre  LIKE '".$item."'";
        //echo $sql2;
        $result2 = $conn->query($sql2);

	while ($fila2 = $result2->fetch_assoc()) {
          echo "<li><a href='".$fila2['secure_url']."'>".$fila2['nombre']."</a></li>";
        }
      }
      echo "</ol></td>";
      echo "</tr>";

    }
      echo "</table>";
?>
<hr>
<a href="index.php">Ir al inicio</a>
</div>

