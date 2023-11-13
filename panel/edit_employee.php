<?php 
  require "db.php";
  require "functions.php";
  session_start();
  if(empty($_SESSION['id'])) header ('Location:index.php?error=Please Login');
  if($_SERVER["REQUEST_METHOD"] == "POST"){
    $oldpassword=md5(check($_POST["oldpassword"]));
	$password=md5(check($_POST["password"]));
    $password2=md5(check($_POST["password2"]));
	$result=mysqli_query($connection,"SELECT * FROM `employees` WHERE `id`='$_SESSION[idedit]'");
      $data=mysqli_fetch_assoc($result);
	$emp=$data[username];
    if($oldpassword!=$data[pass]) $error="invalid old password";
    if(isset($error)){
         $msg=$error;
    }
    else{
        $sql="UPDATE `employees` SET `pass`='$password' WHERE `id`='$_SESSION[idedit]'";
        if(mysqli_query($connection,$sql)) {
		$msg= "Updated";
		header('Location:all-admin.php');
           }
    }}
require 'head.php';?>
<!-- Add Employee Form -->
 <div class="right_col" role="main">
 	<div class="">
    	<div class="page-title">
        	<div class="title_left">
            	<h3>Change Employee <?php echo $emp;?> Password</h3>
          	</div>
   		</div>
        <div class="clearfix"></div>
    	<div class="row">
        	<div class="col-md-12 col-sm-12 col-xs-12">
           		<div class="x_panel">
                	<div class="x_title">
						<h2>Change Employee Password</h2>
						<ul class="nav navbar-right panel_toolbox">
							<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
						</ul>
						<div class="clearfix"></div>
              		</div>
                 	<h3><?php echo $msg;?></h3>

                  <div class="x_content">
<form class="form-horizontal form-label-left" novalidate method="post">
<div class="item form-group">
	<label for="password" class="control-label col-md-3">Old Password</label>
    <div class="col-md-6 col-sm-6 col-xs-12">
    	<input id="password" type="password" name="oldpassword" data-validate- class="form-control col-md-7 col-xs-12" required="required">
    </div>
</div>
<div class="item form-group">
	<label for="password" class="control-label col-md-3">Password</label>
    <div class="col-md-6 col-sm-6 col-xs-12">
    	<input id="password" type="password" name="password" data-validate- class="form-control col-md-7 col-xs-12" required="required">
    </div>
</div>
<div class="item form-group">
	<label for="password2" class="control-label col-md-3 col-sm-3 col-xs-12">Repeat Password</label>
    <div class="col-md-6 col-sm-6 col-xs-12">
    	<input id="password2" type="password" name="password2" data-validate-linked="password" class="form-control col-md-7 col-xs-12" required="required">
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