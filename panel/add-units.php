<?php 
  require "db.php";
  require "functions.php";

	session_start();
if(empty($_SESSION['id'])) header ('Location:index.php?error=Please Login');
if($_GET[pro]=="" || $_GET[floor]=="") header('Location:manage-floors.php');
if(!$_GET[pro] || !$_GET[floor]){ header('Location:manage-floors.php');}
if($_SERVER["REQUEST_METHOD"] == "POST"){
	$proid=$_GET[pro];
	$floor=$_GET[floor];
    $price = $_POST['price'];
    $area = $_POST['area'];
    $location = $_POST['location'];
    $s="SELECT COUNT(`id`) AS `counter` FROM `units` WHERE `floor`='$floor' AND `project`='$proid'";
    $qs=mysqli_query($connection,$s);
    while($rs=mysqli_fetch_array($qs)){
        $c=$rs[counter]+1;
    }
    $unitNum = 'u-'.$floor.'-'.$c;
    if(isset($error)){
        foreach($error as $e) $msg.=$e."<br>";
    }
    else{
	$sql="INSERT INTO `units`(`id`, `project`, `floor`, `location`, `unitNum`, `area`, `price`,  `status`) VALUES (null,'$proid','$floor', '$location','$unitNum','$area','$price','0')";
    if(mysqli_query($connection,$sql)) {
        $msg= "Added";
        header('Location:manage-floors.php?pro='.$_GET[pro].'');
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
<form class="form-horizontal form-label-left" novalidate enctype="multipart/form-data" method="post">
<div class="item form-group">
<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">floor <span class="required">*</span></label>
<div class="col-md-6 col-sm-6 col-xs-12">
<input id="name" class="form-control col-md-7 col-xs-12"  name="floorNum" value="<?php echo $_GET[floor]?>" required="required" type="text" readonly>
</div>
</div>
<div class="item form-group">
<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Area <span class="required">*</span></label>
<div class="col-md-6 col-sm-6 col-xs-12">
<input id="name" class="form-control col-md-7 col-xs-12" name="area" placeholder="Area" required="required" type="number">
</div>
</div>
<div class="item form-group">
<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Meter Price <span class="required">*</span></label>
<div class="col-md-6 col-sm-6 col-xs-12">
<input id="name" class="form-control col-md-7 col-xs-12" name="price" placeholder="price per meter" required="required" type="number">
</div>
</div>
<div class="item form-group">
<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Unit Location <span class="required">*</span></label>
<div class="col-md-6 col-sm-6 col-xs-12">
<input id="name" class="form-control col-md-7 col-xs-12"  name="location" placeholder="Unit Location" required="required" type="text">
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