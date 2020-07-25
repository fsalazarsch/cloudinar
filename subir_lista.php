<!DOCTYPE html>
<html>
<head>
  <title>Reproduciendo...</title>
</head>
<body>
<!--link rel="stylesheet" href="video.css"-->

<?php
	include "./config/header.html";
	include './config/conneccion.php';

	$db = new Database();
	$conn = $db->connect();

	if ($_POST){
		$consulta = "INSERT INTO lista (nombre, lista) VALUES (?,?)";
		$sentencia = $conn->prepare($consulta);
		$sentencia->bind_param("ss",$_POST['nombre'],$_POST['detlista'] );
		$sentencia->execute();
		
		
		  header("Location: /cloud/subir_lista.php?nombre=".$_POST['nombre']);

	}
	if ($_GET){
		$nombre = $_GET['nombre'];
		$lista  = "";
		$subs  = "";
		$tipos  = "";

		$sql = "SELECT lista FROM lista WHERE nombre like '".$nombre."' LIMIT 1";
		$result = $conn->query($sql);  

		if ($result->num_rows == 1) 
			$row = $result->fetch_assoc();
		$detlista = $row['lista'];

		$auxllista = explode(",", $detlista);

		foreach ($auxllista as $l) {
			if( $l != ""){
				$sql = "SELECT secure_url, nombre, tipo, subtitle FROM video WHERE nombre like '".$l."'";
				$result = $conn->query($sql); 
				$row = $result->fetch_assoc();
				$lista .= ",".$row["secure_url"];
				$subs .= ",".$row["subtitle"];
				$tipos .= ",".$row["tipo"];
			}
		}
	}

?>

<br>
<div class="container">
<?php 
	echo "<h3>".$nombre."</h3>"; 
?>
<div class="container" style="display: flex;">

	<video width="80%" autoplay crossorigin="anonymous" controls="false">
	</video>
	

	<table class="table">  
		<thead class="thead-dark">
    		<tr>
    			<th scope="col"><?php echo "Nombre lista ".$nombre ?></th>
    		</tr>
		</thead>
		<tbody id="tbody">
		</tbody>
	</table>

</div>
<hr><a href="index.php">Ir al inicio</a>
</div>

<script type="text/javascript">
	var lista  = '<?php  echo $lista;?>';
	lista = lista.split(",");
	var i =1;
	lista.shift();
	
	console.log(lista);

	var tipos  = '<?php  echo $tipos;?>';
	tipos = tipos.split(",");
	var i =1;
	tipos.shift();
	
	console.log(tipos);

	var detalle_lista  = '<?php  echo $detlista;?>';
	detalle_lista = detalle_lista.split(",");
	detalle_lista.shift();

	console.log(detalle_lista);

	var subs  = '<?php  echo $subs;?>';
	subs = subs.split(",");
	subs.shift();

	var strtbody = "";
	for (i=0; i<detalle_lista.length; i++){
		strtbody += "<tr><td id='video_"+i+"'>";
		strtbody += detalle_lista[i]+"</td></tr>";
	}
	$("#tbody").html(strtbody);
	//alert(lista[0]);


	i =1;
	$("video").attr('src', lista[0]);
	$("video").html('<track label="English" kind="subtitles" srclang="en" src="'+subs[0]+'" default>');
    if(tipos[0] != 'publicidad'){
      	$("video").attr("controls", "controls");
      }
    else
    	$("video").removeAttr("controls");
      
      

	var vids = $("video"); 
	$.each(vids, function(){
		//this.controls = false; 
	}); 

	$("video").click(function() {
		if (this.paused) {
			this.play();
		} else {
			this.pause();
		}
	});

	$('video').on('ended',function(){
      console.log('Video has ended!');
      $("video").attr('src', lista[i]);
      $("video").html('<track label="English" kind="subtitles" srclang="en" src="'+subs[i]+'" default>');
      if(tipos[i] != 'publicidad'){
      	$("video").attr("controls", "controls");
      }
      else
    	$("video").removeAttr("controls");
      	
      
      //$("#video_"+i).css('font-weight', 'normal');
      
      i += 1;

      $("video").load();
      $("video").play();
    });


</script>
