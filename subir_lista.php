<!DOCTYPE html>
<html>
<head>
  <title>Reproduciendo...</title>
</head>
<body>
<link rel="stylesheet" href="video.css">

<?php
	include "./config/header.html";


  include './config/conneccion.php';

  $db = new Database();
  $conn = $db->connect();

  $consulta = "INSERT INTO lista (nombre, lista) VALUES (?,?)";
  $sentencia = $conn->prepare($consulta);

  //if ($_POST['detlista'][0] == ',') 
  //$_POST['detlista'] = substr($_POST['detlista'],1);
  
  $sentencia->bind_param("ss",$_POST['nombre'],$_POST['detlista'] );
  $sentencia->execute();

?>

<br>
<div class="container">
<?php 
	echo "<h3>".$_POST['nombre']."</h3>"; 
?>
<div class="container" style="display: flex;">

	<video width="80%" autoplay controls="false">
	</video>
	

	<table class="table">  
		<thead class="thead-dark">
    		<tr>
    			<th scope="col"><?php echo "Nombre lista ".$_POST['nombre']?></th>
    		</tr>
		</thead>
		<tbody id="tbody">
		</tbody>
	</table>

</div>
<hr><a href="index.php">Ir al inicio</a>
</div>

<script type="text/javascript">
	var lista  = '<?php  echo $_POST['lista'];?>';
	lista = lista.split(" ");
	var i =1;
	lista.shift();
	
	var detalle_lista  = '<?php  echo $_POST['detlista'];?>';
	detalle_lista = detalle_lista.split(",");
	detalle_lista.shift();
	var strtbody = "";
	for (i=0; i<detalle_lista.length; i++){
		strtbody += "<tr><td id='video_"+i+"'>";
		strtbody += detalle_lista[i]+"</td></tr>";
	}
	$("#tbody").html(strtbody);
	//alert(lista[0]);


	i =1;
	$("video").attr('src', lista[0]);
      
	var vids = $("video"); 
	$.each(vids, function(){
		this.controls = false; 
	}); 

	$("video").click(function() {
		if (this.paused) {
			this.play();
		} else {
			this.pause();
		}
	});

	$('video').on('ended',function(e){
      console.log('Video has ended!');
      $("video").attr('src', lista[i]);

      //$("#video_"+i).css('font-weight', 'normal');
      
      i += 1;

      $("video").load();
      $("video").play();
    });


</script>
