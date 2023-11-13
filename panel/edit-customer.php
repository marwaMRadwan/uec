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
	FROM `customers` WHERE `email`='$email' AND `id`!='$_GET[edit]'" );
        $data=mysqli_fetch_assoc($result);
		if($data['total'])
		$error['email']=" Customer Email used before";
    if(empty($error)){
    if(!$_FILES['cover']['name']){$img=$_GET[img];}
    else{
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
        $img="images/projects/".$time.".".$img_ext;
        move_uploaded_file($img_tmp,'../../'.$img);
        unlink('../../'.$_GET[img]);
        }
	}
	if(isset($error)){
        foreach($error as $e) $msg.=$e."<br>";
    }
    else{
		
        $sql="
		UPDATE `customers` SET `fname`='$fname',`address`='$address',`nationality`='$nationality',`dyana`='$dyana',`ssn`='$ssn',`phone1`='$phone1',`phone2`='$phone2',`email`='$email',cover='$img' WHERE `id`='$_GET[edit]'";
        if(mysqli_query($connection,$sql)) {
        $msg= "Edited";
        }
    }}}

?>
<?php require 'head.php';?>
<div class="right_col" role="main">
	<div class="">
	<div class="page-title">
        <div class="title_left">
        	<h3>Add New Tourist Or Government Project</h3>
        </div>
   	</div>
    <div class="clearfix"></div>
    <div class="row">
    	<div class="col-md-12 col-sm-12 col-xs-12">
        	<div class="x_panel">
            	<div class="x_title">
					<h2>Tourist Or Government Project</h2>
						<ul class="nav navbar-right panel_toolbox">
							<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
						</ul>
						<div class="clearfix"></div>
              		</div>
				<h3 style="color:red;"><?php echo $msg;?></h3>
                  <div class="x_content">
                  
<?php
$q="SELECT * FROM `customers` WHERE `id`='$_GET[edit]'";
$qrun=mysqli_query($connection,$q);
while($rows=mysqli_fetch_array($qrun)){
echo ' 

<form class="form-horizontal form-label-left" novalidate method="post" enctype="multipart/form-data">
<div class="item form-group">
	<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">
    Customer Name <span class="required">*</span></label>
    <div class="col-md-6 col-sm-6 col-xs-12">
    	<input id="name" class="form-control col-md-7 col-xs-12" 
		data-validate-length-range="2,30" name="fname" 
		placeholder="full name" required="required" type="text" value="'.$rows[fname].'"><br><br>
	</div>
</div>
<div class="item form-group">
	<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">
    Customer address <span class="required">*</span></label>
    <div class="col-md-6 col-sm-6 col-xs-12">
    	<input id="name" class="form-control col-md-7 col-xs-12" 
		data-validate-length-range="2,30" name="address" 
		placeholder="address" required="required" type="text"value="'.$rows[address].'"><br><br>
    </div>
</div>
<div class="item form-group">
	<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">
    Customer Nationality <span class="required">*</span></label>
    <div class="col-md-6 col-sm-6 col-xs-12">
    	<input id="name" class="form-control col-md-7 col-xs-12" 
		data-validate-length-range="2,30" name="nationality" 
		placeholder="Nationality" required="required" type="text" value="'.$rows[nationality].'"><br><br>
	</div>
</div>
    <div class="item form-group">
	<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">
    Customer Relgious <span class="required">*</span></label>
    <div class="col-md-6 col-sm-6 col-xs-12">
    	<input id="name" class="form-control col-md-7 col-xs-12" 
		data-validate-length-range="2,30" name="dyana" 
		placeholder="Cutomer Regiolus" required="required" type="text" value="'.$rows[dyana].'"><br><br>
	</div>
</div>
<div class="item form-group">
	<label class="control-label col-md-3 col-sm-3 col-xs-12" 
    for="name">Identity<span class="required">*</span></label>
    <div class="col-md-6 col-sm-6 col-xs-12">
    	<input id="name" class="form-control col-md-7 col-xs-12" 
		data-validate-length-range="2,30" name="ssn"
		 placeholder="Identity Number" required="required" type="text" value="'.$rows[ssn].'"><br><br>
         <input id="image" class="form-control col-md-7 col-xs-12" 
         name="cover" placeholder="Identity Image" type="file">
    </div>
</div>
<div class="item form-group">
	<label class="control-label col-md-3 col-sm-3 col-xs-12"
     for="name">Phones <span class="required">*</span></label>
    <div class="col-md-6 col-sm-6 col-xs-12">
    	<input id="name" class="form-control col-md-7 col-xs-12" 
	name="phone1" placeholder="Phone 1" type="text" value="'.$rows[phone1].'"><br><br>
    <input id="name" class="form-control col-md-7 col-xs-12" 
	name="phone2" placeholder="Phone 2" type="text" value="'.$rows[phone2].'">
    </div>
</div>
<div class="item form-group">
	<label class="control-label col-md-3 col-sm-3 col-xs-12"
     for="name">Email <span class="required">*</span></label>
    <div class="col-md-6 col-sm-6 col-xs-12">
    	<input id="name" class="form-control col-md-7 col-xs-12" 
	name="email" placeholder="Email" type="email"  required="required" value="'.$rows[email].'">
   
    </div>
</div>

<div class="ln_solid"></div>
<div class="form-group">
	<div class="col-md-6 col-md-offset-3">
   		<input type="submit" id="send" class="btn btn-success" value="Submit">
    </div>
</div>
</form>



';}?>
</div></div></div></div></div></div>
<script src="../vendors/jquery/dist/jquery.min.js"></script>
<script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="../vendors/fastclick/lib/fastclick.js"></script>
<script src="../vendors/nprogress/nprogress.js"></script>
<script src="../vendors/validator/validator.js"></script>
<script src="../build/js/custom.min.js"></script>
</body></html>