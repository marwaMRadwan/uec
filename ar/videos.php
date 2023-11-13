<?php require 'head.php';?>
<?php require 'nav.php';?>
<section class="video">
 <div class="container ">
 <h2 class="main-color text-center p-3">فيديوهات مصورة</h2>

     <div class="row">
      
      
      <?php
 require "../panel/production/db.php";
 
 $q="SELECT * FROM `videos`";
$qrun=mysqli_query($connection,$q);
while($rows=mysqli_fetch_array($qrun)){
  echo ' 
    <div class="col-md-6 col-12 p-3">
    <iframe width="100%" height="315" src="'.$rows[video].'" frameborder="0" allow="accelerometer; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
    </div>

  ';
}
?>
        </div>
    </div>
</section>
    <?php require 'footer.php';?>