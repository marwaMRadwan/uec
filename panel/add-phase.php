<?php 
  require "db.php";
  require "functions.php";
session_start();
if(empty($_SESSION['id'])) header ('Location:index.php?error=Please Login');
if($_GET[pro]=="") header('Location:manage-tour_hous.php');
if(!$_GET[pro]){ header('Location:manage-tour_hous.php');}
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $entitle=check($_POST['entitle']);
    $artitle=check($_POST['artitle']);
    $video=check($_POST["video"]);
    $encontent=check($_POST["encontent"]);
    $arcontent=check($_POST["arcontent"]);
	$proid=$_GET[pro];
    $img_name=$_FILES['cover']['name'];
    $img_size=$_FILES['cover']['size'];
    $img_tmp=$_FILES['cover']['tmp_name'];
    $img_ext=strtolower(end(explode('.',$img_name)));
    $avl_ext=array('jpg','png','jpeg');
    if($img_size>524288) $error['cover']="image too large";
    if(!in_array($img_ext,$avl_ext))  $error['cover'].="invalid extension";
    if(empty( $error['cover'])){
    $time = microtime(true)*10000;
    $img="images/phases/".$time.".".$img_ext;
    move_uploaded_file($img_tmp,'../../'.$img);
    }
}
if(isset($error)){
    foreach($error as $e) $msg.=$e."<br>";
}
else{
    $sql="INSERT INTO `phases`(`id`, `entitle`, `artitle`, `video`,
     `cover`, `encontent`, `arcontent`, `proid`) VALUES (null,'$entitle','$artitle','$video','$img','$encontent','$arcontent','$proid')";
    if(mysqli_query($connection,$sql)) {
        $msg= "Added";  
		header('Location:manage-phase.php?pro='.$_GET[pro]);
	}
}
require 'head.php';?>
<!-- Add Employee Form -->
 <div class="right_col" role="main">
 	<div class="">
    	<div class="page-title">
        	<div class="title_left">
            	<h3>Add Project Phase</h3>
          	</div>
   		</div>
        <div class="clearfix"></div>
    	<div class="row">
        	<div class="col-md-12 col-sm-12 col-xs-12">
           		<div class="x_panel">
                	<div class="x_title">
						<h2>Project Phase</h2>
						<ul class="nav navbar-right panel_toolbox">
							<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
						</ul>
						<div class="clearfix"></div>
              		</div>
                  <div class="x_content">
                  <h3><?php echo $msg;?></h3>
<form class="form-horizontal form-label-left" novalidate enctype="multipart/form-data" method="post">
<div class="item form-group">
	<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Phase Name <span class="required">*</span></label>
    <div class="col-md-6 col-sm-6 col-xs-12">
    	<input id="name" class="form-control col-md-7 col-xs-12" name="entitle" placeholder="Phase Name" required="required" type="text">
	<br><br>
    	<input id="name" class="form-control col-md-7 col-xs-12" name="artitle" placeholder="اسم المرحلة" required="required" type="text">
	</div>
</div>
<div class="item form-group">
	<label class="control-label col-md-3 col-sm-3 col-xs-12" for="website">Video <span class="required">*</span></label>
	<div class="col-md-6 col-sm-6 col-xs-12">
    	<input type="url" id="website" name="video" placeholder="video url" class="form-control col-md-7 col-xs-12">
    </div>
</div>
<div class="item form-group">
	<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Project Image <span class="required">*</span></label>
    <div class="col-md-6 col-sm-6 col-xs-12">
    	<input id="image" class="form-control col-md-7 col-xs-12" name="cover" placeholder="صورة" required="required" type="file">
    </div>
</div>
<div class="item form-group">
 	<label class="control-label col-md-3 col-sm-3 col-xs-12" for="textarea">content english <span class="required">*</span></label>
    <div class="col-md-6 col-sm-6 col-xs-12">
    	<textarea id="textarea" required="required" name="encontent" class="form-control col-md-7 col-xs-12" placeholder="content"
         rows="50" id="tempalte"></textarea><br><br><br>
    </div>
</div>
 
<div class="item form-group">
 	<label class="control-label col-md-3 col-sm-3 col-xs-12" for="textarea">content arabic <span class="required">*</span></label>
    <div class="col-md-6 col-sm-6 col-xs-12">
    	<textarea id="textarea" required="required" name="arcontent" class="form-control col-md-7 col-xs-12" placeholder="محتوى"></textarea><br><br><br>
    </div>
</div>
    
        	

<div class="ln_solid"></div>
<div class="form-group">
	<div class="col-md-6 col-md-offset-3">
   		<input type="submit" id="send" class="btn btn-success" value="Submit">
    </div>
</div>
</form>
</div></div></div></div></div></div>
<script src="../vendors/jquery/dist/jquery.min.js"></script>
<script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="../vendors/fastclick/lib/fastclick.js"></script>
<script src="../vendors/nprogress/nprogress.js"></script>
<script src="../vendors/validator/validator.js"></script>
<script src="../build/js/custom.min.js"></script>
<script src="script.js"></script>

</body></html>