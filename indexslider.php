<style type="text/css">
.carousel-inner{
height:600px;
width:100%;
}
.carousel-inner img {
height:800px;
width:100%;
object-fit: fill;
}

</style>
<script type="text/javascript">
  $(document).ready(function() {
    $('.carousel').carousel({
      interval: 1500
    })
  });
  </script>
<div class="">
	<div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
  <div class="carousel-inner">
    <?php 

    $counter = 1;
    while($rowslider=mysqli_fetch_array($recordslider))
    {
       
        ?>
    <div class="carousel-item <?php if($counter <= 1){echo 'active'; } ?>" data-bs-interval="2000">
     <img src="<?php echo $rowslider['location']; ?>" class="d-block w-100 img-fluid">'
      <div class="carousel-caption d-none d-md-block">
        
      </div>
    </div>
    <?php $counter++;} ?>
  <button class="carousel-control-prev" type="button" data-target="#carouselExampleFade" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-target="#carouselExampleFade" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </button>
</div>
</div>
<!-- Carousel Ends -->