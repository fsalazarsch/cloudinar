<?php
require_once "../vendor/autoload.php";

$cloud_name="fsalazarsch";
$api_key="484133148959599";
$api_secret='569Ani_37gehInUYrlpO3xnpyIg';


\Cloudinary::config(
	array(
		"cloud_name" => $cloud_name,
		"api_key" => $api_key,
		"api_secret" => $api_secret
  )
);

?>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

<script type="text/javascript">
  function agregar(text, data){
    var html = $("#detalle_lista").html();
    var value = $("#lista").val();
    var nodo = "<li>"+text+"</li>";

    
    if (html.includes(nodo)){
        $("#detalle_lista").html(html.replace(nodo, ""));
        $("#lista").val(value.replace(" "+data, ""));
    }else{
        $("#detalle_lista").html(html+nodo);
        $("#lista").val(value+" "+data);

      }
    console.log(text);
  }
</script>

<div class="container">


<?php
  
  //print "Listing resources on cloud name: ". $cloud_name . "<br>";
  $api = new \Cloudinary\Api();
  $results = $api->resources(array("resource_type" => "video", "max_results" => 30));
  echo '<div class="list-group">';
  echo '<h3>Publicidad</h3>';

  foreach ($results["resources"] as $value) {
    if (strpos($value["public_id"], 'publicidad') !== false) {

       $nombre = str_replace("publicidad/", "", $value["public_id"]);
         echo "<a onclick=\"agregar('".$nombre."', '".$value["secure_url"]."')\" class='list-group-item list-group-item-action'>".$nombre."</a><br>";
             }
  }

  echo '</div><br><div class="list-group"><h3>Contenido</h3>';


  foreach ($results["resources"] as $value) {
   if (strpos($value["public_id"], 'contenido') !== false) {
       $nombre = str_replace("contenido/", "", $value["public_id"]);
         echo "<a onclick=\"agregar('".$nombre."', '".$value["secure_url"]."')\" class='list-group-item list-group-item-action'>".$nombre."</a><br>";
    }
  }

   echo '</div><br><div class="list-group"><h3>Material</h3>';

  foreach ($results["resources"] as $value) {
   if (strpos($value["public_id"], 'material') !== false) {
        $nombre = str_replace("material/", "", $value["public_id"]);

         echo "<a onclick=\"agregar('".$nombre."', '".$value["secure_url"]."')\" class='list-group-item list-group-item-action'>".$nombre."</a><br>";
       }
  }

?>
</div>
    <hr>
    <form enctype="multipart/form-data"  method="POST" action="subir_lista.php">
      <div class="container form-group">
        <input id="nombre" type="text" name="nombre" placeholder="Escriba el nombre que tendra la lista"  class="form-control"><br>
        <input id="lista" type="hidden" name="lista" placeholder=""  class="form-control"><br>
        <p>Detalle de lista</p>
        <ol id="detalle_lista">
        </ol>
            <button id="submitButton" type="submit" class="btn btn-primary">Guardar lista</button>
      </div>
    </form>
