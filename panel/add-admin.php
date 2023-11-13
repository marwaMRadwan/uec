<?php 
  require "db.php";
  require "functions.php";
  session_start();

if(empty($_SESSION['id'])) header ('Location:index.php?error=Please Login');
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $name=check($_POST['name']);
    $email=check($_POST["email"]);
    $role=check($_POST["role"]);
    $password=md5(check($_POST["password"]));
    $password2=check($_POST["password2"]);
	$type=1;
	$result=mysqli_query($connection,"SELECT COUNT(*) AS total  FROM `employees` WHERE `email`='$email'");
        $data=mysqli_fetch_assoc($result);
        if($data['total'])$error['email']="Email used before";
    if(isset($error)){
        foreach($error as $e) $msg.=$e."<br>";
    }
    else{
        $sql="INSERT INTO  
		`employees`(`id`, `name`, `email`, `role`, 
		`pass`, `type`) 
		VALUES  (null,'$name','$email','$role','$password','$type')";
        if(mysqli_query($connection,$sql)) {
        $msg= "Added";
        $fname=$lname="";
        header('Location:all-admin.php');
        }
    }
}
require 'head.php';?>
<!-- Add Employee Form -->
 <div class="right_col" role="main">
 	<div class="">
    	<div class="page-title">
        	<div class="title_left">
            	<h3>Add New Employee</h3>
          	</div>
   		</div>
        <div class="clearfix"></div>
    	<div class="row">
        	<div class="col-md-12 col-sm-12 col-xs-12">
           		<div class="x_panel">
                	<div class="x_title">
						<h2>Employee Info</h2>
						<ul class="nav navbar-right panel_toolbox">
							<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
						</ul>
						<div class="clearfix"></div>
              		</div>
                 						<h3><?php echo $msg;?></h3>
                 					
                  <div class="x_content">
<form class="form-horizontal form-label-left" novalidate method="post">
<div class="item form-group">
	<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Name <span class="required">*</span></label>
    <div class="col-md-6 col-sm-6 col-xs-12">
    	<input id="name" class="form-control col-md-7 col-xs-12" data-validate-length-range="2,20" data-validate-words="2" name="name" placeholder="Name" required="required" type="text">
	</div>
</div>
<div class="item form-group">
	<label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Email <span class="required">*</span></label>
    <div class="col-md-6 col-sm-6 col-xs-12">
    	<input type="email" id="email" name="email" required="required" class="form-control col-md-7 col-xs-12">
  	</div>
</div>
<div class="item form-group">
	<label class="control-label col-md-3 col-sm-3 col-xs-12" for="occupation">Role <span class="required"></span></label>
	<div class="col-md-6 col-sm-6 col-xs-12">
    	<input id="role" type="text" name="role" data-validate-length-range="5,20" class="optional form-control col-md-7 col-xs-12">
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