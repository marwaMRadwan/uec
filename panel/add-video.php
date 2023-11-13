<?php 
  require "db.php";
  require "functions.php";
session_start();
if(empty($_SESSION['id'])) header ('Location:index.php?error=Please Login');
if($_GET[pro]=="") header('Location:manage-tour_hous.php');
if(!$_GET[pro]){ header('Location:manage-tour_hous.php');}

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $name=check($_POST['name']);
    $video=check($_POST["video"]);
    $proid=$_GET[pro];
	$sql="INSERT INTO `videos`(`id`, `name`, `video`, `proid`) 
	VALUES  (null,'$name','$video','$proid')";
    if(mysqli_query($connection,$sql)) {
		$msg= "Added";
		header('Location:manage-videos.php?pro='.$_GET[pro]);
	}
}
require 'head.php';?>
<!-- Add Employee Form -->
 <div class="right_col" role="main">
 	<div class="">
    	<div class="page-title">
        	<div class="title_left">
            	<h3>Add Project Video</h3>
          	</div>
   		</div>
        <div class="clearfix"></div>
    	<div class="row">
        	<div class="col-md-12 col-sm-12 col-xs-12">
           		<div class="x_panel">
                	<div class="x_title">
						<h2>Project Video</h2>
						<ul class="nav navbar-right panel_toolbox">
							<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
						</ul>
						<div class="clearfix"></div>
              		</div>
                  <div class="x_content">
                  <h3><?php echo $msg;?></h3>
<form class="form-horizontal form-label-left" novalidate method="post">
<div class="item form-group">
	<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Video Name <span class="required">*</span></label>
    <div class="col-md-6 col-sm-6 col-xs-12">
    	<input id="name" class="form-control col-md-7 col-xs-12"  name="name" placeholder="video Name" required="required" type="text">
	</div>
</div>
<div class="item form-group">
	<label class="control-label col-md-3 col-sm-3 col-xs-12" for="website">Video Link <span class="required">*</span></label>
	<div class="col-md-6 col-sm-6 col-xs-12">
    	<input type="url" id="website" name="video" placeholder="video url" class="form-control col-md-7 col-xs-12">
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
</body></html>