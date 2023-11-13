<?php
require "../panel/production/db.php";
$q="SELECT * FROM `maindata`";
$qrun=mysqli_query($connection,$q);
while($rows=mysqli_fetch_array($qrun)){
    $slogan = $rows[slogan];
    $arslogan = $rows[arslogan];
    $chairman = $rows[chairman];
    $archairman = $rows[archairman];
    $video=$rows[video];
    $phone = $rows[phone];
    $hotline = $rows[hotline];
    $address = $rows[address];
    $araddress = $rows[araddress];
}
?>
<?php require 'head.php';?>
<?php require 'nav.php';?>
<?php require 'slider.php';?>
<section id="about" class="container-fluid sec-bg">
    <div class="container row py-5">
        <article class="col-md-5 col-12 p-5">
            <div class="about-img main-bg">
                <img src="images/logo-08.png" class="img-fluid" style="width:100%;height:100%">
            </div>
        </article>
        <article class="col-md-7 col-12">
            <p class="p-font sec-color text-right"><?php echo $archairman;?></p>
            <p class="h4 main-color">المهندس وليد أحمد - صاحب الشركة</p>
        </article>
    </div>
</section>

<section class="container-fluid section-container mt-5 p-5 text-center">
      <div class="row">
        <div class="title main-color pb-5 text-center">
            <h2 class="text-center">الوحدات المتاحة</h2>
        </div>
    </div>
          <div class="row">

<?php
$q="SELECT * FROM `units`";
$qrun=mysqli_query($connection,$q);
while($row=mysqli_fetch_array($qrun)){
echo '
<div class="col-md-3 col-12">
    <div class="card-head">
        <h3>الوحدة: '.$row[unitNum].'</h3>
    </div>
    <div class="card-details mt-0 ">';
        $qs="SELECT * FROM `units-imgs` WHERE `unit`='$row[id]'";
        $qr=mysqli_query($connection,$qs);
        if($r=mysqli_fetch_array($qr)){
        echo '
    <a href="../'.$r[image].'?image='.$r[id].'" data-toggle="lightbox" data-gallery="gallery1" class="col-md-3 col-12 pt-3 p-0">
      <img src="../'.$r[image].'?image='.$r[id].'" class="img-fluid rounded">
    </a>';
        
        }
        echo '<ul class="mt-2">';
    
    $qp="SELECT * FROM `housing` WHERE `id`='$row[project]'";
    $qrp=mysqli_query($connection,$qp);
    while($rp=mysqli_fetch_array($qrp)){
echo ' <li><span>المشروع : </span> '.$rp[arname].'</li>';
      }
            echo '
            <li><span class="font-weight-bold">الدور : </span> '.$row[floor].' ('.$row[location].')</li>
            <li><span>المساحة : </span> '.$row[area].' m<sup>2</sup></li>
            <li><span>سعر المتر بالوحدة : </span> '.$row[price].'</li>
            <li><span>حالة الوحدة : </span> ';
            if($row[status]==0)  echo 'متاحة';
            if($row[status]==1)  echo 'تم بيعها';
            if($row[status]==2)  echo 'حجز مؤقت';
            echo '</li>
            </ul>
    </div>
    <div class="card-foot mb-5"></div>
    </div>';
}
?>        
        </div>
</section>

<section class="slide1 p-5">
    <section class="news-pro">
      <div class="container">
        <h3 class="h3 title text-center main-color p-5">المشاريع السكنية</h3>
        <div class="row">
            <div class="col-md-12">
                <div id="news-slider8" class="owl-carousel" style="direction:ltr;">
                    <?php
    $qs="SELECT * FROM `housing` ORDER BY `id` DESC LIMIT 20";
    $qruns=mysqli_query($connection,$qs);
    while($rowss=mysqli_fetch_array($qruns)){
    echo '
                    
                <div class="post-slide8">
                        <div class="post-img">
                            <img src="../'.$rowss[cover].'" alt="">
                        </div>
                        <div class="post-content">
                            <h3 class="post-title">
                                <a href="project.php?pro='.$rowss[enname].'">'.$rowss[arname].'</a>
                            </h3>
                            <p class="post-description">
                                '.substr($r[arcontent],0,40).'
                            </p>
                            <a href="project.php?pro='.$rowss[enname].'" class="read-more">المزيد</a>
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

    
</section>


<section class="container-fluid position-relative bg-slogan">
    <div class="position-absolute op"></div>
    <div class="position-absolute p-5 text-center h2">
        <?php echo $arslogan;?>
    </div>
</section>

<section class="p-5">
    <h2 class="main-color text-center">المشاريع السياحية و الحكومية</h2>
    <table class="container text-center" width="100%" cellpadding="0" cellspacing="0" style="max-width:600px;margin:0 auto;direction:ltr">
        <tr>
            <td style="line-height:20px;height:20px;" height="20">&nbsp;</td>
        </tr>
        <tr>
            <td align="center" style="text-align: center; vertical-align: top; font-size: 0;">
                <article id="slider">	
	               <input checked type="radio" name="slider" id="slide1" style="display:none !important;height:0;width:0;font-size:0;line-height:0;float:left;overflow:hidden;" />
	               <input type="radio" name="slider" id="slide2" style="display:none !important;height:0;width:0;font-size:0;line-height:0;float:left;overflow:hidden;"/>
	               <input type="radio" name="slider" id="slide3" style="display:none !important;height:0;width:0;font-size:0;line-height:0;float:left;overflow:hidden;" />
	               <input type="radio" name="slider" id="slide4" style="display:none !important;height:0;width:0;font-size:0;line-height:0;float:left;overflow:hidden;" />article
	               <input type="radio" name="slider" id="slide5" style="display:none !important;height:0;width:0;font-size:0;line-height:0;float:left;overflow:hidden;" />
	               <div id="slides">	
		              <div id="overflow">			
			             <div class="inner">
<?php
    $qs="SELECT * FROM `tour_gover` ORDER BY `id` DESC LIMIT 5";
    $qruns=mysqli_query($connection,$qs);
    while($rowss=mysqli_fetch_array($qruns)){
    echo '
                            <article>
                                <a href="gov-project.php?pro='.$rowss[name].'" style="text-decoration:none;color:#333333;"><div class="info" style="color:#333333;font-family: Verdana, Geneva, sans-serif;text-align: left;font-size: 14px;line-height:25px;padding:0; text-transform:uppercase;-webkit-text-size-adjust:none;">
                                <h3 style="margin:0;padding:0;font-weight: normal;font-style: normal;font-size:22px;" class="main-color"> '.$rowss[arname].'</span></h3></div></a>
                                <a href="gov-project.php?pro='.$rowss[name].'" style="text-decoration:none;color:#666666;">
                                <img src="../'.$rowss[cover].'" style="display:block; margin:0 auto;border:0;" alt="Highlight 1" />
                                <span class="noWebkit" style="line-height:20px;height:20px;">
                                <br/>&nbsp;<br/></span></a>
				            </article>
        ';
    }
    ?>

						</div>				
					</div>		
				</div>	
				<div id="controls">
					<label for="slide1"></label>
					<label for="slide2"></label>
					<label for="slide3"></label>
					<label for="slide4"></label>			
					<label for="slide5"></label>
				</div>
				<div id="active">
					<label for="slide1"></label>
					<label for="slide2"></label>
					<label for="slide3"></label>
					<label for="slide4"></label>
					<label for="slide5"></label>			
				</div>	
			</article> 			
            </td>
        </tr>
    </table>

</section>

<section id="videos">
	<div class="container">
    	<h2 class="text-center mb-5">
            <span class="thrid-bg text-white px-5 pb-2 mt-0 ser">
                خدمتنا
            </span>
        </h2>
        <div class="video">
            <iframe width="100%" height="500" 
            src="<?php echo $video; ?>" frameborder="0" 
            allow="accelerometer; autoplay; encrypted-media; 
            gyroscope; picture-in-picture" allowfullscreen>
            </iframe>
        </div>
    </div>
</section>

<section class="gallery container-fluid p-5 sec-bg">
    <h2 class="main-color text-center">معرض الصور</h2>
    <div class="container">
        <div class="row">
<?php
$qs="SELECT * FROM `housing` ORDER BY RAND() LIMIT 8";
$qruns=mysqli_query($connection,$qs);
while($rowss=mysqli_fetch_array($qruns)){
echo '
    <a href="../'.$rowss[cover].'?image='.$rowss[id].'" data-toggle="lightbox" data-gallery="gallery" class="col-md-3 col-12 pt-3">
      <img src="../'.$rowss[cover].'?image='.$rowss[id].'" class="img-fluid rounded">
    </a>
 ';   
}
?>
        </div>
    </div>
</section>

<section id="contact" class="container-fluid main-bg p-5">
    <h2 class="text-center main-color p-2">
        على تواصل معنا
    </h2>
    <div class="row">
        <div class="col-md-5 col-12 align-items-center">
            <div class="col-8 offset-2 mb-4 thrid-bg p-1 text-center text-white">
                <h3>التلفون</h3>
                <p><?php echo $phone;?></p>
            </div>
            <div class="col-8 offset-2 mb-4 thrid-bg p-1 text-center text-white">
                <h3>الخط الساخن</h3>
                <p><?php echo $hotline;?></p>
            </div>
            <div class="col-8 offset-2 mb-4 thrid-bg p-1 text-center text-white">
                <h3>العنوان</h3>
                <p><?php echo $araddress;?> </p>
            </div>
        </div>
        <div class="col-md-6 col-12 ">
        <iframe 
        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3455.1927094075536!2d31.456684215114127!3d30.002622481897586!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zMzDCsDAwJzA5LjQiTiAzMcKwMjcnMzEuOSJF!5e0!3m2!1sen!2seg!4v1574454952698!5m2!1sen!2seg" 
        width="100%" height="100%" frameborder="0" style="border:0;" 
        allowfullscreen=""></iframe>
        </div>
    </div>
    <h2 class="text-center main-color p-5">ننتظر رايك</h2>
    <div class="container" id="result"></div>
    <form class="container" id="my_form_id">
    <div class="form-row">
    <div class="col">
      <input type="text" class="form-control" placeholder="الاسم" id="name">
    </div>
    <div class="col">
      <input type="email" class="form-control" placeholder="البريد الاليكترونى" id="email">
    </div>
        </div>
            <div class="form-row py-3">

        <div class="col">
      <input type="text" class="form-control" placeholder="التليفون 1" id="phone1">
    </div>
    <div class="col">
      <input type="text" class="form-control" placeholder="التليفون 2" id="phone2">
    </div>
  </div>
  <div class="form-row ">
    <div class="col">
        <textarea class="form-control" rows="4" placeholder="اترك رسالتك هنا" id="message"></textarea>
    </div>
</div>
    <div class="form-row py-1">
        <div class="col-md-3 col-8 ml-auto">
            <input type="submit" class="form-control" value="ارسال">
        </div>
    </div>
</form>
</section>


    <script src="https://code.jquery.com/jquery-3.4.1.min.js" integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo=" crossorigin="anonymous"></script>
    <script>
        $(document).ready(function(){
            $('#my_form_id').on('submit', function(e){
                //Stop the form from submitting itself to the server.
                e.preventDefault();
                var name = $('#name').val();
                var email = $('#email').val();
                var message = $('#message').val();
                var phone2 = $('#phone2').val();
                var phone1 = $('#phone1').val();
                console.log( $("#my_form_id").serialize());
                $.post('contact_action.php', {
                        name:name,
                        email:email,
                        message:message,
                        phone1:phone1,
                        phone2:phone2
                    },
                    function(data,status){
                        $('#result').html(data);
                        $('#my_form_id')[0].reset();
                    }
                );
            });
        });
    </script>

<?php require 'footer.php';?>