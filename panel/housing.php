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
	$partnum=check($_POST['partnum']);
   	$ardescrip=check($_POST['ardescrip']);
   	$endescrip=check($_POST['endescrip']);
    $floors=check($_POST['floors']);
    $grage=check($_POST['grage']);
    $grageprice=check($_POST['grageprice']);
    $auth=check($_POST['auth']);
    $areaNum=check($_POST['areaNum']);
    $areaText=check($_POST['areaText']);
    $code=check($_POST['code']);
    $bahry=check($_POST['bahry']);
    $shary=check($_POST['shary']);
    $ably=check($_POST['ably']);
    $grby=check($_POST['grby']);
	$result=mysqli_query($connection,"SELECT COUNT(*) AS total  
	FROM `housing` WHERE `arname`='$arname' OR `enname`='$enname'");
    $data=mysqli_fetch_assoc($result);
    if($data['total']) $error['uname']=" project name used before";
    if(empty($error)){
        $img_name=$_FILES['cover']['name'];
        $img_size=$_FILES['cover']['size'];
        $img_tmp=$_FILES['cover']['tmp_name'];
        $img_ext=strtolower(end(explode('.',$img_name)));
        $avl_ext=array('jpg','png','jpeg');
        if($img_size>1524288) $error['cover']="image too large";
        if(!in_array($img_ext,$avl_ext))  
        $error['cover'].="invalid extension";
        if(empty( $error['cover'])){
        $time = microtime(true)*10000;
        $img="images/projects/".$time.".".$img_ext;
        move_uploaded_file($img_tmp,'../../'.$img);
        }
	}
    if(empty($error)){
		if(!$_FILES['brochure']['name']){$brochure="";}
		else{
	
        $img_name1=$_FILES['brochure']['name'];
        $img_size1=$_FILES['brochure']['size'];
        $img_tmp1=$_FILES['brochure']['tmp_name'];
        $img_ext1=strtolower(end(explode('.',$img_name1)));
        $avl_ext1=array('jpg','png','jpeg','pdf','ppt','pptx','doc','docx');
        if(!in_array($img_ext1,$avl_ext1))  
        $error['brochure'].="invalid bourchure extension";
        if(empty( $error['brochure'])){
            $time = microtime(true)*10000;
            $brochure="images/projects/".$time.".".$img_ext1;
            move_uploaded_file($img_tmp1,'../../'.$brochure);
		}
	}
	}
    if(isset($error)){
		foreach($error as $e) $msg.=$e."<br>";
    }
    else{
        $sql="INSERT INTO `housing`(`id`, `enname`, `arname`, `enplace`, 
		`arplace`, `partnum`, `endescrip`, `ardescrip`, `floors`, `garage`, `grageprice`,
		`cover`,`brochure`, `auth`, `areaNum`, `areaText`, `code`, `bahry`, `shary`, `ably`, `grby` ) VALUES
		(null, '$enname', '$arname', '$enplace', '$arplace', '$partnum', '$endescrip', '$ardescrip', '$floors', '$grage', '$grageprice', '$img', '$brochure', '$auth', '$areaNum', '$areaText', '$code', '$bahry', '$shary', '$ably', '$grby')";
        if(mysqli_query($connection,$sql)) {
        $msg= "Added";
		$last_id = mysqli_insert_id($connection);
        header("Location:manage-housing.php");
			}
		}
        }
?>
<?php require 'head.php';?>
<!-- Add Employee Form -->
 <div class="right_col" role="main">
 	<div class="">
    	<div class="page-title">
        	<div class="title_left">
            	<h3>Add New Housing Project</h3>
          	</div>
   		</div>
        <div class="clearfix"></div>
    	<div class="row">
        	<div class="col-md-12 col-sm-12 col-xs-12">
           		<div class="x_panel">
                	<div class="x_title">
						<h2>Housing Project</h2>
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
    	<input id="name" class="form-control col-md-7 col-xs-12" 
		 name="arname" placeholder="اسم المشروع" required="required" type="text"><br><br>
    	<input id="name" class="form-control col-md-7 col-xs-12" 
		 name="enname" placeholder="English Project Name" required="required" type="text">
	</div>
</div>
<div class="item form-group">
	<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Project Place <span class="required">*</span></label>
    <div class="col-md-6 col-sm-6 col-xs-12">
    	<input id="name" class="form-control col-md-7 col-xs-12" 
		 name="arplace"
		 placeholder="عنوان المشروع" required="required" type="text"><br><br>
    	<input id="name" class="form-control col-md-7 col-xs-12" 
		 name="enplace" placeholder="English project address" required="required" type="text">
	</div>
</div>
<div class="item form-group">
	<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Part Number<span class="required">*</span></label>
    <div class="col-md-6 col-sm-6 col-xs-12">
    	<input id="name" class="form-control col-md-7 col-xs-12" 
		 name="partnum" placeholder="رقم القطعه" required="required" type="text">
    </div>
</div>
<div class="item form-group">
	<label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Project Description<span class="required">*</span></label>
    <div class="col-md-6 col-sm-6 col-xs-12">
    	<textarea required="required" class="form-control" name="endescrip" placeholder="project description"></textarea><br>
    	<textarea required="required" class="form-control" name="ardescrip" placeholder="وصف المشروع"></textarea>

  	</div>
</div>
<div class="item form-group">
	<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Number of Floors <span class="required">*</span></label>
    <div class="col-md-6 col-sm-6 col-xs-12">
    	<input id="roof" class="form-control col-md-7 col-xs-12" name="floors" placeholder="Number of floors" required="required" type="number"><br><br>
	</div>
</div>
<div class="item form-group">
	<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Grage <span class="required">*</span></label>
    <div class="col-md-6 col-sm-6 col-xs-12">
    	<input id="units" class="form-control col-md-7 col-xs-12" name="grage" placeholder="Number of Garage units" required="required" type="number"><br><br>
    	<input id="unit price" class="form-control col-md-7 col-xs-12" name="grageprice" placeholder="Garage unit price" required="required" type="number"><br><br>
	</div>
</div>
<div class="item form-group">
	<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Project Image <span class="required">*</span></label>
    <div class="col-md-6 col-sm-6 col-xs-12">
    	<input id="image" class="form-control col-md-7 col-xs-12" name="cover" 
		placeholder="صورة" required="required" type="file">
    	</div></div>
<div class="item form-group">
	<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Project Brochure <span class="required">*</span></label>
    <div class="col-md-6 col-sm-6 col-xs-12">
    	<input id="image" class="form-control col-md-7 col-xs-12" name="brochure" placeholder="برشور" type="file">
    </div>
</div>
<div class="item form-group">
	<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">توكيل البيع <span class="required">*</span></label>
    <div class="col-md-6 col-sm-6 col-xs-12">
    	<input id="roof" class="form-control col-md-7 col-xs-12" name="auth" placeholder="توكيل البيع" required="required" type="text"><br><br>
	</div>
</div>  
<div class="item form-group">
	<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">مساحه المشروع <span class="required">*</span></label>
    <div class="col-md-6 col-sm-6 col-xs-12">
    	<input id="roof" class="form-control col-md-7 col-xs-12" name="areaNum" placeholder="مساحه المشروع بالأرقام" required="required" type="text"><br><br>
		<input id="roof" class="form-control col-md-7 col-xs-12" name="areaText" placeholder="مساحه المشروع بالحروف" required="required" type="text"><br><br>
	</div>
</div>
<div class="item form-group">
	<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">كود حجز <span class="required">*</span></label>
    <div class="col-md-6 col-sm-6 col-xs-12">
    	<input id="roof" class="form-control col-md-7 col-xs-12" name="code" placeholder="كود حجز" required="required" type="text"><br><br>
	</div>
</div>
<div class="item form-group">
	<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">الحد البحري<span class="required">*</span></label>
    <div class="col-md-6 col-sm-6 col-xs-12">
    	<input id="roof" class="form-control col-md-7 col-xs-12" name="bahry" placeholder="الحد البحري"  required="required" type="text"><br><br>
	</div>
</div>
<div class="item form-group">
	<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">الحد الشرقي <span class="required">*</span></label>
    <div class="col-md-6 col-sm-6 col-xs-12">
    	<input id="roof" class="form-control col-md-7 col-xs-12" name="shary" placeholder="الحد الشرقي" required="required" type="text"><br><br>
	</div>
</div>
<div class="item form-group">
	<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">الحد القبلي <span class="required">*</span></label>
    <div class="col-md-6 col-sm-6 col-xs-12">
    	<input id="roof" class="form-control col-md-7 col-xs-12" name="ably" placeholder="الحد القبلي" required="required" type="text"><br><br>
	</div>
</div>
<div class="item form-group">
	<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">الحد الغربي<span class="required">*</span></label>
    <div class="col-md-6 col-sm-6 col-xs-12">
    	<input id="roof" class="form-control col-md-7 col-xs-12" name="grby" placeholder="الحد الغربي" required="required" type="text"><br><br>
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
<script src="script.js"></script>

</body></html>