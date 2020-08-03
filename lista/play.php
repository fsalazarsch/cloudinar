<!DOCTYPE html>
<html>
<head>
  <title>Reproduciendo...</title>
</head>
<body>
<!--link rel="stylesheet" href="video.css"-->

<?php
	include "../config/header.html";
	include '../config/conneccion.php';

	$db = new Database();
	$conn = $db->connect();

	$nombre = $_GET['nombre'];
	$lista  = "";
	$subs  = "";
	$tipos  = "";

	$sql = "SELECT id, lista, user_id FROM lista WHERE nombre like '".$nombre."' LIMIT 1";
	$result = $conn->query($sql);  


	if ($result->num_rows == 1) 
		$row = $result->fetch_assoc();
	$detlista = $row['lista'];

	$auxllista = explode(",", $detlista);
	$id_lista =  $row["id"];
	$propietario =  $row["user_id"];


	foreach ($auxllista as $l) {
		if( $l != ""){
			$sql = "SELECT secure_url, nombre, tipo, subtitle, ingles FROM video WHERE nombre like '".$l."'";
			$result = $conn->query($sql); 
			$row = $result->fetch_assoc();
			$subt = "";

			if ($row["ingles"] == 1){
    		if (is_null($row["subtitle"]))
      			$subt = "https://res.cloudinary.com/enmateria-specs/raw/upload/".$row["tipo"]."/".$row["nombre"].".vtt";
    		else
      			$subt = $row["subtitle"];
      		}

			$lista .= ",".$row["secure_url"];
			$subs .= ",".$subt;
			$tipos .= ",".$row["tipo"];
		}
	}
	

	session_start();

	if (isset($_SESSION["user_id"])){
?>

<br>
<div class="container">
<?php 
	echo "<h3>".$nombre."</h3>"; 
?>
<div class="container" style="display: flex;">

	<video style="width: 80%" autoplay crossorigin="anonymous" controls="false">
	</video>
	<button class="bt btn-primary" id="buttonplay" onclick="$('video').click();$(this).hide();" style="position: absolute"><i class="fa fa-play"></i></button>

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
<hr><a href="../index.php">Ir al inicio</a>
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

    if(tipos[0] != 'moda'){
      	$("video").attr("controls", "controls");
      }
    else
    	$("video").removeAttr("controls");
      
      
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
      if(tipos[i] != 'moda'){
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

  <ul class="nav nav-tabs" style="padding-left: 10%;">
    <li class="active"><a data-toggle="tab" href="#home">Comentarios</a></li>
    <li><a data-toggle="tab" href="#chat">Chat</a></li>
  </ul>

  <div class="tab-content">
    <div id="home" class="tab-pane fade in active"><br>
    	<div id="comentarios"> <?php require('comentarios.php'); ?> </div>
    </div>
    <div id="chat" class="tab-pane fade in ">
      	<div id="chat2"> <?php require('chat.php'); ?> </div>
    </div>	
  </div>



<?php
	}
	else
  	header('Location: /cloud/index.php');

?>