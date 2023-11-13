<?php 
  require "db.php";
  require "functions.php";

	session_start();
if(empty($_SESSION['id'])) header ('Location:index.php?error=Please Login');
if(!$_GET[unit]){ header('Location:manage-floors.php');}
if($_SERVER["REQUEST_METHOD"] == "POST"){
	$unitid=$_GET[unit];
	$floor=$_post[floor];
    $price = $_POST['price'];
    $area = $_POST['area'];
    $location = $_POST['location'];
    if(isset($error)){
        foreach($error as $e) $msg.=$e."<br>";
    }
    else{
$sql="UPDATE `units` SET `floor`='$floor',`location`='$location',`area`='$area',`price`='$price' WHERE `id`='$unitid'";
        if(mysqli_query($connection,$sql)) {
        $msg= "Edited";
        }

}
}
require 'head.php';?>
<!-- Add Employee Form -->
 <div class="right_col" role="main">
 	<div class="">
    	<div class="page-title">
        	<div class="title_left">
            	<h3>Add Unit</h3>
          	</div>
   		</div>
        <div class="clearfix"></div>
    	<div class="row">
        	<div class="col-md-12 col-sm-12 col-xs-12">
           		<div class="x_panel">
                	<div class="x_title">
						<h2>Add Unit</h2>
						<ul class="nav navbar-right panel_toolbox">
							<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
						</ul>
						<div class="clearfix"></div>
              		</div>
                  <div class="x_content">
                  <h3><?php echo $msg;?></h3>
<?php
                  $q="SELECT * FROM `units` WHERE `id`='$_GET[unit]'";
$qrun=mysqli_query($connection,$q);
while($rows=mysqli_fetch_array($qrun)){
echo ' 


<form class="form-horizontal form-label-left" novalidate enctype="multipart/form-data" method="post">
    <div class="item form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">floor <span class="required">*</span></label>
    <div class="col-md-6 col-sm-6 col-xs-12">
    <input id="name" class="form-control col-md-7 col-xs-12"  name="floor" value="'.$rows[floor].'" required="required" type="text" readonly>
</div>
</div>
<div class="item form-group">
<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Area <span class="required">*</span></label>
<div class="col-md-6 col-sm-6 col-xs-12">
<input id="name" class="form-control col-md-7 col-xs-12" name="area" placeholder="Area" required="required" type="number"  value="'.$rows[area].'">
</div>
</div>
<div class="item form-group">
<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Meter Price <span class="required">*</span></label>
<div class="col-md-6 col-sm-6 col-xs-12">
<input id="name" class="form-control col-md-7 col-xs-12" name="price" placeholder="price per meter" required="required" type="number"  value="'.$rows[price].'">
</div>
</div>
<div class="item form-group">
<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Unit Location <span class="required">*</span></label>
<div class="col-md-6 col-sm-6 col-xs-12">
<input id="name" class="form-control col-md-7 col-xs-12"  name="location" placeholder="Unit Location" required="required" type="text"  value="'.$rows[location].'">
</div>
</div>
    

<div class="ln_solid"></div>
<div class="form-group">
	<div class="col-md-6 col-md-offset-3">
   		<input type="submit" id="send" class="btn btn-success" value="Submit">
    </div>
</div>
</form>';}
?>
</div></div></div></div></div></div>
<script src="../vendors/jquery/dist/jquery.min.js"></script>
<script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="../vendors/fastclick/lib/fastclick.js"></script>
<script src="../vendors/nprogress/nprogress.js"></script>
<script src="../vendors/validator/validator.js"></script>
<script src="../build/js/custom.min.js"></script>
</body></html>