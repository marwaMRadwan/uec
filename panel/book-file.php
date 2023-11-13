<?php
require "db.php";
require "functions.php";
session_start();
if(empty($_SESSION['id'])) header ('Location:index.php?error=Please Login');
if($_SERVER["REQUEST_METHOD"] == "POST") {    
    header("Location:manage-booking.php");
}
$customerId =$_GET[customer];
$q="SELECT * FROM `customers` WHERE `id`='$customerId'";
$qrun=mysqli_query($connection,$q);
while($rows=mysqli_fetch_array($qrun)){
    $fname = $rows[fname];
    $address = $rows[address];
    $ssn = $rows[ssn];
    $phone1 = $rows[phone1];
    $phone2 = $rows[phone2];
    $email = $rows[email];
    $dyana=$rows[dyana];
   	$nationality=$rows[nationality];
}
$proId =$_GET[proid];
$q="SELECT * FROM `housing` WHERE `id`='$proId'";
$qrun=mysqli_query($connection,$q);
while($rows=mysqli_fetch_array($qrun)){
    $enname = $rows[enname];
    $arname = $rows[arname];
    $enplace = $rows[enplace];
    $arplace = $rows[arplace];
    $partnum = $rows[partnum];
    $endescrip = $rows[endescrip];
    $ardescrip = $rows[ardescrip];
    $floors = $rows[floors];
    $garage = $rows[garage];
    $grageprice = $rows[grageprice];
    $auth=$rows[auth];
    $areaNum=$rows[areaNum];
    $areaText=$rows['areaText'];
    $code=$rows['code'];
    $bahry=$rows['bahry'];
    $shary=$rows['shary'];
    $ably=$rows['ably'];
    $grby=$rows['grby'];
}
$arrUnits = unserialize($_GET["units"]); 
$unitfloor =[];
$unitNum =[];
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
$contractNum = $_GET[conNum];
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
						<h2>Unit Contract</h2>
						<ul class="nav navbar-right panel_toolbox">
							<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
						</ul>
						<div class="clearfix"></div>
              		</div>
                  <div class="x_content">
<form class="form-horizontal form-label-left" novalidate  action="bookk.php"  method="post" target="_blank">
<input type="hidden" value="<?php echo $customerId;?>" name="cId">
<input type="hidden" value="<?php echo $proId;?>" name="pId">
<div class="item form-group">
	<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">بيانات العميل:  </label>
    </div>
<div class="item form-group">
	<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">أسم العميل:  </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
    	<input id="uname" class="form-control col-md-7 col-xs-12"  name="cname" placeholder="User Name" required="required" type="text" value="<?php echo $fname;?>" readonly>
	</div>
</div>
<div class="item form-group">
	<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">عنوان العميل:  </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
    	<input id="uname" class="form-control col-md-7 col-xs-12" name="cname" placeholder="User Name" required="required" type="text" value="<?php echo $address;?>" readonly>
	</div>
</div>
<div class="item form-group">
	<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">رقم البطاقة:  </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
    	<input id="uname" class="form-control col-md-7 col-xs-12"  name="ssn" placeholder="User Name" required="required" type="text" value="<?php echo $ssn;?>" readonly>
	</div>
</div>
<div class="item form-group">
	<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">رقم التليفون:  </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
    	<input id="uname" class="form-control col-md-7 col-xs-12"  name="phones" placeholder="User Name" required="required" type="text" value="<?php echo $phone1.' , '.$phone2?>" readonly>
	</div>
</div>
<div class="item form-group">
	<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">البريد الإليكترونى:  </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
    	<input id="uname" class="form-control col-md-7 col-xs-12"  name="email" placeholder="User Name" required="required" type="text" value="<?php echo $email;?>" readonly>
	</div>
</div>
<div class="item form-group">
	<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">الجنسية:  </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
    	<input id="uname" class="form-control col-md-7 col-xs-12"  name="email" placeholder="User Name" required="required" type="text" value="<?php echo $nationality;?>" readonly>
	</div>
</div>
<div class="item form-group">
	<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">الديانة:  </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
    	<input id="uname" class="form-control col-md-7 col-xs-12"  name="email" placeholder="User Name" required="required" type="text" value="<?php echo $dyana;?>" readonly>
	</div>
</div>
<hr>
<div class="item form-group">
    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">بيانات المشروع: </label>
</div>
<div class="item form-group">
	<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">أسم المشروع:  </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
    	<input id="uname" class="form-control col-md-7 col-xs-12"  name="proname" placeholder="User Name" required="required" type="text" value="<?php echo $arname;?>" readonly>
	</div>
</div>
<div class="item form-group">
	<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">عنوان المشروع:  </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
    	<input id="uname" class="form-control col-md-7 col-xs-12"  name="proplace" placeholder="User Name" required="required" type="text" value="<?php echo $arplace;?>" readonly>
	</div>
</div>
<div class="item form-group">
	<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">رقم القطعه:  </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
    	<input id="uname" class="form-control col-md-7 col-xs-12"  name="part" placeholder="User Name" required="required" type="text" value="<?php echo $partnum;?>" readonly>
	</div>
</div>
<div class="item form-group">
	<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">سعر باكية الجراج:  </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
    	<input id="uname" class="form-control col-md-7 col-xs-12"  name="gragePrice" placeholder="User Name" required="required" type="text" value="<?php echo $grageprice;?>" readonly>
	</div>
</div>
<div class="item form-group">
	<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">توكيل البيع:  </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
    	<input id="uname" class="form-control col-md-7 col-xs-12"  name="gragePrice" placeholder="User Name" required="required" type="text" value="<?php echo $auth;?>" readonly>
	</div>
</div>
<div class="item form-group">
	<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">مساحة المشروع بالأرقام:  </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
    	<input id="uname" class="form-control col-md-7 col-xs-12"  name="gragePrice" placeholder="User Name" required="required" type="text" value="<?php echo $areaNum;?>" readonly>
	</div>
</div>
<div class="item form-group">
	<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">مساحة المشروع بالحروف:  </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
    	<input id="uname" class="form-control col-md-7 col-xs-12"  name="gragePrice" placeholder="User Name" required="required" type="text" value="<?php echo $areaText;?>" readonly>
	</div>
</div>
<div class="item form-group">
	<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">كود الحجز:  </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
    	<input id="uname" class="form-control col-md-7 col-xs-12"  name="gragePrice" placeholder="User Name" required="required" type="text" value="<?php echo $code;?>" readonly>
	</div>
</div>
<div class="item form-group">
	<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">الحد البحري:  </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
    	<input id="uname" class="form-control col-md-7 col-xs-12"  name="gragePrice" placeholder="User Name" required="required" type="text" value="<?php echo $bahry;?>" readonly>
	</div>
</div>
<div class="item form-group">
	<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">الحد القبلي:  </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
    	<input id="uname" class="form-control col-md-7 col-xs-12"  name="gragePrice" placeholder="User Name" required="required" type="text" value="<?php echo $ably;?>" readonly>
	</div>
</div>
<div class="item form-group">
	<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">الحد الشرقي:  </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
    	<input id="uname" class="form-control col-md-7 col-xs-12"  name="gragePrice" placeholder="User Name" required="required" type="text" value="<?php echo $shary;?>" readonly>
	</div>
</div>
<div class="item form-group">
	<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">الحد الغربي:  </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
    	<input id="uname" class="form-control col-md-7 col-xs-12"  name="gragePrice" placeholder="User Name" required="required" type="text" value="<?php echo $grby;?>" readonly>
	</div>
</div>
<hr>
<div class="item form-group">
	<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">الوحدات:  </label>
    </div>
<?php
foreach($unitfloor as $key => $value){
echo '    
<div class="item form-group">

<label class="control-label col-md-2 col-sm-3 col-xs-12" for="name">  تفاصيل الوحدة '.($key+1).' :  </label>
</div>
<div class="item form-group">

<label class="control-label col-md-2 col-sm-3 col-xs-12" for="name">الدور:  </label>

    <div class="col-md-3 col-sm-6 col-xs-12">
    	<input id="uname" class="form-control col-md-3 col-xs-12"  name="uf['.$key.']" placeholder="User Name" required="required" type="text" value="'.$value.'" readonly>
	</div>
    
<label class="control-label col-md-2 col-sm-3 col-xs-12" for="name">رقم الوحدة:  </label>
    <div class="col-md-3 col-sm-6 col-xs-12">
    	<input id="uname" class="form-control col-md-7 col-xs-12"  name="ufl['.$key.']" placeholder="User Name" required="required" type="text" value="'.$unitNum[$key].'" readonly>
	</div><br><br>

<label class="control-label col-md-2 col-sm-3 col-xs-12" for="name">موقعها بالمشروع:  </label>
    <div class="col-md-3 col-sm-6 col-xs-12">
    	<input id="uname" class="form-control col-md-7 col-xs-12"  name="uloc['.$key.']" placeholder="User Name" required="required" type="text" value="'.$unitLoc[$key].'" readonly>
	</div>

<label class="control-label col-md-2 col-sm-3 col-xs-12" for="name">مساحة الوحدة:  </label>
    <div class="col-md-3 col-sm-6 col-xs-12">
    	<input id="uname" class="form-control col-md-7 col-xs-12"  name="uarea['.$key.']" placeholder="User Name" required="required" type="text" value="'.$unitArea[$key].'" readonly>
	</div><br><br>
<label class="control-label col-md-2 col-sm-3 col-xs-12" for="name">سعر المتر بالوحدة:  </label>
    <div class="col-md-3 col-sm-6 col-xs-12">
    	<input id="uname" class="form-control col-md-7 col-xs-12"  name="uprice['.$key.']" placeholder="User Name" required="required" type="text" value="'.$unitPrice[$key].'" readonly>
	</div>

<label class="control-label col-md-2 col-sm-3 col-xs-12" for="name">اجمالي سعر الوحدة:  </label>
    <div class="col-md-3 col-sm-6 col-xs-12">
    	<input id="uname" class="form-control col-md-7 col-xs-12"  name="utot['.$key.']" placeholder="User Name" required="required" type="text" value="'.$unitTotal[$key].'" readonly>
	</div>
<br><br>
</div>

';    }
?>
<div class="item form-group">
<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">اجمالي العقد:  </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
    	<input id="uname" class="form-control col-md-7 col-xs-12"  name="contractTot" placeholder="User Name" required="required" type="text" value="<?php echo $contractTot;?>" readonly>
	</div>
</div>
<div class="item form-group">
<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">رقم الحجز:  </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
    	<input id="uname" class="form-control col-md-7 col-xs-12"  name="contractNum" placeholder="User Name" required="required" type="text" value="<?php echo $contractNum;?>" readonly>
	</div>
</div>

<div class="item form-group">
<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">قيمة الحجز:  </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
    	<input id="uname" class="form-control col-md-7 col-xs-12"  name="contractTot" placeholder="User Name" required="required" type="text" value="<?php echo $_GET[pay];?>" readonly>
	</div>
</div>
<div contenteditable="true" style="color:black" id="page1" >
    <div dir="rtl" class="text-right">
        <h4 class="text-center main-title">نموذج حجز<br>وحدة سكنيه تحت الإنشاء</h4>
        <div class="py-2 px-5">
            <?php echo "إنه فى يوم ".$days[date('l')]." الموافق ".date("d")." / ".date("m")." / ".date("Y")."<br>"
        ;?>
            
        </div>
    </div>
</div> 
<br><br><br><br>
<textarea id="txt1" hidden name="p1"></textarea>    
<div class="ln_solid"></div>
<div class="form-group">
<script>
function changeLocation (){
    setTimeout(function(){
        window.location = "manage-booking.php?customer=<?php echo $customerId;?>";},200);
    }
</script>
<hr>
    </div>
<div class="col-md-6 col-md-offset-3">
   	<input type="submit" id="send" class="btn btn-success" value="Submit" onclick="changeLocation();">
</div>
</form>
</div>

    </div></div></div></div></div>
<script src="../vendors/jquery/dist/jquery.min.js"></script>
<script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="../vendors/nprogress/nprogress.js"></script>
<script src="../vendors/validator/validator.js"></script>
<script src="../build/js/custom.min.js"></script>
<script>
     document.getElementById("txt1").innerHTML =
    document.getElementById("page1").innerHTML;
        $('#page1').bind("DOMSubtreeModified",function(){
             document.getElementById("txt1").innerHTML =
    document.getElementById("page1").innerHTML;
        })
           
        
    </script>
</body></html>