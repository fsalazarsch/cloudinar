<!DOCTYPE html>
<html>
<head>
  <title>Crear lista de Reproduccion</title>
</head>
<body>

<?php
  require_once "../vendor/autoload.php";
  include './config/conneccion.php';

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

  include "./config/header.html"
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

<br/>
<div class="container p-3 my-3 bg-primary text-white">
  Crear Lista de Reproduccion
</div>
<div class="container">
<kbd>Para agregar un video a la lista pulse sobre el nombre del video, para quitarlo pulse otra vez sobre el video</kbd><hr>


<?php
  
  $api = new \Cloudinary\Api();
  $results = $api->resources(array("resource_type" => "video", "max_results" => 30));
  echo '<div class="list-group">';
  echo '<h3>Publicidad</h3>';

  foreach ($results["resources"] as $value) {
    if (strpos($value["public_id"], 'publicidad') !== false) {

       $nombre = str_replace("publicidad/", "", $value["public_id"]);
         echo "<a onclick=\"agregar('".$nombre."', '".$value["secure_url"]."')\" class='list-group-item list-group-item-action'>".$nombre."</a>";
             }
  }

  echo '</div><br><div class="list-group"><h3>Contenido</h3>';


  foreach ($results["resources"] as $value) {
   if (strpos($value["public_id"], 'contenido') !== false) {
       $nombre = str_replace("contenido/", "", $value["public_id"]);
         echo "<a onclick=\"agregar('".$nombre."', '".$value["secure_url"]."')\" class='list-group-item list-group-item-action'>".$nombre."</a>";
    }
  }

   echo '</div><br><div class="list-group"><h3>Material</h3>';

  foreach ($results["resources"] as $value) {
   if (strpos($value["public_id"], 'material') !== false) {
        $nombre = str_replace("material/", "", $value["public_id"]);

         echo "<a onclick=\"agregar('".$nombre."', '".$value["secure_url"]."')\" class='list-group-item list-group-item-action'>".$nombre."</a>";
       }
  }

?>
</div>
    <hr>
    <form enctype="multipart/form-data"  method="POST" action="subir_lista.php">
      <div class="container form-group">
        <input id="nombre" type="text" name="nombre" placeholder="Escriba el nombre que tendra la lista"  class="form-control" required="true"><br>
        <input id="lista" type="hidden" name="lista" class="form-control"><br>
        <input id="detlista" type="hidden" name="detlista" class="form-control"><br>
        
        <p>Detalle de lista</p>
        <ol id="detalle_lista">
        </ol>
            <button id="submitButton" type="submit" class="btn btn-primary">Guardar lista</button>
      </div>
    </form>


<a href="index.php">Ir al inicio</a>
