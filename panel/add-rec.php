<?php
require "db.php";
require "functions.php";
session_start();
if(empty($_SESSION['id'])) header ('Location:index.php?error=Please Login');
$partid=$_GET[partid];
$customerId =$_GET[customer];

$q="SELECT * FROM `pay` WHERE `id`='$partid'";
$qrun=mysqli_query($connection,$q);
while($rows=mysqli_fetch_array($qrun)){
    $partid = $rows[id];
    $contractnum=$rows[contractnum];
    $paytype = $rows[paytype];
    $payval= $rows[payval];
    $paid = $rows[paid];
    $remain = $rows[remain];
    $proid =$rows[proid];
    $ddd=$rows[paydate];

}

$q="SELECT * FROM `housing` WHERE `id`='$proid'";
$qrun=mysqli_query($connection,$q);
while($rows=mysqli_fetch_array($qrun)){
    $arname=$rows[arname];
    $arplace=$rows[arplace];
}
$q="SELECT * FROM `customers` WHERE `id`='$customerId'";
$qrun=mysqli_query($connection,$q);
while($rows=mysqli_fetch_array($qrun)){
    $cname=$rows[fname];
}
$q="SELECT * FROM `contract` WHERE `qnum`='$_GET[conNum]'";
$qrun=mysqli_query($connection,$q);
while($rows=mysqli_fetch_array($qrun)){
    $unit1 = $rows[unit1];
    $unit2 = $rows[unit2];
}
$q="SELECT * FROM `units` WHERE `unitNum`='$unit1' AND `project`='$proid'";
$qrun=mysqli_query($connection,$q);
while($rows=mysqli_fetch_array($qrun)){
    $area1 = $rows[area];
}
$q="SELECT * FROM `units` WHERE `unitNum`='$unit2' AND `project`='$proid'";
$qrun=mysqli_query($connection,$q);
while($rows=mysqli_fetch_array($qrun)){
    $area2 = $rows[area];
}
$d = date("d")." / ".date("m")." / ".date("Y");
$q="SELECT MAX(id) AS a FROM payments";
$qrun=mysqli_query($connection,$q);
if($rows=mysqli_fetch_array($qrun)){
$new = $rows[a]+1;    
}
if($_SERVER["REQUEST_METHOD"] == "POST") {
    //header("Location:manage-contracts.php");
/*$sql="INSERT INTO `pay`(`id`, `contractnum`, `status`, `paydate`, `paytype`, `payval`,`cid`) VALUES (null,'$contractNum','0','$_POST[Paydate]','$_POST[Paytype]','$_POST[Payval]','$_GET[customer]')";
    if(mysqli_query($connection,$sql)) {
        $msg= "Added";
    
}*/
}
require 'head.php';?>
<!-- Add Employee Form -->
 <div class="right_col" role="main">
 	<div class="">
    	<div class="page-title">
        	<div class="title_left">
            	<h3>reciept table</h3>
          	</div>
   		</div>
        <div class="clearfix"></div>
    	<div class="row">
        	<div class="col-md-12 col-sm-12 col-xs-12">
           		<div class="x_panel">
                	<div class="x_title">
						<h2>reciept</h2>
						<ul class="nav navbar-right panel_toolbox">
						<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
						</ul>
						<div class="clearfix"></div>
              		</div>
<div class="x_content">
    
<form class="form-horizontal form-label-left" action="receipt.php" method="post" target="_blank"> 
    	<?php if(isset($_SESSION['recErr'])) echo '<h3>'.$_SESSION['recErr'].'</h3>';?>
    <input type="hidden" value="<?php echo $_GET[partid];?>" name="partid">
    <input type="hidden" value="<?php echo $customerId;?>" name="cid">
    <input type="hidden" value="<?php echo $ddd;?>" name="ddd">
    <input type="hidden" value="<?php echo $contractnum;?>" name="contractnum">
    <div class="item form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">رقم الايصال :  </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <input id="uname" class="form-control col-md-7 col-xs-12" name="recieptNum" placeholder="User Name" type="text" value="<?php echo $new;?>" >
        </div>
    </div>
    <div class="item form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">اسم المشروع :  </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <input id="uname" class="form-control col-md-7 col-xs-12" name="proName" placeholder="User Name" type="text" value="<?php echo $arname;?>" readonly>
        </div>
    </div>
    <div class="item form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">موقع المشروع :  </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <input id="uname" class="form-control col-md-7 col-xs-12" name="proAddr" placeholder="User Name" type="text" value="<?php echo $arplace;?>" readonly>
        </div>
    </div>
    <div class="item form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">الوحدات :  </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <input id="uname" class="form-control col-md-7 col-xs-12" name="Units" placeholder="User Name" type="text" value="<?php echo $unit1; if($unit2!='')echo '-'.$unit2;?>" readonly>
        </div>
    </div>
    <div class="item form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">مساحة الوحدات :  </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <input id="uname" class="form-control col-md-7 col-xs-12" name="Areas" placeholder="User Name" type="text" value="<?php echo $area1; if($unit2!='')echo '-'.$area2;?>" readonly>
        </div>
    </div>
    <div class="item form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">أسم العميل :  </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <input id="uname" class="form-control col-md-7 col-xs-12" name="cname" placeholder="User Name" type="text" value="<?php echo $cname;?>" readonly>
        </div>
    </div>    
    <div class="item form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">تاريخ الايصال :  </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <input id="uname" class="form-control col-md-7 col-xs-12" name="recDate" placeholder="User Name" type="text" value="<?php echo $d;?>" >
        </div>
    </div>
    <div class="item form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">مقابل :  </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <input id="uname" class="form-control col-md-7 col-xs-12" name="payFor" placeholder="User Name" type="text" value="<?php echo $paytype;?>" readonly>
        </div>
    </div>
    <div class="item form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">المبلغ بالأرقام :  </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <input id="uname" class="form-control col-md-7 col-xs-12" name="priceNum" placeholder="المبلغ بالأرقام" type="text" required>
        </div>
    </div>
    <div class="item form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">المبلغ بالحروف :  </label>
        <div class="col-md-6 col-sm-6 col-xs-12">
            <input id="uname" class="form-control col-md-7 col-xs-12" name="priceTxt" placeholder="المبلغ بالحروف" type="text" required>
        </div>
    </div>
    <div class="item form-group">
	<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">الخصم:  </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
    	<input id="uname" class="form-control col-md-7 col-xs-12" data-validate-length-range="2,20" name="discount" placeholder="discount" required="required" type="text" >
	</div>
</div>

    <div class="form-group">
    <div class="col-md-6 col-md-offset-3">
        <input type="submit" id="send" class="btn btn-success" value="دفع">
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