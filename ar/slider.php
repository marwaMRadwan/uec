<div id="carouselExampleFade" class="carousel slide carousel-fade" data-ride="carousel">
  <div class="carousel-inner">
  <?php
   require "../panel/production/db.php";

    $q="SELECT * FROM `slider`";
    $qrun=mysqli_query($connection,$q);
    $i=0;
    while($rows=mysqli_fetch_array($qrun)){
      if($i==0) echo ' 
    <div class="carousel-item active " data-interval="2000">
      <img src="../'.$rows[image].'" class="d-block w-100" alt="'.$rows[alt].'">
    </div>
';
else echo ' 
<div class="carousel-item ">
  <img src="../'.$rows[image].'" class="d-block w-100" alt="'.$rows[alt].'">
</div>
';
$i++;
}
?>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleFade" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleFade" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>