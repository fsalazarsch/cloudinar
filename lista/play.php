<?php session_start(); ?>

<body>
<?php
	include "../config/header.html";
	include '../config/conneccion.php';
	include '../config/navbar.php';

	$db = new Database();
	$conn = $db->connect();

	$nombre = $_GET['nombre'];
	$lista  = "";
	$subs  = "";
	$tipos  = "";

	$sql = "UPDATE lista set vistas = vistas + 1 WHERE nombre like ?";
	$sentencia = $conn->prepare($sql);
  	$sentencia->bind_param("s", $nombre );
  	$sentencia->execute();

	$sql = "SELECT id, lista, A.user_id, B.user_name, vistas FROM lista A, users B WHERE A.user_id = B.user_id AND nombre like '".$nombre."' LIMIT 1";
	$result = $conn->query($sql);  


	if ($result->num_rows == 1) 
		$row = $result->fetch_assoc();
	$detlista = $row['lista'];

	$auxllista = explode(",", $detlista);
	$id_lista =  $row["id"];
	$propietario =  $row["user_id"];
	$nombre_propietario = $row["user_name"];
	$vistas = $row["vistas"];

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
	

	

	if (isset($_SESSION["user_id"])){
?>

<br>
<div class="container">
<?php 
	echo "<h3><center>".$nombre." - ".$nombre_propietario." - ".$vistas." visitas</center></h3>"; 
?>
<div class="container" style="position:	relative">

	<button onmouseover="$(this).child().css('opacity' : '1.0')" onclick="$('video').css('visibility', 'visible');$('video').click();$(this).hide();" style="position: absolute;width: inherit;height: 100%;opacity: 1.0;border: none;"><i class="fa fa-5x fa-play-circle" style ="color:#357ebd;"></i></button>
	<video style="width: 100%; visibility: hidden;" crossorigin="anonymous"  controls="false">
	</video>

</div>
</div><br>

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

	//console.log(detalle_lista);

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
      $("video").attr('autoplay', 'autoplay');
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

    var image = document.getElementById("img");

    function updateChat() {
        $("#chatreload").load("play.php?nombre=<?php echo $nombre?> #chatreload");
        console.log("update");
    }

    setInterval(updateChat, 5000);


</script>
	
  <ul class="nav nav-tabs" style="padding-left: 10%;" role="tablist">
    <li><a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Comentarios</a></li>
    <li><a class="nav-link" id="home-tab" data-toggle="tab" href="#chat" role="tab" aria-controls="chat" aria-selected="true">Chat en vivo</a></li>
  </ul>

  <div class="tab-content">
    <div id="home" class="tab-pane fade in active"><br>
    	<div id="comentarios"> <?php require('comentarios.php'); ?> </div>
    </div>
    <div id="chat" class="tab-pane fade in ">
      	<div id="chat2"> <?php require('chat.php'); ?> </div>
    </div>	
  </div>

</body>
<br><br><br>

<?php include "../config/footer.php" ?>

<?php
	}
	else
  	header('Location: /cloud/index.php');

?>