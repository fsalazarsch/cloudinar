<?php  session_start(); ?>

<?php include "./resources/header.html" ?>
<?php include "./resources/navbar.php" ?>

<?php 
  include './config/conneccion.php';  

  if (!$_GET['id'])
    $getid = 1;
  else
    $getid = $_GET['id'];

  ini_set('display_errors', 1);
  ini_set('display_startup_errors', 1);
  error_reporting(E_ALL);

  $db = new Database();
  $conn = $db->connect();

  
  $sql = "SELECT * FROM lista JOIN users  WHERE start_at < NOW() AND lista.user_id=users.user_id AND list_type= ".$getid." ORDER BY start_at DESC";
  $eventos_activos = $conn->query($sql); 
  
  $sql = "SELECT * FROM lista JOIN users WHERE start_at > NOW() and lista.user_id = users.user_id AND list_type= ".$getid." ORDER BY start_at ASC";
  $eventos_futuros = $conn->query($sql);

  $row_user = $_SESSION;

?>

  <body>


<div class="container">
<br>
<h2><center>Principal</center></h2>
<h6>Bienvenido, <b><?php echo $row_user['user_name']; ?></b>.</h6>
<br>
<br>
<center>

<?php
echo "<h3>Eventos activos</h3>";
  if($eventos_activos->num_rows > 0)
  foreach ($eventos_activos as $index =>$item) { 
    
    if ($index %2==0)
      echo "<div class='row'>";
    
    echo "<div class='col-6' style='padding-bottom: 10%;'>";

    echo "<a href='/cloud/lista/play.php?nombre=".$item['nombre']."' onclick='agregar_visita(\"".$item['nombre']."\")' style='color: white'>".$item['user_name']." - ". $item['nombre']."<br>";
    echo '<img src="/cloud/posters/'.$item['id'].'.jpg"class="img-fluid" alt=""/></a></div>';
    if ($index %2==1)
      echo "</div>";



  }
      if ($eventos_activos->num_rows %2==1)
      echo "</div>";
  else
        echo "<i>No hay eventos activos por el momento</i>";


echo "<h3>Eventos futuros</h3>";
  if($eventos_futuros->num_rows > 0)
  foreach ($eventos_futuros as $index =>$item) { 
    
    if ($index %2==0)
      echo "<div class='row'>";
    
    echo "<div class='col-6' style='padding-bottom: 10%;'>";
    echo "<a href='/cloud/lista/play.php?nombre=".$item['nombre']."' style='color: white'>".$item['user_name']." - ". $item['nombre']."<br>";
    echo '<img src="/cloud/posters/'.$item['id'].'.jpg" class="img-fluid" alt=""/></a></div>';
    if ($index %2==1)
      echo "</div>";

  }

  if ($eventos_futuros->num_rows %2==1)
      echo "</div>";
  else
    echo "<i>No hay eventos futuros por el momento</i>";
?>

</center>
</div>
<br><br><br><br>
</body>
<script type="text/javascript">

  function agregar_visita(nombre){
    $.post({
      url: "/cloud/lista/agregar_visita.php",
      data: "nombre="+nombre
    });
    
  }  

</script>

<?php include "./resources/footer.php" ?>