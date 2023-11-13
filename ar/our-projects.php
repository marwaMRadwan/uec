<?php
require "../panel/production/db.php";
$q="SELECT * FROM `maindata`";
$qrun=mysqli_query($connection,$q);
while($rows=mysqli_fetch_array($qrun)){
    $slogan = $rows[slogan];
    $arslogar = $rows[arslogan];
    $chairman = $rows[chairman];
    $archairman = $rows[archairman];
    $video=$rows[video];
    $phone = $rows[phone];
    $hotline = $rows[hotline];
    $address = $rows[address];
    $araddress = $rows[address];
}
?>
<?php require 'head.php';?>
<?php require 'nav.php';?>

<section class="projects ">
    <h2 class="main-color text-center">المشاريع السكنية</h2>
    <div class="container">
        <div class="row" style="justify-content:space-between">
            
        <?php
    $qs="SELECT * FROM `housing` ORDER BY `id` DESC";
    $qruns=mysqli_query($connection,$qs);
    while($rowss=mysqli_fetch_array($qruns)){
    echo '
    <div class="blog-card col-md-5 col-12 ">
    <div class="meta">
      <div class="photo" style="background-image: url(../'.$rowss[cover].')"></div>
      <ul class="details text-right">
        <li class="author">'.$rowss[arname].'</li>
        <li class="date">'.$rowss[arplace].'</li>
      </ul>
    </div>
    <div class="description text-right">
      <h2 class="main-color">'.$rowss[arname].'</h2>
      <div>'.substr($rowss[endescrip],0,80).'</div>
      <p class="read-more">
        <a href="project.php?pro='.$rowss[enname].'">المزيد</a>
      </p>
    </div>
  </div>
        ';
    }
    ?>
            
        
        
        </div>
    </div>
    </section>
<?php require 'footer.php';?>