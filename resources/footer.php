<center style="background-color: black;padding-right: 15px;opacity: 0.5">
	
	<div class="row" style="margin-left: 15px"><img src="/cloud/resources/auspician blanco transparente.png"></div>

	<div class="row justify-content-start" style="margin-left: 0px" id="sponsors">
	<?php 
	if (isset($db) == false){
	include './config/conneccion.php';
	$db = new Database();
  	$conn = $db->connect();
  	}

	$sql = "SELECT * FROM sponsor ORDER BY id";
	$sponsors = $conn->query($sql);

	$res = array();

	// echo '<div class="row">';
	  foreach ($sponsors as $index => $item) {
	  	$ruta = '/cloud/sponsors/'.$item['url_file'];


	  		array_push($res, '<div class="col-2"><a href="'.$item['url'].'" target="_blank"><img src="'.$ruta.'" class="img-fluid" alt="'.$item['alt_text'].'"></a>');

	  		if($index <= 5)
	  	      echo '<div class="col-2"><a href="'.$item['url'].'" target="_blank"><img src="'.$ruta.'" class="img-fluid" alt="'.$item['alt_text'].'"></a>';

	  	echo '</div>';

	  } 
	// echo '</div>';
	?>

	</div>

</center>
</footer>

<script type="text/javascript">
	 var res = '<?php echo implode(",", $res);?>'.split(',');
	 
	 function change(){
	 	res.push(res.shift());
	 	$("#sponsors").html(res.slice(0, 6));
	 }

	setInterval(change, 3000);
	 //setTimeOut(function(){ 
	 	

	 //	alert("Hello"); 

	 //}, 3000);
</script>
</html>

