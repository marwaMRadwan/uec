<?php
require "db.php";
require "functions.php";
session_start();
if(empty($_SESSION['id'])) header ('Location:index.php?error=Please Login');

    if($_SERVER["REQUEST_METHOD"] == "POST") {
        
  	$sql="UPDATE `maindata` SET 
	  `slogan`='$_POST[slogan]',
	  `arslogan`='$_POST[arslogan]',
	  `chairman`='$_POST[chairman]',
	  `archairman`='$_POST[archairman]',
	  `video`='$_POST[video]',
	  `phone`='$_POST[phone]',
	  `hotline`='$_POST[hotline]',
	  `address`='$_POST[address]',
	  `araddress`='$_POST[araddress]'";
        echo $sql;
        if(mysqli_query($connection,$sql)) {
        $msg= "Updated";

        }
        else echo mysqli_error($connection);
   }

?>


<?php require 'head.php';?>
<!-- Add Employee Form -->
 <div class="right_col" role="main">
 	<div class="">
    	<div class="page-title">
        	<div class="title_left">
            	<h3>Our Data</h3>
          	</div>
   		</div>
        <div class="clearfix"></div>
    	<div class="row">
        	<div class="col-md-12 col-sm-12 col-xs-12">
           		<div class="x_panel">
                	<div class="x_title">
						<h2>Company Info</h2>
						<ul class="nav navbar-right panel_toolbox">
							<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
						</ul>
						<div class="clearfix"></div>
              		</div>
                  <div class="x_content">
                   		<?php
                       $q="SELECT * FROM `maindata`";
                       $qrun=mysqli_query($connection,$q);
                       while($rows=mysqli_fetch_array($qrun)){
                       echo ' 
              
<form class="form-horizontal form-label-left" novalidate method="post">
<div class="item form-group">
	<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Slogan <span class="required">*</span></label>
    <div class="col-md-6 col-sm-6 col-xs-12">
    	<input id="slogan" class="form-control col-md-7 col-xs-12" name="slogan" placeholder="slogan" required="required" type="text" value="'.$rows[slogan].'">
	</div>
</div>
<div class="item form-group">
	<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">ِArabic Slogan <span class="required">*</span></label>
    <div class="col-md-6 col-sm-6 col-xs-12">
    	<input id="slogan" class="form-control col-md-7 col-xs-12" name="arslogan" placeholder="arabic slogan" required="required" type="text" value="'.$rows[arslogan].'">
	</div>
</div>
<div class="item form-group">
	<label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Chairman\'s speech<span class="required">*</span></label>
    <div class="col-md-6 col-sm-6 col-xs-12">
    	<textarea id="chairman" required="required" class="form-control" name="chairman" data-parsley-trigger="keyup">'.$rows[chairman].'</textarea>
  	</div>
</div>
<div class="item form-group">
	<label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Arabic Chairman\'s speech<span class="required">*</span></label>
    <div class="col-md-6 col-sm-6 col-xs-12">
    	<textarea id="chairman" required="required" class="form-control" name="archairman" data-parsley-trigger="keyup">'.$rows[archairman].'</textarea>
  	</div>
</div>
<div class="item form-group">
	<label class="control-label col-md-3 col-sm-3 col-xs-12" for="video">Company Video <span class="required"></span></label>
	<div class="col-md-6 col-sm-6 col-xs-12">
    	<input id="video" type="url" name="video" class="optional form-control col-md-7 col-xs-12" value="'.$rows[video].'">
   	</div>
</div>
<div class="item form-group">
	<label class="control-label col-md-3 col-sm-3 col-xs-12" for="address"> address <span class="required"></span></label>
	<div class="col-md-6 col-sm-6 col-xs-12">
    	<input id="address" type="text" name="address" class="optional form-control col-md-7 col-xs-12" value="'.$rows[address].'">
   	</div>
</div>
<div class="item form-group">
	<label class="control-label col-md-3 col-sm-3 col-xs-12" for="address"> Arabic address <span class="required"></span></label>
	<div class="col-md-6 col-sm-6 col-xs-12">
    	<input id="ar-address" type="text" name="araddress" class="optional form-control col-md-7 col-xs-12" value="'.$rows[araddress].'">
   	</div>
</div>
<div class="item form-group">
	<label class="control-label col-md-3 col-sm-3 col-xs-12" for="phone"> phone <span class="required"></span></label>
	<div class="col-md-6 col-sm-6 col-xs-12">
    	<input id="phone" type="text" name="phone" class="optional form-control col-md-7 col-xs-12" value="'.$rows[phone].'">
   	</div>
</div>
<div class="item form-group">
	<label class="control-label col-md-3 col-sm-3 col-xs-12" for="hotline"> Hotline <span class="required"></span></label>
	<div class="col-md-6 col-sm-6 col-xs-12">
    	<input id="hotline" type="text" name="hotline" class="optional form-control col-md-7 col-xs-12" value="'.$rows[hotline].'">
   	</div>
</div>
<div class="ln_solid"></div>
<div class="form-group">
	<div class="col-md-6 col-md-offset-3">
   		<input type="submit" id="send" class="btn btn-success" value="Edit">
    </div>
</div>
</form>';}?>
</div></div></div></div></div></div>
<script src="../vendors/jquery/dist/jquery.min.js"></script>
<script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="../vendors/fastclick/lib/fastclick.js"></script>
<script src="../vendors/nprogress/nprogress.js"></script>
<script src="../vendors/validator/validator.js"></script>
<script src="../build/js/custom.min.js"></script>
</body></html>