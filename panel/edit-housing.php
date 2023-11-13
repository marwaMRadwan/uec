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
echo $ardescrip;
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
	unlink('../../'.$_GET[img]);}
	}
	if(isset($error)){
        foreach($error as $e) $msg.=$e."<br>";
    }
    else{
		
        $sql="UPDATE `housing` SET `enname`='$enname',`arname`='$arname',`enplace`='$enplace',
		`arplace`='$arplace',`partnum`='$partnum',`endescrip`='$endescrip',`ardescrip`='$ardescrip',`cover`='$img',`floors`='$floors',`garage`='$grage',`grageprice`='$grageprice',`auth`='$auth',`areaNum`='$areaNum',`areaText`='$areaText',`code`='$code',`bahry`='$bahry',`shary`='$shary',`ably`='$ably',`grby`='$grby'
        WHERE `id`='$_GET[edit]'";
        if(mysqli_query($connection,$sql)) {
        $msg= "Edited";
        }
    }}

?>
<?php require 'head.php';?>
<div class="right_col" role="main">
	<div class="">
	<div class="page-title">
        <div class="title_left">
        	<h3>Edit Housing Project</h3>
        </div>
   	</div>
    <div class="clearfix"></div>
    <div class="row">
    	<div class="col-md-12 col-sm-12 col-xs-12">
        	<div class="x_panel">
            	<div class="x_title">
					<h2>Edit Housing Project</h2>
						<ul class="nav navbar-right panel_toolbox">
							<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
						</ul>
						<div class="clearfix"></div>
              		</div>
				<h3 style="color:red;"><?php echo $msg;?></h3>
                  <div class="x_content">
                  
<?php
$q="SELECT * FROM `housing` WHERE `id`='$_GET[edit]'";
$qrun=mysqli_query($connection,$q);
while($rows=mysqli_fetch_array($qrun)){
echo ' 
<form class="form-horizontal form-label-left" novalidate method="post" enctype="multipart/form-data">
<div class="item form-group">
	<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Project Name <span class="required">*</span></label>
    <div class="col-md-6 col-sm-6 col-xs-12">
    	<input id="name" class="form-control col-md-7 col-xs-12"  name="arname" placeholder="اسم المشروع" required="required" type="text" value="'.$rows[arname].'"><br><br>
    	<input id="name" class="form-control col-md-7 col-xs-12"  name="enname" placeholder="English Project Name" required="required" type="text" value="'.$rows[enname].'">
	</div>
</div>
<div class="item form-group">
	<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Project Place <span class="required">*</span></label>
    <div class="col-md-6 col-sm-6 col-xs-12">
    	<input id="name" class="form-control col-md-7 col-xs-12"  name="arplace" placeholder="موقع المشروع" required="required" type="text"  value="'.$rows[arplace].'"><br><br>
    	<input id="name" class="form-control col-md-7 col-xs-12"  name="enplace" placeholder="English Project Place" required="required" type="text"  value="'.$rows[enplace].'">
	</div>
</div>
<div class="item form-group">
	<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Contracting Value <span class="required">*</span></label>
    <div class="col-md-6 col-sm-6 col-xs-12">
    	<input id="name" class="form-control col-md-7 col-xs-12"  name="partnum" placeholder="رقم القطعه" required="required" type="text" value="'.$rows[partnum].'">
    </div>
</div>
<div class="item form-group">
	<label class="control-label col-md-3 col-sm-3 col-xs-12" for="email">Project Description<span class="required">*</span></label>
    <div class="col-md-6 col-sm-6 col-xs-12">
		<textarea id="chairman" required="required" class="form-control" name="endescrip" placeholder="project description"> '.$rows[endescrip].'</textarea><br>
		<textarea id="chairman" required="required" class="form-control" name="ardescrip" placeholder="وصف المشروع"> '.$rows[ardescrip].'</textarea>
  	</div>
</div>
<div class="item form-group">
	<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Project Image <span class="required">*</span></label>
    <div class="col-md-6 col-sm-6 col-xs-12">
    	<input id="image" class="form-control col-md-7 col-xs-12" name="cover" placeholder="صورة" type="file">
    </div>
</div>
<div class="item form-group">
	<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Number of Floors <span class="required">*</span></label>
    <div class="col-md-6 col-sm-6 col-xs-12">
    	<input id="roof" class="form-control col-md-7 col-xs-12" name="floors" placeholder="Number of floors" required="required" type="number" value="'.$rows[floors].'"><br><br>
	</div>
</div>
<div class="item form-group">
	<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Grage <span class="required">*</span></label>
    <div class="col-md-6 col-sm-6 col-xs-12">
    	<input id="units" class="form-control col-md-7 col-xs-12" name="grage" placeholder="Number of Garage units" required="required" type="number" value="'.$rows[garage].'"><br><br>
    	<input id="unit price" class="form-control col-md-7 col-xs-12" name="grageprice" placeholder="Garage unit price" required="required" type="number" value="'.$rows[grageprice].'"><br><br>
	</div>
</div>
<div class="item form-group">
	<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">توكيل البيع <span class="required">*</span></label>
    <div class="col-md-6 col-sm-6 col-xs-12">
    	<input id="roof" class="form-control col-md-7 col-xs-12" name="auth" placeholder="توكيل البيع" required="required" type="text" value="'.$rows[auth].'"><br><br>
	</div>
</div>  
<div class="item form-group">
	<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">مساحه المشروع <span class="required">*</span></label>
    <div class="col-md-6 col-sm-6 col-xs-12">
    	<input id="roof" class="form-control col-md-7 col-xs-12" name="areaNum" placeholder="مساحه المشروع بالأرقام" required="required" type="text" value="'.$rows[areaNum].'"><br><br>
		<input id="roof" class="form-control col-md-7 col-xs-12" name="areaText" placeholder="مساحه المشروع بالحروف" required="required" type="text" value="'.$rows[areaText].'"><br><br>
	</div>
</div>
<div class="item form-group">
	<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">كود حجز <span class="required">*</span></label>
    <div class="col-md-6 col-sm-6 col-xs-12">
    	<input id="roof" class="form-control col-md-7 col-xs-12" name="code" placeholder="كود حجز" required="required" type="text" value="'.$rows[code].'"><br><br>
	</div>
</div>
<div class="item form-group">
	<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">الحد البحري<span class="required">*</span></label>
    <div class="col-md-6 col-sm-6 col-xs-12">
    	<input id="roof" class="form-control col-md-7 col-xs-12" name="bahry" placeholder="الحد البحري"  required="required" type="text" value="'.$rows[bahry].'"><br><br>
	</div>
</div>
<div class="item form-group">
	<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">الحد الشرقي <span class="required">*</span></label>
    <div class="col-md-6 col-sm-6 col-xs-12">
    	<input id="roof" class="form-control col-md-7 col-xs-12" name="shary" placeholder="الحد الشرقي" required="required" type="text" value="'.$rows[shary].'"><br><br>
	</div>
</div>
<div class="item form-group">
	<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">الحد القبلي <span class="required">*</span></label>
    <div class="col-md-6 col-sm-6 col-xs-12">
    	<input id="roof" class="form-control col-md-7 col-xs-12" name="ably" placeholder="الحد القبلي" required="required" type="text" value="'.$rows[ably].'"><br><br>
	</div>
</div>
<div class="item form-group">
	<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">الحد الغربي<span class="required">*</span></label>
    <div class="col-md-6 col-sm-6 col-xs-12">
    	<input id="roof" class="form-control col-md-7 col-xs-12" name="grby" placeholder="الحد الغربي" required="required" type="text" value="'.$rows[grby].'"><br><br>
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
<script src="script.js"></script>
</body></html>