

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

    <div class="carousel-item active">
      <div class="col-3 float-left">
          <img class="card-img-top" src="https://eiam.site/cloud/resources/img/36.jpg"
            alt="Card image cap">
      </div>
    </div>
    <div class="carousel-item">
      <div class="col-3 float-left">
          <img class="card-img-top" src="https://eiam.site/cloud/resources/img/34.jpg"
            alt="Card image cap">
      </div>
    </div>
    <div class="carousel-item">
      <div class="col-3 float-left">
          <img class="card-img-top" src="https://eiam.site/cloud/resources/img/38.jpg"
            alt="Card image cap">
      </div>
    </div>
    <div class="carousel-item">
      <div class="col-3 float-left">
          <img class="card-img-top" src="https://eiam.site/cloud/resources/img/29.jpg"
            alt="Card image cap">
      </div>
    </div>


  </div>

</div>

<script>
  $('.carousel.carousel-multi-item.v-2 .carousel-item').each(function(){
  var next = $(this).next();
  if (!next.length) {
    next = $(this).siblings(':first');
  }
  next.children(':first-child').clone().appendTo($(this));

  for (var i=0;i<2;i++) {
    next=next.next();
    if (!next.length) {
      next=$(this).siblings(':first');
    }
    next.children(':first-child').clone().appendTo($(this));
  }
});
</script>