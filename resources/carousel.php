  <?php 
  if (isset($db) == false){
  include './config/conneccion.php';
  $db = new Database();
    $conn = $db->connect();
    }

  $sql = "SELECT * FROM sponsor ORDER BY id";
  $sponsors = $conn->query($sql);
  ?>



<div id="carousel-example-multi" class="carousel slide carousel-multi-item v-2 carousel-fade" data-ride="carousel">


  <!-- Indicators -->
  <!--ol class="carousel-indicators">
    <li style="background-color: blue" data-target="#carousel-example-multi" data-slide-to="0" class="active"></li>
    <li style="background-color: blue" data-target="#carousel-example-multi" data-slide-to="1"></li>
    <li style="background-color: blue" data-target="#carousel-example-multi" data-slide-to="2"></li>
    <li style="background-color: blue" data-target="#carousel-example-multi" data-slide-to="3"></li>
  </ol-->
  <!--/.Indicators-->

  <div class="carousel-inner v-2" role="listbox">

    <?php

      foreach ($sponsors as $index => $item) {
        $ruta = '/cloud/sponsors/'.$item['url_file'];
        if ($index == 0)
          echo '<div class="carousel-item active">';
        else
          echo '<div class="carousel-item">';

        echo '<div class="col-2 float-left"><a href="'.$item['url'].'" target="_blank"><img src="'.$ruta.'" class="img-fluid" alt="'.$item['alt_text'].'"></a>';
        echo '</div></div>';
      }
    ?>



  </div>

</div>

<script>
  $('.carousel.carousel-multi-item.v-2 .carousel-item').each(function(){
  var next = $(this).next();
  if (!next.length) {
    next = $(this).siblings(':first');
  }
  next.children(':first-child').clone().appendTo($(this));

  for (var i=0;i<4;i++) {
    next=next.next();
    if (!next.length) {
      next=$(this).siblings(':first');
    }
    next.children(':first-child').clone().appendTo($(this));
  }
});
</script>