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

//\Cloudinary\Uploader::upload_large("dog.mp4");
if($_SERVER['REQUEST_METHOD'] === 'POST'){
  \Cloudinary\Uploader::upload_large($_FILES['file']['tmp_name'], 
    array("folder" => $_POST['tipo'], 
    	"public_id" => $_POST['nombre'], 
    	"overwrite" => TRUE, 
    	"invalidate" => TRUE,
    	"resource_type" => "video", 
    	"chunk_size" => 6000000
    ));
}
?>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">

<div class="container">
<?php

  //print "Listing resources on cloud name: ". $cloud_name . "<br>";
  $api = new \Cloudinary\Api();
  $results = $api->resources(array("resource_type" => "video", "max_results" => 30));
  echo '<div class="list-group">';
  echo '<h3>Publicidad</h3>';

  foreach ($results["resources"] as $value) {
    if (strpos($value["public_id"], 'publicidad') !== false) {
      echo "<a href='".$value["secure_url"]."' class='list-group-item list-group-item-action'>".str_replace("publicidad/", "", $value["public_id"])."</a>";
    }
  }

  echo '</div><br><div class="list-group"><h3>Contenido</h3>';


  foreach ($results["resources"] as $value) {
   if (strpos($value["public_id"], 'contenido') !== false) {
      echo "<a href='".$value["secure_url"]."'  class='list-group-item list-group-item-action'>".str_replace("contenido/", "", $value["public_id"])."</a>";
    }
  }

   echo '</div><br><div class="list-group"><h3>Material</h3>';

  foreach ($results["resources"] as $value) {
   if (strpos($value["public_id"], 'material') !== false) {
      echo "<a href='".$value["secure_url"]."' class='list-group-item list-group-item-action'>".str_replace("material/", "", $value["public_id"])."</a><br>";
       }
  }



?>
</div>


