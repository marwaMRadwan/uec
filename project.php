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
    $qs="SELECT * FROM `housing` WHERE `enname`='$proName'";
    $qruns=mysqli_query($connection,$qs);
    while($rowss=mysqli_fetch_array($qruns)){
        $id = $rowss[id];
        $enname = $rowss[enname];
        $arname = $rowss[arname];
        $enplace = $rowss[enplace];
        $arplace = $rowss[arplace];
        $partnum = $rowss[partnum];
        $endescrip = $rowss[endescrip];
        $ardescrip = $rowss[ardescrip];
        $floors = $rowss[floors];
        $garage = $rowss[garage];
        $grageprice = $rowss[grageprice];
        $cover = $rowss[cover];
        $brochure = $rowss[brochure];
        $auth = $rowss[auth];
        $areaNum = $rowss[areaNum];
        $areaText = $rowss[areaText];
        $code = $rowss[code];
        $bahry = $rowss[bahry];
        $shary = $rowss[shary];
        $ably = $rowss[ably];
        $grby = $rowss[grby];
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
<section class="container-fluid  sec-bg p-5">
    <div class="title text-center main-color pb-3">
        <h2 class="text-center"><?php echo $enname;?></h2>
    </div>
    <div class="details"><?php echo $ardescrip;?></div>
    <div class="text-center p-3"><a href="<?php echo $brochure; ?>" target="_blank" class="btn btn-success">Project Bourchure</a></div>
</section>
<section class="news-pro">
      <div class="container">
        <h3 class="h3 title text-center main-color p-5">News</h3>
        <div class="row">
            <div class="col-md-12">
                <div id="news-slider8" class="owl-carousel">
                    <?php
    $qs="SELECT * FROM `h_articles` WHERE `proid`='$id'";
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
                                '.substr($r[encontent],0,40).'
                            </p>
                            
                            <a href="harticle.php?article='.$r[id].'" class="read-more">read more</a>
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
<section class="oth_slider phase-pro src-bg">
      
    <div class="container">
        <h3 class="h3 title text-center main-color p-5">Phases</h3>
        <div class="row">
            <div class="col-md-12">
                <div id="news-slider12" class="owl-carousel">
<?php
$qs="SELECT * FROM `h_phases` WHERE `proid`='$id'";
$qr=mysqli_query($connection,$qs);
while($r=mysqli_fetch_array($qr)){
echo '<div class="post-slide12">
    <div class="post-img">
        <span class="over-layer"></span>
        <img src="'.$r[cover].'" alt="">
    </div>
    <div class="post-review">
        <h3 class="post-title"><a href="hphase.php?article='.$r[id].'">"'.$r[entitle].'"</a></h3>
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
<section class="container-fluid section-container mt-5 p-5 text-center">
      <div class="row">
        <div class="title main-color pb-5 text-center">
            <h2 class="text-center">Project Units</h2>
        </div>
    </div>
          <div class="row">

<?php
$q="SELECT * FROM `units` WHERE `project`='$id'";
$qrun=mysqli_query($connection,$q);
while($row=mysqli_fetch_array($qrun)){
echo '
    <div class="col-md-3 col-12">
        <div class="card-head">
            <h3>Unit: '.$row[unitNum].'</h3>
        </div>
        <div class="card-details mt-0 ">';
$qs="SELECT * FROM `units-imgs` WHERE `unit`='$row[id]'";
$qr=mysqli_query($connection,$qs);
if($r=mysqli_fetch_array($qr)){
echo '
            <img src="'.$r[image].'">
        ';}
        echo '
            <ul class="mt-2">
                <li><span class="font-weight-bold">Floor : </span> '.$row[floor].' ('.$row[location].')</li>
                <li><span>AREA : </span> '.$row[area].' m<sup>2</sup></li>
                <li><span>PRICE PER METER : </span> '.$row[price].'</li>
                <li><span>Status : </span> 
        ';
                     if($row[status]==0)  echo 'Available';
                     if($row[status]==1)  echo 'Paid';
                     if($row[status]==2)  echo 'Hold';

        echo '
                </li>
            </ul>
        </div>
        <div class="card-foot mb-5">
        </div>
        <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">Modal title</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    </div>
                    <div class="modal-body">
                        <form style="width:100%">
                            <div class="row">
                                <div class="col-lg-4 col-md-4 col-6">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon1"><i class="far fa-user"></i></span>
                                        </div>
                                        <input type="text" class="form-control" id="name" name="name" placeholder="Enter Name" aria-label="Username" aria-describedby="basic-addon1">
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-6">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon2"><i class="fas fa-at"></i></span>
                                        </div>
                                        <input type="text" class="form-control" id="email" name="email" placeholder="Enter email" aria-label="Username" aria-describedby="basic-addon2">
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-6">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon2"><i class="fas fa-phone"></i></span>
                                        </div>
                                        <input type="text" class="form-control" id="phone1" name="phone1" placeholder="Enter phone1" aria-label="Username" aria-describedby="basic-addon2">
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-6">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon2"><i class="fas fa-phone"></i></span>
                                        </div>
                                        <input type="text" class="form-control" id="phone2" name="phone2" placeholder="Enter phone2" aria-label="Username" aria-describedby="basic-addon2">
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-6">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon2"><i class="fas fa-american-sign-language-interpreting"></i></span>
                                        </div>
                                        <input type="text" class="form-control" id="role" name="role" placeholder="Unit Role" aria-label="Username" aria-describedby="basic-addon2">
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-6">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon2"><i class="fas fa-space-shuttle"></i></span>
                                        </div>
                                        <input type="text" class="form-control" id="space" name="space" placeholder="Unit Space" aria-label="Username" aria-describedby="basic-addon2">
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-6">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon2"><i class="fas fa-tape"></i></span>
                                        </div>
                                        <input type="text" class="form-control" id="type" name="type" placeholder="Unit Type" aria-label="type" aria-describedby="basic-addon2">
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-6">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon2"><i class="fas fa-city"></i></span>
                                        </div>
                                        <input type="text" class="form-control" id="city" name="city" placeholder="City" aria-label="city" aria-describedby="basic-addon2">
                                    </div>
                                </div>
                                <div class="col-lg-4 col-md-4 col-6">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon2"><i class="fas fa-dollar-sign"></i></span>
                                        </div>
                                        <input type="text" class="form-control" id="price" name="price" placeholder="Unit Price" aria-label="price" aria-describedby="basic-addon2">
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="basic-addon2"><i class="far fa-envelope-open"></i></span>
                                        </div>
                                        <textarea class="form-control" name="msg" placeholder="Enter Your Message" cols="5" aria-label="msg" aria-describedby="basic-addon2"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <input id="submit" type="submit" class="form-control" name="submit" value="Order Now">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>';
}
?>        
        </div>
</section>
<section class="oth-proj text-center pb-4">
    <div class="container">
        <div class="title pt-3 pb-3"><h2>Other Project</h2></div>
        <div class="row">
            
            <?php 
                $qs="SELECT * FROM `housing` WHERE `enname`!='$proName' LIMIT 4";
    $qruns=mysqli_query($connection,$qs);
    while($rowss=mysqli_fetch_array($qruns)){
        echo '
            <div class="col-lg-3 col-md-3 col-12  ">
                <div class="oth-project-box">
                    <img src="'.$rowss[cover].'" class="rounded-circle">
                    <h5 class="p-2">'.$rowss[enname].'</h5>
                    <a href="project.php?pro='.$rowss[enname].'" class="btn btn-success">Read More</a>
                </div>
            </div>
            
            ';
    }
            ?>
            
        </div>
    </div>
</section>
<?php require 'footer.php';?>