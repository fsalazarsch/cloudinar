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


if($_SERVER['REQUEST_METHOD'] === 'GET'){
  //print "Listing resources on cloud name: ". $cloud_name . "<br>";
  $api = new \Cloudinary\Api();
  $results = $api->resources(array("resource_type" => "video", "max_results" => 30));

  foreach ($results["resources"] as $value) {
    if (strpos($value["public_id"], 'publicidad') !== false) {
      echo "<a href='".$value["secure_url"]."'>".str_replace("publicidad/", "", $value["public_id"])."</a><br>";
    }

    if (strpos($value["public_id"], 'contenido') !== false) {
      echo "<a href='".$value["secure_url"]."'>".str_replace("contenido/", "", $value["public_id"])."</a><br>";
    }
    
    if (strpos($value["public_id"], 'material') !== false) {
      echo "<a href='".$value["secure_url"]."'>".str_replace("material/", "", $value["public_id"])."</a><br>";
    }
    
  }

  foreach ($results["resources"] as $value) {
  }

}



?>
