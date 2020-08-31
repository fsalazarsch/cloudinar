<br>
<br>
<center style="background-color: transparent;padding-right: 15px;">
	
	<div class="row" style="margin-left: 15px"><img src="/cloud/resources/auspician blanco transparente.png"></div>

	<div class="row justify-content-start" style="margin-left: 0px">
	<?php 
	if (isset($db) == false){
	include './config/conneccion.php';
	$db = new Database();
  	$conn = $db->connect();
  	}

	$sql = "SELECT * FROM sponsor ORDER BY id";
	$sponsors = $conn->query($sql);
	
	// echo '<div class="row">';
	  foreach ($sponsors as $item) {
	  	$ruta = '/cloud/sponsors/'.$item['url_file'];
	  		

	  	
	  	      echo '<div class="col-2"><a href="'.$item['url'].'" target="_blank"><img src="'.$ruta.'" class="img-fluid" alt="'.$item['alt_text'].'"></a>';

	  	echo '</div>';

	  } 
	// echo '</div>';
	?>

	</div>
<!--br>
<br>
<div class="row">
<div class="col-4"><i class="fa fa-twitter-square fa-2x text-white"></i></div>
<div class="col-4"><i class="fa fa-instagram fa-2x text-white"></i></div>
<div class="col-4"><i class="fa fa-facebook fa-2x text-white"></i></div>
</div>
<br-->
</center>
</footer>
</html>
