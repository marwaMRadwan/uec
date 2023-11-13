<?php 
  require "db.php";
  require "functions.php";
  session_start();
if(empty($_SESSION['id'])) 
    header ('Location:index.php?error=Please Login');
if($_SERVER["REQUEST_METHOD"] == "POST"){
  $imgealt=check($_POST['image-alt']);
  $img_name=$_FILES['cover']['name'];
  $img_size=$_FILES['cover']['size'];
  $img_tmp=$_FILES['cover']['tmp_name'];
  $img_ext=strtolower(end(explode('.',$img_name)));
  $avl_ext=array('jpg','png','jpeg');
  if($img_size>524288) $error['cover']="image too large";
  if(!in_array($img_ext,$avl_ext))  $error['cover'].="invalid extension";
  if(empty( $error['cover'])){
    $time = microtime(true)*10000;
    $img="images/slider/".$time.".".$img_ext;
    move_uploaded_file($img_tmp,'../../'.$img);
    }
  if(isset($error)){
    foreach($error as $e) $msg.=$e."<br>";
  }
  else{
    $sql="INSERT INTO `h_pro-imgs`(`id`, `image`, `alt`, `unit`) VALUES
    (null,'$img','$imagealt','$_GET[pro]')";
    if(mysqli_query($connection,$sql)) {
      $msg= "Added";
      header('Location:manage-housing.php');
    }
 }
}
require 'head.php';?>
<!-- Add Employee Form -->
 <div class="right_col" role="main">
 	<div class="">
    	<div class="page-title">
        	<div class="title_left">
            	<h3>Add Slide</h3>
          	</div>
   		</div>
        <div class="clearfix"></div>
    	<div class="row">
        	<div class="col-md-12 col-sm-12 col-xs-12">
           		<div class="x_panel">
                	<div class="x_title">
						<h2>Add Slide</h2>
						<ul class="nav navbar-right panel_toolbox">
							<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
						</ul>
						<div class="clearfix"></div>
              		</div>
                  <div class="x_content">
<form class="form-horizontal form-label-left" novalidate enctype="multipart/form-data" method="post">
<div class="item form-group">
	<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Slider Image <span class="required">*</span></label>
    <div class="col-md-6 col-sm-6 col-xs-12">
    	<input id="image" class="form-control col-md-7 col-xs-12" name="cover" required="required" type="file">
	</div>
</div>
<div class="item form-group">
	<label class="control-label col-md-3 col-sm-3 col-xs-12" for="occupation">Image Alt <span class="required"></span></label>
	<div class="col-md-6 col-sm-6 col-xs-12">
    	<input id="Alt" type="text" name="image-alt" data-validate-length-range="5,20" class="optional form-control col-md-7 col-xs-12">
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