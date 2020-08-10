<?php  session_start(); ?>
<?php include "../config/header.html" ?>
<?php include "../config/navbar.php" ?>
<body>

<?php
if (isset($_SESSION["user_id"])){



ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

  require_once "../../vendor/autoload.php";

  include '../config/conneccion.php';

  $db = new Database();
  $conn = $db->connect();

  $sql = "SELECT cloudname, api_key, api_secret FROM config LIMIT 1";
  $result = $conn->query($sql);

  if ($result->num_rows == 1) 
    $row = $result->fetch_assoc();


  \Cloudinary::config(
  	array(
  		"cloud_name" => $row["cloudname"],
  		"api_key" => $row["api_key"],
  		"api_secret" => $row["api_secret"]
    )
  );

?>
  <br/>
  <div class="container">
  <h3>Ver Lista de Videos</h3>

  <kbd>Para ver un video pulse sobre el nombre del video</kbd><hr>

  <?php
    //$api = new \Cloudinary\Api();
    //$results = $api->resources(array("resource_type" => "video", "max_results" => 30));
    
    $sql = "SELECT secure_url, nombre, ingles, subtitle FROM video where tipo like 'moda'";
    $result = $conn->query($sql);
    
    echo '<div class="list-group">';
    echo '<h4>Publicidad</h4>';
    while ( $value = $result->fetch_assoc()) {
      echo "<a href='".$value["secure_url"]."' class='list-group-item list-group-item-action'>".str_replace("moda/", "", $value["nombre"])."</a>";
        echo "<div><a  href='play.php?nombre=".str_replace("moda/", "", $value["nombre"])."' class='btn btn-primary'>Ver</a>";
        if ($value["ingles"] == 1){
            echo "<a href='https://res.cloudinary.com/enmateria-specs/raw/upload/moda/".$value["nombre"].".vtt' download target='_blank' class='btn btn-primary' style='margin-left: 5px;'>Ver Subt generado</a>";
          
          echo "<a  href='subirsub.php?nombre=".$value["nombre"]."' class='btn bt-primary'  style='margin-left: 5px;'>Subir subtitulo</a></div>";
          }
          echo "<button onclick='borrar(\"".$value["nombre"]."\", \"moda\")' class='btn btn-danger' style='margin-left: 5px;'>Borrar</button></div>";
        }

    echo '</div><br><div class="list-group"><h4>Contenido</h4>';


    $sql = "SELECT secure_url, nombre, ingles, subtitle FROM video where tipo like 'contenido'";
    $result = $conn->query($sql);
    while ( $value = $result->fetch_assoc()) {    
        echo "<a href='".$value["secure_url"]."'  class='list-group-item list-group-item-action'>".str_replace("contenido/", "", $value["nombre"])."</a>";
        echo "<div><a  href='play.php?nombre=".str_replace("contenido/", "", $value["nombre"])."' class='btn btn-primary'>Ver</a>";
        if ($value["ingles"] == 1){
          if (isset($value["subtitle"])){
            echo "<a href='".$value["subtitle"]."' download target='_blank' class='btn btn-primary' style='margin-left: 5px;'>Ver Subt generado</a>";
          }       
          else{
            echo "<a href='https://res.cloudinary.com/enmateria-specs/raw/upload/contenido/".$value["nombre"].".vtt' download target='_blank' class='btn btn-primary'  style='margin-left: 5px;'>Ver Subt generado</a>";
          }
        echo "<a  href='subirsub.php?nombre=".$value["nombre"]."' class='btn btn-primary' style='margin-left: 5px;'>Subir subtitulo</a>";
        }
        echo "<button onclick='borrar(\"".$value["nombre"]."\", \"contenido\")' class='btn btn-danger' style='margin-left: 5px;'>Borrar</button></div>";

    }

    echo '</div><br><div class="list-group"><h4>Material</h4>';

    $sql = "SELECT secure_url, nombre, ingles, subtitle FROM video where tipo like 'material'";
    $result = $conn->query($sql);
    while ( $value = $result->fetch_assoc()) {    
        echo "<a href='".$value["secure_url"]."' class='list-group-item list-group-item-action'>".str_replace("material/", "", $value["nombre"])."</a>";
        echo "<div><a  href='play.php?nombre=".str_replace("material/", "", $value["nombre"])."' class='btn btn-primary'>Ver</a>";
        if ($value["ingles"] == 1){
          if (isset($value["subtitle"])){
            echo "<a href='".$value["subtitle"]."' download target='_blank' class='btn btn-primary' style='margin-left: 5px;'>Ver Subt generado</a>";
          }       
          else{
            echo "<a href='https://res.cloudinary.com/enmateria-specs/raw/upload/material/".$value["nombre"].".vtt' download target='_blank' class='btn btn-primary'  =style='margin-left: 5px;'>Ver Subt generado</a>";
          }
        echo "<a  href='subirsub.php?nombre=".$value["nombre"]."'class='btn btn-primary'  style='margin-left: 5px;'>Subir subtitulo</a>";

        }
        echo "<button onclick='borrar(\"".$value["nombre"]."\", \"material\")' class='btn btn-danger' style='margin-left: 5px;'>Borrar</button></div>";

    }
?>
</div>
</div>


<script type="text/javascript">
function borrar(name, tipo) {
   // name = name.split("/");
      $.ajax({
           type: "POST",
           url: 'delete.php',
           data:  'nombre='+name+'&tipo='+tipo,
           success:function(html) {
            alert("borrado");
            location.reload();
           }

      });
 }
</script>
</body>
<br><br><br>
<?php include "../config/footer.php" ?>

<?php
}
else
  header('Location: /cloud/index.php');

?>