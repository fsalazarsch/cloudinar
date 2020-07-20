<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
<link rel="stylesheet" href="video.css">



<div class="container">
<?php

    echo "<h3>".$_POST['nombre']."</h3>";
    
    echo '<video width="800" autoplay controls="false">';
    echo '<track src="test.vtt" kind="subtitles" label="English Subtitles" srclang="en" />';
  	//echo '<source src="'.$item.'" type="video/mp4">';
	echo '</video>';


    //foreach ($lista as $item) {
    //	if ($item){
    //		echo '<video width="800" autoplay controls="false">';
  			//echo '<source src="'.$item.'" type="video/mp4">';
	//		echo '</video>';
	//	}
    //}
    

?>
</div>

<script type="text/javascript">
	var lista  = '<?php  echo $_POST['lista'];?>';
	var lista = lista.split(" ");
	var i =1;
	lista.shift();
	//alert(lista[0]);
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
      $("video").attr('src',lista[i]);
      i += 1;
      $("video").load();
      $("video").play();
    });


</script>
