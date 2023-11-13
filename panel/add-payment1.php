<?php
require "db.php";
require "functions.php";
session_start();
if(empty($_SESSION['id'])) header ('Location:index.php?error=Please Login');
if($_GET[conNum]=="" ) header('Location:manage-customers.php');
if(!$_GET[conNum] ){ header('Location:manage-customers.php');}
$customerId =$_GET[customer];
$proId =$_GET[proid];
$arrUnits = unserialize($_GET["units"]); 
$unitfloor =[];
$unitNum =[];
$actual_link = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

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
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $sql="INSERT INTO `pay`(`id`, `contractnum`, `status`, `paydate`, `paytype`, `payval`,`cid`,`proid`) 
VALUES (null,'$contractNum','0','$_POST[Paydate]','$_POST[Paytype]','$_POST[Payval]','$_GET[customer]','$_GET[proid]')";
if(mysqli_query($connection,$sql)) {
        $msg= "Added";
    
}
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
						<h2>reciept table</h2>
						<ul class="nav navbar-right panel_toolbox">
							<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
						</ul>
						<div class="clearfix"></div>
              		</div>
                  <div class="x_content">
                      <div class="text-right">
                      <?php
echo "<a href='add-unit1.php?
    units=".serialize($arrUnits).
    "&proid=".$_GET[proid].
    "&customer=".$_GET[customer].
    "&conNum=".$_GET[conNum].
    "&grage=".$_GET[grage].
    "&start=".$_GET[start].
'&discount='.$_GET[discount].
'&adate='.$_GET[adate].

    " 'class='btn btn-success' >complete steps</a>";
                          ?>
                      </div>
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
<form class="form-horizontal form-label-left"  method="post"> 
<div class="item form-group">
	<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">تاريخ استحقاق الايصال <span class="required">*</span></label>
    <div class="col-md-6 col-sm-6 col-xs-12">
    	<input id="name" class="form-control col-md-7 col-xs-12" 
		data-validate-length-range="2,30" name="Paydate" 
		placeholder="تاريخ الاستحقاق" required="required" type="date"><br><br>
    </div>
</div>
<div class="item form-group">
	<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">نوع الدفعه <span class="required">*</span></label>
    <div class="col-md-6 col-sm-6 col-xs-12">
    	<input id="name" class="form-control col-md-7 col-xs-12" 
		data-validate-length-range="2,30" name="Paytype" 
		placeholder="نوع الدفعة" required="required" type="text"><br><br>
    </div>
</div>
 
<div class="item form-group">
	<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">قيمة الدفعه <span class="required">*</span></label>
    <div class="col-md-6 col-sm-6 col-xs-12">
    	<input id="name" class="form-control col-md-7 col-xs-12" 
		data-validate-length-range="2,30" name="Payval" 
		placeholder="قيمة الدفعة" required="required" type="text"><br><br>
    </div>
</div> 
<div class="form-group">
<div class="col-md-6 col-md-offset-3">
<input type="submit" name="addd" class="btn btn-success" value="اضافه قسط">
</div>
</div>
    <div class="ln_solid"></div>
</form>
    <table  id="datatable" class="table table-striped table-bordered">
        <tr>
            <th>م</th>
            <th>تاريخ الاستحقاق</th>
            <th>نوع الدفعة</th>
            <th>قيمة الدفعة</th>
            <th>حذف الدفعة</th>

        </tr>
  <?php 
        $i=0;
    $sqq ="SELECT `id`, `contractnum`, `status`, `paydate`, `paytype`, `payval`, `comment` FROM `pay` WHERE  `contractnum`='$contractNum'";
  $qrunss=mysqli_query($connection,$sqq);
    while($rows=mysqli_fetch_array($qrunss)){
        $i+=1;
    echo 
        "<tr>
        <td>".$i."</td>
        <td>".$rows[paydate]."</td>
        <td>".$rows[paytype]."</td>
        <td>".$rows[payval]."</td>
        <td>
<a href='del-pay.php?id=".$rows[id]."&link=".$actual_link."'
 class='btn btn-danger' >delete</a>
</td>
        </tr>";
        
    }
        ?>
        
    </table>
</div>

                    
    </div></div></div></div></div>
<script src="../vendors/jquery/dist/jquery.min.js"></script>
<script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="../vendors/nprogress/nprogress.js"></script>
<script src="../vendors/validator/validator.js"></script>
<script src="../build/js/custom.min.js"></script>
<script src="script.js"></script>
</body></html>