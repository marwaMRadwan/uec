<?php
require "db.php";
require "functions.php";
session_start();


if($_SERVER["REQUEST_METHOD"] == "POST") {
    header("Location:manage-contracts.php");
}

$contractnum =$_GET[contract];
$q="SELECT * FROM `contract` WHERE `qnum`='$contractnum'";
$qrun=mysqli_query($connection,$q);
while($rows=mysqli_fetch_array($qrun)){
    $cid = $rows[cid];
    $pid = $rows[pid];
    
}
$q="SELECT * FROM `housing` WHERE `id`='$pid'";
$qrun=mysqli_query($connection,$q);
while($rows=mysqli_fetch_array($qrun)){
    $penname = $rows[enname];
    $parname = $rows[arname];
    $penplace = $rows[enplace];
    $parplace = $rows[arplace];
    $ppartnum = $rows[partnum];
    $pendescrip = $rows[endescrip];
    $pardescrip = $rows[ardescrip];
    $pfloors = $rows[floors];
    $pflats = $rows[flats];
    $pgarage = $rows[garage];
    $pgrageprice = $rows[grageprice];
}

$q="SELECT * FROM `customers` WHERE `id`='$cid'";
$qrun=mysqli_query($connection,$q);
while($rows=mysqli_fetch_array($qrun)){
    $arname = $rows[fname].' '.$rows[lname];
    }
require 'head.php';?>
<!-- Add Employee Form -->
 <div class="right_col" role="main">
 	<div class="">
    	<div class="page-title">
        	<div class="title_left">
            	<h3>Contract</h3>
          	</div>
   		</div>
        <div class="clearfix"></div>
    	<div class="row">
        	<div class="col-md-12 col-sm-12 col-xs-12">
           		<div class="x_panel">
                	<div class="x_title">
						<h2>Reciept</h2>
						<ul class="nav navbar-right panel_toolbox">
							<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
						</ul>
						<div class="clearfix"></div>
              		</div>
                  <div class="x_content">
<form class="form-horizontal form-label-left" novalidate  action="receipt.php"  method="post" target="_blank">
<div class="item form-group">
	<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Customer Name:  </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
    	<input id="uname" class="form-control col-md-7 col-xs-12" data-validate-length-range="2,20" name="cname" placeholder="User Name" required="required" type="text" value="<?php echo $arname;?>" readonly>
	</div>
</div>

<div class="item form-group">
	<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Project Name:  </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
    	<input id="uname" class="form-control col-md-7 col-xs-12" data-validate-length-range="2,20" name="proname" placeholder="User Name" required="required" type="text" value="<?php echo $parname;?>" readonly>
	</div>
</div>

<div class="item form-group">
	<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Payment in Numbers:  </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
    	<input id="uname" class="form-control col-md-7 col-xs-12" data-validate-length-range="2,20" name="pnum" placeholder="User Name" required="required" type="text" >
	</div>
</div>


<div class="item form-group">
	<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">Payment in Chars:  </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
    	<input id="uname" class="form-control col-md-7 col-xs-12" data-validate-length-range="2,20" name="pchars" placeholder="User Name" required="required" type="text" >
	</div>
</div>
    

    
<div class="ln_solid"></div>
<div class="form-group">
    <script>
        function changeLocation (){
 setTimeout(function(){
  window.location = "manage-contracts.php?customer=<?php echo $customerId;?>";
 },200);
}
    </script>
	<div class="col-md-6 col-md-offset-3">
   		<input type="submit" id="send" class="btn btn-success" value="Submit" onclick="changeLocation();">
    </div>
</div>
</form>
</div></div></div></div></div></div>
<script src="../vendors/jquery/dist/jquery.min.js"></script>
<script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="../vendors/nprogress/nprogress.js"></script>
<script src="../vendors/validator/validator.js"></script>
<script src="../build/js/custom.min.js"></script>
<script src="script.js"></script>
</body></html>