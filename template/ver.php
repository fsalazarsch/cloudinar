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

  $sql = "SELECT * FROM template";
  $result = $conn->query($sql);

  


?>
  <br/>
  <div class="container">
  <!--h2><center>Textos de correos y sitio</center></h2><br-->

<?php
   echo "<table class='table table-striped' style='color:white'>";
      echo "<thead><td style='font-weight: bold;'>Correo</td><td style='font-weight: bold;'>Asunto</td><td style='font-weight: bold;'>Acciones</td></thead>";
  if ($result->num_rows > 0) 
    while ($fila = $result->fetch_assoc()) {
      //print_r($fila);
      $accion = str_replace("_", " ", $fila["accion"]);
      echo "<tr>";
      echo "<td>".$accion."</td>";
      echo "<td>".$fila["asunto"]."</td>";
      echo "<td><a href='editar.php?id=".$fila['id']."'><i class='fa fa-2x fa-edit' style='color:white'></i></a></td>";
      echo "</tr>";

    }
      echo "</table>";
?>
</div>
</body>
<br><br><br>
<?php include "../resources/footer.php" ?>
<?php
}
else
  header('Location: /cloud/index.php');

?>