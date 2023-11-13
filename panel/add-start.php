<?php
require "db.php";
require "functions.php";
session_start();
if(empty($_SESSION['id'])) header ('Location:index.php?error=Please Login');
if($_GET[customer]=="" ) header('Location:manage-customers.php');
if(!$_GET[customer] ){ header('Location:manage-customers.php');}
$customerId =$_GET[customer];
$proId =$_GET[proid];
$arrUnits = unserialize($_GET["units"]); 
//print_r($arrUnits);
$unitfloor =[];
$unitNum =[];
$q="SELECT * FROM `housing` WHERE `id`='$proId'";
$qrun=mysqli_query($connection,$q);
while($rows=mysqli_fetch_array($qrun)){
    $garage = $rows[garage];
    $grageprice = $rows[grageprice];
}
foreach($arrUnits as $value){
    $q="SELECT * FROM `units` WHERE `id`='$value'";
    $qrun=mysqli_query($connection,$q);
    while($rows=mysqli_fetch_array($qrun)){
        $unitfloor[]=$rows[floor];
        $unitNum[] = $rows[unitNum];
        $unitLoc[] = $rows[location];
        $unitArea[] = $rows[area];
        $unitPrice[] = $rows[price];
        $unitTotal[] = $rows[area]*$rows[price];
    }
}


$contractTot = array_sum($unitTotal);
if($_GET[grage]=='on'){$contractTot+=$grageprice;}
$contractNum = $_GET[conNum];
if($_SERVER["REQUEST_METHOD"] == "POST") {
/*href='add-unit1.php?units="
.serialize($arrUnits)
."&proid=".$_GET[proid]
."&customer=".$_GET[customer]
."&conNum=".$_GET[conNum]
."&grage=".$_GET[grage]
." ;*/
$sql="INSERT INTO `pay`(`id`, `contractnum`, `status`, `paydate`, `paytype`, `payval`,`cid`,`proid`,`tt`) 
VALUES (null,'$contractNum','0','$_POST[condate]','دفعة تعاقد','$_POST[Paytype]','$_GET[customer]','$_GET[proid]','1')";
mysqli_query($connection,$sql);

header('Location:add-payment1.php?units='
.serialize($arrUnits).
'&proid='.$_GET[proid].
'&customer='.$_GET[customer].
'&conNum='.$_GET[conNum].
'&grage='.$_GET[grage].
'&start='.$_POST[Paytype].
'&discount='.$_POST[Payval].
'&adate='.$_POST[condate].
'');
}
require 'head.php';?>
<!-- Add Employee Form -->
 <div class="right_col" role="main">
 	<div class="">
    	<div class="page-title">
        	<div class="title_left">
            	<h3>المقدم و الخصم</h3>
          	</div>
   		</div>
        <div class="clearfix"></div>
    	<div class="row">
        	<div class="col-md-12 col-sm-12 col-xs-12">
           		<div class="x_panel">
                	<div class="x_title">
						<ul class="nav navbar-right panel_toolbox">
							<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
						</ul>
						<div class="clearfix"></div>
              		</div>
                  <div class="x_content">
<form class="form-horizontal form-label-left" novalidate> 
<div class="item form-group">
<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">اجمالي العقد:  </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        <div id="uname" class="form-control col-md-7 col-xs-12" data-validate-length-range="2,20" name="contractTot" placeholder="User Name" required="required" type="text" value="<?php echo $contractTot;?>" readonly><?php echo $contractTot;?></div>
	</div>
</div>
<div class="item form-group">
<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">رقم العقد:  </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
        <div id="uname" class="form-control col-md-7 col-xs-12" data-validate-length-range="2,20" name="contractNum" placeholder="User Name" required="required" type="text" value="<?php echo $contractNum;?>" readonly><?php echo $contractNum;?></div>
	</div>
</div>
</form>
<hr><br>
<form class="form-horizontal form-label-left" novalidate method="post"> 
<div class="item form-group">
	<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">المقدم <span class="required">*</span></label>
    <div class="col-md-6 col-sm-6 col-xs-12">
    	<input id="name" class="form-control col-md-7 col-xs-12" 
		name="Paytype" 
		placeholder="المقدم" required="required" type="number"><br><br>
    </div>
</div>
 
<div class="item form-group">
	<label class="control-label col-md-3 col-sm-3 col-xs-12" 
    for="name">الخصم <span class="required">*</span></label>
    <div class="col-md-6 col-sm-6 col-xs-12">
    	<input id="name" class="form-control col-md-7 
        col-xs-12"  name="Payval" 
		placeholder="الخصم" required="required" type="number"><br><br>
    </div>
</div> 

<div class="item form-group">
	<label class="control-label col-md-3 col-sm-3 col-xs-12" 
    for="name">تاريخ <span class="required">*</span></label>
    <div class="col-md-6 col-sm-6 col-xs-12">
    	<input id="condate" class="form-control col-md-7 
        col-xs-12"  name="condate" 
	 required="required" type="date"
     value="<?php echo date("d-m-Y"); ?>"><br><br>
    </div>
</div> 

<div class="form-group">
<div class="col-md-6 col-md-offset-3">
   	<input type="submit" id="send" class="btn btn-success" value="اضافه قسط">
</div>
</div>
    <div class="ln_solid"></div>
</form>
</div>

                    
    </div></div></div></div></div>
<script src="../vendors/jquery/dist/jquery.min.js"></script>
<script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="../vendors/nprogress/nprogress.js"></script>
<script src="../vendors/validator/validator.js"></script>
<script src="../build/js/custom.min.js"></script>
<script src="script.js"></script>
</body></html>