<?php  session_start(); ?>
<?php include "../resources/header.php" ?>
<?php include "../resources/navbar.php" ?>
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


<script type="text/javascript">
  function agregar(text, data){
    var html = $("#detalle_lista").html();
    var value = $("#lista").val();
    var valtxt = $("#detlista").val();
    var nodo = "<li>"+text+"</li>";

    
    if (html.includes(nodo)){
        $("#detalle_lista").html(html.replace(nodo, ""));
        $("#lista").val(value.replace(" "+data, ""));
        $("#detlista").val(valtxt.replace(","+text, ""));

    }else{
        $("#detalle_lista").html(html+nodo);
        $("#lista").val(value+" "+data);
        $("#detlista").val(valtxt+","+text);

      }
    //console.log(valtxt);
  }
</script>

<br>
<div class="container">
<h2><center>Crear Lista de Reproducción</center></h2>
<kbd>Para agregar un video a la lista pulse sobre el nombre del video, para quitarlo pulse otra vez sobre el video</kbd><hr>


<?php
  
  $api = new \Cloudinary\Api();
  $results = $api->resources(array("resource_type" => "video", "max_results" => 30));
  echo '<div class="list-group">';
  echo '<h3>Moda</h3>';

  foreach ($results["resources"] as $value) {
    if (strpos($value["public_id"], 'moda') !== false) {

       $nombre = str_replace("moda/", "", $value["public_id"]);
         echo "<a onclick=\"agregar('".$nombre."', '".$value["secure_url"]."')\" class='list-group-item list-group-item-action' style='color: black'>".$nombre."</a>";
             }
  }

  echo '</div><br><div class="list-group"><h3>Contenido</h3>';


  foreach ($results["resources"] as $value) {
   if (strpos($value["public_id"], 'contenido') !== false) {
       $nombre = str_replace("contenido/", "", $value["public_id"]);
         echo "<a onclick=\"agregar('".$nombre."', '".$value["secure_url"]."')\" class='list-group-item list-group-item-action' style='color: black'>".$nombre."</a>";
    }
  }

   echo '</div><br><div class="list-group"><h3>Material</h3>';

  foreach ($results["resources"] as $value) {
   if (strpos($value["public_id"], 'material') !== false) {
        $nombre = str_replace("material/", "", $value["public_id"]);

         echo "<a onclick=\"agregar('".$nombre."', '".$value["secure_url"]."')\" class='list-group-item list-group-item-action' style='color: black'>".$nombre."</a>";
       }
  }

?>
</div>
    <hr>
    <form enctype="multipart/form-data"  method="POST" action="subir_lista.php">
      <div class="container form-group">
        <div class="md-form">
        <input id="nombre" type="text" name="nombre" placeholder="Escriba el nombre que tendrá la lista"  class="form-control" required="true" style="color: white"></div>
        <input id="lista" type="hidden" name="lista" class="form-control">
        <input id="detlista" type="hidden" name="detlista" class="form-control">

        <label> Tipo de Lista</label>
        <div class="md-form">
        <select class="form-control" id="list_type" name="list_type" required="true"  style="color: white">
    
        <option value="" selected style="color: black">Elige...</option>

        <?php

          $sql = "SELECT list_type_id, list_type FROM list_type";
          $result = $conn->query($sql);

          while ($row2 = $result->fetch_assoc()){
            echo '<option value="'.$row2['list_type_id'].'" style="color: black">'.$row2['list_type'].'</option>';
          }

        ?>
        </select>
        </div>

        Usuario
        <div class="md-form">
        <select class="form-control" id="user_id" name="user_id" required="true" style="color: white">
        <option value="" selected style="color: black">Elige...</option>

        <?php

          $sql = "SELECT user_id, user_name FROM users  WHERE user_type = 2";
          $result = $conn->query($sql);

          while ($row2 = $result->fetch_assoc()){
            echo '<option value="'.$row2['user_id'].'"  style="color: black">'.$row2['user_name'].'</option>';
          }

        ?>
        </select>
        </div>

        <p>Detalle de lista</p>
        <ol id="detalle_lista">
        </ol>
            <button id="submitButton" type="submit" class="btn btn-primary">Guardar lista</button>
      </div>
    </form>


</div>
<br><br><br><br>
</body>
<?php include "../resources/footer.php" ?>
<?php
}
else
  header('Location: /cloud/index.php');

?>