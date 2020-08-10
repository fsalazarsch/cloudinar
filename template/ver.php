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

  $sql = "SELECT * FROM template";
  $result = $conn->query($sql);

  


?>
  <br/>
  <div class="container">
  <h3>Ver Templates</h3>

<?php
   echo "<table class='table table-striped'>";
      echo "<thead><td>Correo</td><td>Asunto</td><td>Acciones</td></thead>";
  if ($result->num_rows > 0) 
    while ($fila = $result->fetch_assoc()) {
      //print_r($fila);
      $accion = str_replace("_", " ", $fila["accion"]);
      echo "<tr>";
      echo "<td>".$accion."</td>";
      echo "<td>".$fila["asunto"]."</td>";
      echo "<td><a href='editar.php?id=".$fila['id']."'><i class='fa fa-2x fa-edit'></i></a></td>";
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