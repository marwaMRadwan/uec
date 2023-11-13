<?php 
  require "db.php";
  require "functions.php";
  session_start();
if(empty($_SESSION['id'])) header ('Location:index.php?error=Please Login');
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $arname=check($_POST['arname']);
    $enname=check($_POST['enname']);
	$arplace=check($_POST['arplace']);
    $enplace=check($_POST['enplace']);
	$arauth=check($_POST['arauth']);
    $enauth=check($_POST['enauth']);
    $conval=check($_POST['conval']);
	$ardescrip=check($_POST['ardescrip']);
    $endescrip=check($_POST['endescrip']);	
	$result=mysqli_query($connection,"SELECT COUNT(*) AS total  FROM `tour_gover` WHERE `arname`='$arname' OR `name`='$enname'");
        $data=mysqli_fetch_assoc($result);
        if($data['total'])$error['uname']=" project name used before";
    if(empty($error)){
		    $img_name=$_FILES['cover']['name'];
    $img_size=$_FILES['cover']['size'];
    $img_tmp=$_FILES['cover']['tmp_name'];
    $img_ext=strtolower(end(explode('.',$img_name)));
    $avl_ext=array('jpg','png','jpeg');
    if($img_size>524288) $error['cover']="image too large";
    if(!in_array($img_ext,$avl_ext))  $error['cover'].="invalid extension";
    if(empty( $error['cover'])){
    $time = microtime(true)*10000;
    $img="images/projects/".$time.".".$img_ext;
    move_uploaded_file($img_tmp,'../../'.$img);
    }
	}
    if(isset($error)){
        foreach($error as $e) $msg.=$e."<br>";
    }
    else{
		
        $sql="INSERT INTO `tour_gover`(
            `id`, `name`, `arname`, `place`, `arplace`, `auth`,
             `arauth`, `value`, `descrip`, `ardescrip`, `cover`) 
             VALUES (null,'$enname','$arname','$enplace','$arplace',
             '$enauth','$arauth','$conval','$endescrip','$ardescrip',
             '$img')";
        if(mysqli_query($connection,$sql)) {
        $msg= "Added";
            header('Location:manage-tour_hous.php');
        }
    }
}
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
<form class="form-horizontal form-label-left" novalidate method="post" enctype="multipart/form-data">
<div class="item form-group">
	<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Project Name <span class="required">*</span></label>
    <div class="col-md-6 col-sm-6 col-xs-12">
    	<input id="arname" class="form-control col-md-7 col-xs-12" name="arname" placeholder="اسم المشروع" required="required" type="text"><br><br>
    	<input id="enname" class="form-control col-md-7 col-xs-12" name="enname" placeholder="English Project Name" required="required" type="text">
	</div>
</div>
<div class="item form-group">
	<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Project Place <span class="required">*</span></label>
    <div class="col-md-6 col-sm-6 col-xs-12">
    	<input id="arplace" class="form-control col-md-7 col-xs-12" name="arplace" placeholder="موقع المشروع" required="required" type="text"><br><br>
    	<input id="enplace" class="form-control col-md-7 col-xs-12" name="enplace" placeholder="English Project Place" required="required" type="text">
	</div>
</div>
<div class="item form-group">
	<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Contracting Authority <span class="required">*</span></label>
    <div class="col-md-6 col-sm-6 col-xs-12">
    	<input id="arauth" class="form-control col-md-7 col-xs-12" name="arauth" placeholder="جهة التعاقد" required="required" type="text"><br><br>
    	<input id="enauth" class="form-control col-md-7 col-xs-12" name="enauth" placeholder="English Project Authority" required="required" type="text">
	</div>
</div>
<div class="item form-group">
	<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Contracting Value <span class="required">*</span></label>
    <div class="col-md-6 col-sm-6 col-xs-12">
    	<input id="value" class="form-control col-md-7 col-xs-12" name="conval" placeholder="قيمة التعاقد" required="required" type="number">
    </div>
</div>
<div class="item form-group">
	<label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Project Description<span class="required">*</span></label>
    <div class="col-md-6 col-sm-6 col-xs-12">
    	<textarea id="endescrip" required="required" class="form-control" name="endescrip" data-parsley-trigger="keyup" placeholder="project description"></textarea><br>
    	<textarea id="ardescrip" required="required" class="form-control" name="ardescrip" placeholder="وصف المشروع"></textarea>

  	</div>
</div>
<div class="item form-group">
	<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Project Image <span class="required">*</span></label>
    <div class="col-md-6 col-sm-6 col-xs-12">
    	<input id="image" class="form-control col-md-7 col-xs-12" name="cover" placeholder="صورة" required="required" type="file">
    	</div></div>
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