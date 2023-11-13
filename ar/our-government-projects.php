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
        <h2 class="main-color text-center">المشاريع الحكومية و السياحية</h2>

    <div class="container">
        <div class="row">
            
        <?php
    $qs="SELECT * FROM `tour_gover` ORDER BY `id` DESC";
    $qruns=mysqli_query($connection,$qs);
    while($rowss=mysqli_fetch_array($qruns)){
    echo '
             <div class="col-lg-4 col-12 pt-4">
                <div class="card text-right">
                    <a href="gov-project.php?pro='.$rowss[name].'">
                        <img src="../'.$rowss[cover].'" class="card-img-top" alt="'.$rowss[name].'">
                        <div class="card-body">
                            <h5 class="card-title main-color">'.$rowss[arname].'</h5>
                            <p class="card-text text-dark">'.substr($rowss[ardescrip],0,100).'</p>
                        </div>
                    </a>
                </div>
            </div>               
        ';
    }
    ?>
            
        
        
        </div>
    </div>
    </section>
<?php require 'footer.php';?>