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

  
  $sql = "SELECT * FROM lista JOIN users  WHERE start_at < NOW() AND lista.user_id=users.user_id ORDER BY start_at DESC";
  $eventos_activos = $conn->query($sql); 
  
  $sql = "SELECT * FROM lista JOIN users WHERE start_at > NOW() and lista.user_id = users.user_id ORDER BY start_at ASC";
  $eventos_futuros = $conn->query($sql);

  $row_user = $_SESSION;

?>

  <body>


<div class="container">
<br>
<h3>Principal</h3>
<h6>Bienvenido, <b><?php echo $row_user['user_name']; ?></b>.</h6>
<br>
<br>
<center>

<?php
echo "<h3>Eventos activos</h3>";
  if($eventos_activos->num_rows > 0)
  foreach ($eventos_activos as $item) { 
    
    echo "<br>";
    echo "<a href='lista/play.php?nombre=".$item['nombre']."'>".$item['nombre']." - ". $item['user_name']."<br>";
    echo '<img src="posters/'.$item['id'].'.jpg" class="img-fluid" alt=""/><br></a>';
  }
  else
        echo "<i>No hay eventos activos por el momento</i>";


echo "<br><br>";

echo "<h3>Eventos futuros</h3>";
  if($eventos_futuros->num_rows > 0)
    foreach ($eventos_futuros as $item) { 
      echo "<br>";
      echo $item['nombre']." - ". $item['user_name']."<br>";
      echo '<img src="posters/'.$item['id'].'.jpg" class="img-fluid" alt=""/><br>';
    }
  else
    echo "<i>No hay eventos futuros por el momento</i>";
?>

</center>
</div>
<br><br><br><br>
</body>
<?php include "./resources/footer.php" ?>