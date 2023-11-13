<?php
require "panel/production/db.php";
$proName= $_GET[pro];
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
    $qs="SELECT * FROM `tour_gover` WHERE `name`='$proName'";
    $qruns=mysqli_query($connection,$qs);
    while($rowss=mysqli_fetch_array($qruns)){
        $id = $rowss[id];
        $enname = $rowss[name];
        $arname = $rowss[arname];
        $enplace = $rowss[place];
        $arplace = $rowss[arplace];
        $endescrip = $rowss[ardescrip];
        $ardescrip = $rowss[descrip];
        $cover = $rowss[cover];
        $auth = $rowss[auth];
        $arauth = $rowss[arauth];
        $value = $rowss[value];
      }
?>
<?php require 'head.php';?>
<?php require 'nav.php';?>
<section class="container-fluid">
    <div class="row">
    <img src="<?php echo $cover;?>" class="col-12 p-0 img-fluid pro-cover">
        </div>
</section>
<!--
<section class="tabs-container p-5">
    <div class="container">
        <div class="row">
            <div class="tab-box col-12">
                <div class="row">
                    <div class="col-4 tab-head">
                        <div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                            <a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#v-pills-home" role="tab" aria-controls="v-pills-home" aria-selected="true">Name</a>
                            <a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Location</a>
                            <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Contacting authority</a>
                        </div>
                    </div>
                    <div class="col-8" style="background-color: #76D898;">
                        <div class="tab-content border-1" id="v-pills-tabContent">
                            <div class="tab-pane fade show active" id="v-pills-home" role="tabpanel" aria-labelledby="v-pills-home-tab"><?php echo $enname;?></div>
                            <div class="tab-pane fade" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab"><?php echo $enplace;?></div>
                            <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab"><?php echo $auth;?></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
-->
<section class="container-fluid sec-bg p-5">
    <div class="title text-center main-color pb-3">
        <h2 class="text-center"><?php echo $enname;?></h2>
    </div>
    <div class="details"><?php echo $ardescrip;?></div>
</section>

<section class="news-pro">
      <div class="container">
        <h3 class="h3 title text-center main-color p-5">News</h3>
        <div class="row">
            <div class="col-md-12">
                <div id="news-slider8" class="owl-carousel">
                    <?php
    $qs="SELECT * FROM `articles` WHERE `proid`='$id'";
$qr=mysqli_query($connection,$qs);
while($r=mysqli_fetch_array($qr)){
echo '
                    <div class="post-slide8">
                        <div class="post-img">
                            <img src="'.$r[cover].'" alt="">
                        </div>
                        <div class="post-content">
                            <h3 class="post-title">
                                <a href="harticle.php?article='.$r[id].'">'.$r[entitle].'</a>
                            </h3>
                            <p class="post-description">
                                '.$r[encontent].'
                            </p>
                            <a href="article.php?article='.$r[id].'" class="read-more">read more</a>
                        </div>
                    </div>

';
}
    
    ?>
                </div>
            </div>
        </div>
    </div>
    
</section>


<section class="oth_slider phase-pro">
      
    <div class="container">
        <h3 class="h3 title text-center main-color p-5">Phases</h3>
        <div class="row">
            <div class="col-md-12">
                <div id="news-slider12" class="owl-carousel">
<?php
$qs="SELECT * FROM `phases` WHERE `proid`='$id'";
$qr=mysqli_query($connection,$qs);
while($r=mysqli_fetch_array($qr)){
echo '<div class="post-slide12">
    <div class="post-img">
        <span class="over-layer"></span>
        <img src="'.$r[cover].'" alt="">
    </div>
    <div class="post-review">
        <h3 class="post-title"><a href="phase.php?article='.$r[id].'">"'.$r[entitle].'"</a></h3>
        <div class="post-description">"'.substr($r[encontent],0,50).'"</div>
    </div>
</div>
';}
?>
                </div>
            </div>
        </div>
    </div>

                    </section>

<section class="oth-proj text-center pb-4 main-bg">
    <div class="container">
        <div class="title pt-3 pb-3"><h2>Other Project</h2></div>
        <div class="row">
            
            <?php 
                $qs="SELECT * FROM `tour_gover` WHERE `name`!='$proName' LIMIT 4";
    $qruns=mysqli_query($connection,$qs);
    while($rowss=mysqli_fetch_array($qruns)){
        echo '
            <div class="col-lg-3 col-md-3 col-12  ">
                <div class="oth-project-box">
                    <img src="'.$rowss[cover].'" class="rounded-circle">
                    <h5 class="p-2">'.$rowss[name].'</h5>
                    <a href="gov-project.php?pro='.$rowss[name].'" class="btn btn-success">Read More</a>
                </div>
            </div>
            
            ';
    }
            ?>
            
        </div>
    </div>
</section>

<?php require 'footer.php';?>