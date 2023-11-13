<?php 
  require "db.php";
  require "functions.php";
  
	session_start();
if(empty($_SESSION['id'])) header ('Location:index.php?error=Please Login');
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $fname=check($_POST['fname']);
    $address=check($_POST['address']);
	$ssn=check($_POST['ssn']);
    $phone1=check($_POST['phone1']);
	$phone2=check($_POST['phone2']);
   	$email=check($_POST['email']);
   	$dyana=check($_POST['dyana']);
   	$nationality=check($_POST['nationality']);
    $result=mysqli_query($connection,"SELECT COUNT(*) AS total  
	FROM `customers` WHERE `email`='$email'");
        $data=mysqli_fetch_assoc($result);
		if($data['total'])
		$error['email']=" Customer Email used before";
    if(empty($error)){
        if($_FILES['cover']['name']){
            
        
	$img_name=$_FILES['cover']['name'];
    $img_size=$_FILES['cover']['size'];
    $img_tmp=$_FILES['cover']['tmp_name'];
    $img_ext=strtolower(end(explode('.',$img_name)));
    $avl_ext=array('jpg','png','jpeg');
    if($img_size>524288) $error['cover']="image too large";
	if(!in_array($img_ext,$avl_ext))  
	$error['cover'].="invalid extension";
    if(empty( $error['cover'])){
    $time = microtime(true)*10000;
    $img="images/customers/".$time.".".$img_ext;
    move_uploaded_file($img_tmp,'../../'.$img);
    }
    else{$img="";}
    }
	}
    if(isset($error)){
		foreach($error as $e) $msg.=$e."<br>";
		
    }
    else{
    $pass=randomPassword();
    $encPass=md5($pass);
	$sql="INSERT INTO `customers`(`id`, `fname`, `address`, `nationality`, `dyana`, `ssn`,
     `cover`, `phone1`, `phone2`, `email`,`pass`) VALUES (
         null, '$fname','$address','$nationality','$dyana','$ssn','$img','$phone1','$phone2',
         '$email','$encPass'
     )";
        
        if(mysqli_query($connection,$sql)) {
        $msg= "Added";
        $message = "Customer data\n Email: $email \nPassword: $pass\n website: http://www.uec-realestate.com/";
        
        mail($email,'Customer data',$message, 'From: united egyptian company');
        /*$to_email = $email;
        $subject = 'Account Data';
        $headers = 'From: united egyptian company';
        mail($to_email,$subject,$message,$headers);
        */
        }
    }
}
function randomPassword() {
    $alphabet = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890';
    $pass = array(); //remember to declare $pass as an array
    $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
    for ($i = 0; $i < 12; $i++) {
        $n = rand(0, $alphaLength);
        $pass[] = $alphabet[$n];
    }
    return implode($pass); //turn the array into a string
}
?>
<?php require 'head.php';?>
<!-- Add Employee Form -->
 <div class="right_col" role="main">
 	<div class="">
    	<div class="page-title">
        	<div class="title_left">
            	<h3>Add Customer</h3>
          	</div>
   		</div>
        <div class="clearfix"></div>
    	<div class="row">
        	<div class="col-md-12 col-sm-12 col-xs-12">
           		<div class="x_panel">
                	<div class="x_title">
						<h2>Customer Data</h2>
						<ul class="nav navbar-right panel_toolbox">
							<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
						</ul>
						<div class="clearfix"></div>
              		</div>
					  <h3 style="color:red;"><?php echo $msg;?></h3>

                  <div class="x_content">
<form class="form-horizontal form-label-left" novalidate method="post" enctype="multipart/form-data">
<div class="item form-group">
	<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">
    Customer Name <span class="required">*</span></label>
    <div class="col-md-6 col-sm-6 col-xs-12">
    	<input id="name" class="form-control col-md-7 col-xs-12" 
		 name="fname" 
		placeholder="full name" required="required" type="text"><br><br>
	</div>
</div>
<div class="item form-group">
	<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">
    Customer address <span class="required">*</span></label>
    <div class="col-md-6 col-sm-6 col-xs-12">
    	<input id="name" class="form-control col-md-7 col-xs-12" 
		 name="address" 
		placeholder="address" required="required" type="text"><br><br>
    </div>
</div>
<div class="item form-group">
	<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">
    Customer Nationality <span class="required">*</span></label>
    <div class="col-md-6 col-sm-6 col-xs-12">
    	<input id="name" class="form-control col-md-7 col-xs-12" 
		 name="nationality" 
		placeholder="Nationality" required="required" type="text"><br><br>
	</div>
</div>
    <div class="item form-group">
	<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">
    Customer Relgious <span class="required">*</span></label>
    <div class="col-md-6 col-sm-6 col-xs-12">
    	<input id="name" class="form-control col-md-7 col-xs-12" 
		 name="dyana" 
		placeholder="Cutomer Regiolus" required="required" type="text"><br><br>
	</div>
</div>
<div class="item form-group">
	<label class="control-label col-md-3 col-sm-3 col-xs-12" 
    for="name">Identity<span class="required">*</span></label>
    <div class="col-md-6 col-sm-6 col-xs-12">
    	<input id="name" class="form-control col-md-7 col-xs-12" 
		 name="ssn"
		 placeholder="Identity Number" required="required" type="text"><br><br>
         <input id="image" class="form-control col-md-7 col-xs-12" 
         name="cover" placeholder="Identity Image" type="file">
    </div>
</div>
<div class="item form-group">
	<label class="control-label col-md-3 col-sm-3 col-xs-12"
     for="name">Phones <span class="required">*</span></label>
    <div class="col-md-6 col-sm-6 col-xs-12">
    	<input id="name" class="form-control col-md-7 col-xs-12" 
	name="phone1" placeholder="Phone 1" type="text"><br><br>
    <input id="name" class="form-control col-md-7 col-xs-12" 
	name="phone2" placeholder="Phone 2" type="text">
    </div>
</div>
<div class="item form-group">
	<label class="control-label col-md-3 col-sm-3 col-xs-12"
     for="name">Email <span class="required">*</span></label>
    <div class="col-md-6 col-sm-6 col-xs-12">
    	<input id="name" class="form-control col-md-7 col-xs-12" 
	name="email" placeholder="Email" type="email"  required="required">
   
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