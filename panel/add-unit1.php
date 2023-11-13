<?php
require "db.php";
require "functions.php";
	session_start();
if(empty($_SESSION['id'])) header ('Location:index.php?error=Please Login');
if($_SERVER["REQUEST_METHOD"] == "POST") {
    header("Location:manage-contracts.php");
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
$discount = $_GET[discount];
$start = $_GET[start];
//SELECT `id`, `page1`, `page2` FROM `contract_details` WHERE 1
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
<form class="form-horizontal form-label-left" novalidate  action="contract.php"  method="post" target="_blank">
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
    	<input id="uname" class="form-control col-md-7 col-xs-12"  name="cname" placeholder="User Name" required="required" type="text" value="<?php echo $address;?>" readonly>
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

';    }?>
<div class="item form-group">
<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">اجمالي العقد:  </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
    	<input id="uname" class="form-control col-md-7 col-xs-12"  name="contractTot" placeholder="User Name" required="required" type="text" value="<?php echo $contractTot;?>" readonly>
	</div>
</div>
<div class="item form-group">
<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">رقم العقد:  </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
    	<input id="uname" class="form-control col-md-7 col-xs-12"  name="contractNum" placeholder="User Name" required="required" type="text" value="<?php echo $contractNum;?>" readonly>
	</div>
</div>
<div class="item form-group">
<label class="control-label col-md-3 col-sm-3 col-xs-12" for="name">المقدم :  </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
    	<input id="uname" 
        class="form-control col-md-7 col-xs-12" 
         name="start" placeholder="User Name" required="required" type="text" value="<?php echo $start;?>" readonly>
	</div>
</div>

<div class="item form-group">
<label class="control-label col-md-3 col-sm-3 col-xs-12" 
for="name">الخصم :  </label>
    <div class="col-md-6 col-sm-6 col-xs-12">
    	<input id="uname" 
        class="form-control col-md-7 col-xs-12"  
        name="dis" placeholder="User Name" required="required" type="text" value="<?php echo $discount;?>" readonly>
	</div>
</div>


<div contenteditable="true" style="color:black" id="page1" >
    <div dir="rtl" class="text-right">
        <h4 class="text-center main-title">
            عقد بيع و تخصيص وحدة سكنيه تحت الإنشاء</h4>
        <h5 class="text-center">رقم العقد: 
        <?php echo $contractNum; ?>
        </h5>
        <div class="py-2 px-5">
            <?php echo "إنه فى يوم -------- الموافق ".$_GET[adate]."<br>";?>
            <div>بين كلا من : <br>أولا :السيد / وليد أحمد عطا السايح بصفته  <?php echo $auth.' ';?> ومقره/  4 عمارات النرجس – التجمع الخامس  <br>
                <p class="text-left">" طرف أول – بائع "</p>    
            </div>
            <div>
            ثانيا السيد/ <?php echo $fname."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";?>رقم قومي / <?php echo $ssn ."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";?> الديانه / <?php echo $dyana."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";?>الجنسية / <?php echo $nationality."&nbsp;&nbsp;";?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; مقيم في <?php echo "/ ".$address."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";?><br>
            <p class="text-left">" طرف ثانى – مشتري "</p>
        </div>
            <div >
            <h5 class="text-center">بند تمهيدي</h5>
            <li>
                يمتلك الطرف الاول بصفته <?php echo $auth.' ';?>
                قطعة <?php echo $arname.' '.$arplace;?>
                والبالغ مساحتها
                 <?php echo $areaNum.' ';?> م2 فقط ( 
                    <?php echo $areaText.' ';?> - ) ( 
                        <?php echo $code.' ';?> ) والمحددة الحدود والمعالم كالتالي :
            </li>
            <li class="list-unstyled">
الحد البحري :  <?php echo $bahry.' ';?> - الحد القبلي   : <?php echo $ably.' ';?> 
            </li>
                <li class="list-unstyled">
الحد الشرقي :  <?php echo $shary.' ';?> - الحد الغربي  :  <?php echo $grby.' ';?> 
            </li>
            <li class="list-unstyled">
                وذلك حسبما ورد بمحضر التسليم ، و أصبح " الطرف الأول " مالكا لقطعه الأرض سالفه الذكر ، ولما كان قد رغب " الطرف الثاني " في شراء وحدة سكنية ضمن وحدات العقار المزمع إنشاءه علي قطعه الأرض سالفه الذكر ، وقد تلاقت معه إرادة الطرف الأول القابل لبيع الوحده السكنية وبعد أن اقر كلا من الطرفين بكامل أهليتهما للتعاقد و أنهما غير خاضعين لأي من أحكام الحراسة أتفقا علي الآتي :-
            </li>
        </div>    
        </div>
    </div>
</div> 
<div contenteditable="true" style="color:black" id="page2">
    <div dir="rtl" class="text-right">
        <h4 class="text-center main-title">البند الأول</h4>
        <li>
            يعتبر البند التمهيدي السابق جزأ لا يتجزأ من هذا العقد ومكملا ومتمما لبنوده .
        </li><br>
        <h4 class="text-center main-title">البند الثاني</h4>
        <li>
            بموجب هذا العقد قد باع و أسقط وتنازل بكافه الضمانات الفعليه والقانونية الطرف الأول ( بائع ) الي الطرف الثاني ( مشتري ) الوحده السكنيه الموضح بياناتها كالتالي:<br>
            <br>
            
            <?php
foreach($unitfloor as $key => $value){
echo '  
<p>تفاصيل الوحدة '.($key+1).' :<p>
<p>الدور : '.$value.' <p>
<p>رقم الوحدة : '.$unitNum[$key].' </p>
<p>موقع الوحدة : '.$unitLoc[$key].' </p>
<p>مساحة الوحدة: '.$unitArea[$key].' م2 محملة بالمنافع والخدمات تحت العجز والزيادة</p>
<p>سعر المتر بالوحدة : '.$unitPrice[$key].' جم </p>
<p>إجمالي السعر للوحدة '.($key+1).' : '.$unitTotal[$key].' جم </p>

';    }?>
            
            <?php if($_GET[grage]=='on'){
$grage1=$grageprice;
echo "<p>تكلفة باكيه الجراج  ".$grageprice."جم </p>";
            echo "بالإضافه الي  مكان مخصص لايواء 
            عدد واحد سيارة ملاكي من مساحة 
            الجراج للوحدة السكنية وذلك بالعقار المزمع
             انشاءه علي قطعة الارض ";}?>
             بالمشروع 
             رقم
            <?php echo $arname." ".$arplace;?>  .
        </li><br>
        <h4 class="text-center main-title">البند الثالث</h4>
        <li>
          أقر الطرف الأول ( البائع ) بأن الأرض المزمع إنشاء العقار عليها والوحدة السكنية محل التعاقد لم يسبق له التصرف فيها من قبل و خالية من كافة الحقوق العينية الأصلية أو التبعية كالرهن والإمتياز و حقوق الإنتفاع والإرتفاق ظاهره كانت أو خفيه كما يقر البائع أنه مالك للأرض و حائز لها حيازه هادئه و مستقره و انه لا يتنازع فيها أحد كما أنها خاليه من أي إلتزامات للغير و أن أية أقساط أو مبالغ مستحقة عليها لصالح جهاز مدينة القاهرة الجديدة أو بنك الاسكان والتعمير من التزامات الطرف الاول حيث يقوم الطرف الاول بتسديدها دون مطالبة الطرف الثاني بأي مصاريف .  
        </li><br>
        <h4 class="text-center main-title">البند الرابع</h4>
        <li>
            تم هذا البيع بإيجاب وقبول صحيحين من كلا الطرفين بإجمالي مبلغ  وقدره <?php echo ($contractTot-$discount+$grage1);?> 
            جم فقط <br>
            <?php 
            if($_GET[grage]=='on'){
                echo " شاملة قيمة مساحة في الجراج تخص سيارة واحـدة";}?>            
            وسدد منهم الطرف الثاني الي الطرف الأول بمجلس العقد دفعة تعاقـد  وقدرها 
            <?php echo $start;?>
             جم (..........الف جـنيـها مصريـا لا غير ) ويعد توقيع الطرف الأول علي هذا العقد بمثابة اقرار بإستلامه من الطرف الثاني دفعـة التعاقـد كاملـة .
        </li><br>
        <h4 class="text-center main-title">البند الخامس </h4>
        <li>
            صار الأتفاق بين طرفي التعاقد علي سداد  باقي الثمن و البالغ
            <?php echo ($contractTot-$discount-$start+$grage1);?>
            جم فقط (.................................... جنيها مصريا لا غير) تسدد كالتالي:
            <br>
    <table border="1" cellspacing="0" cellpadding="0" width="100%">
        <tr>
            <th class="text-right">م</th>
            <th class="text-right">تاريخ الاستحقاق</th>
            <th class="text-right">نوع الدفعة</th>
            <th class="text-right">قيمة الدفعة</th>
        </tr>
  <?php 
        $i=0;
    $sqq ="SELECT `id`, `contractnum`, `status`, `paydate`, `paytype`, `payval`, `comment` FROM `pay` WHERE  `contractnum`='$contractNum' AND `tt`='0'";
  $qrunss=mysqli_query($connection,$sqq);
    while($rows=mysqli_fetch_array($qrunss)){
        $i+=1;
    echo 
        "<tr>
        <td class='text-right'>".$i."</td>
        <td class='text-right'>".$rows[paydate]."</td>
        <td class='text-right'>".$rows[paytype]."</td>
        <td class='text-right'>".$rows[payval]." جم </td>
        </tr>";
        
    }
        ?>
        
    </table>
    <br>
    وفي حالة التأخر عن سداد أي قسط في موعده تضاف غرامة تأخير قدرها نصف بالمائة من قيمة القسط عن كل يوم تأخير تحسب بعد اليوم العاشر من تاريخ استحقاق القسط .
        </li><br>
        <h4 class="text-center main-title">البند السادس</h4>
        <li>
            يشمل هذا البيع حصه شائعه في كامل مساحة الأرض المقام عليها العقار ، وكذلك حصه شائعه في المدخل والمناور و السلم وكل ما كان معد للاستخدام و المنافع المشتركه ، كما اتفق الطرفان ان البيع لا يشمل سطح المبني الكائن به الوحدة المباعة او مايعلوه حاليا او مستقبلا (ولكن له الحق في وضع الدش فوق الشخشيخه ) وقبول الطرف الثاني " المشتري " الصريح لأي تعديل يجرية الطرف الاول " البائع " طبقا للقانون وطبقا لسلامة المبني دون حق  الطرف الثاني " المشتري " الاعتراض بشأن ذلك او في الرجوع علي الطرف الاول " البائع " بأي شيء بسبب ذلك حاليا او مستقبلا قبل التسليم أو بعده .
        </li><br>
        <h4 class="text-center main-title">البند السابع </h4>
        <li>
            صار الإتفاق بين الطرفين علي أنه في حاله تأخر الطرف الثاني عن سداد أي دفعة من الدفعات المستحقة في 
            <?php echo date("d")." / ".date("m")." / ".date("Y")." م ";?>
             و 
            <?php echo date("d")." / ".date("m")." / ".(date("Y")+1)." م ";?>
            
 لمدة شهرين عن تاريخ الاستحقاق أو التأخر عن سداد قسطين متتالين من الاقساط الربع سنوية عن تاريخ استحقاقها يكون العقد مفسوخا من تلقاء نفسه دون إنذار أو تنبيه أو الحصول علي حكم قضائي ، ويتم الاسترداد بعد خصم 10% مصروفات ادارية من اجمالي ثمن الوحدة المذكورة ، و في جميع الأحوال يكون العقد مفسوخا من تلقاء نفسه دون إعذار أو إنذار أو الحصول علي حكم قضائي في حال عدم سداد الطرف الثاني لكامل الثمن خلال ستون يوما من تاريخ حلول أجل آخر قسط . ويتم رد المبالغ المدفوعة بعد خصم 10% مصروفات إدارية من كامل ثمن الوحدة المذكورة تخصم  من مستحقاته         </li><br>
        <h4 class="text-center main-title">البند الثامن </h4>
        <li>
        يلتزم الطرف الأول بتسليم الطرف الثاني الوحدة محل هذا العقـد خلال ثـلاثـــون شهــرا من تاريخ التعاقد ولايسـري ميعاد التسليم المشار اليه اذا كان التأخير في التسليم راجع لاسباب اضطرارية وظروف قهريـة - لا قـدر الله - لا دخل لارادة الطرف الأول ( البائع ) فيها ودون ذلك اذا تأخر الطرف الاول عن موعد التسليم المحدد بأكثر من ستة أشهر وبحد اقصي اثنا عشر شهرا يلتزم بدفع غرامة مالية للطرف الثاني قدرها واحد بالمائة من قيمة الوحدة عن كل شهر تأخير بعد الشهر السادس، ويتم تحرير شيكات بنكية بالأقساط التي تستحق  بعد تاريخ استلام الوحدة محل التعاقد وهذه الشيكات بمثابـة سـداد لهذه الاقساط المتبقية ولا تبرأ ذمـة الطرف الثاني من هذه الاقساط الا بعد صـرف قيمـة هذه الشيكات أو سـدادها نقـدا واستردادها من الطرف الاول ( البائع ).
واذا تخلف الطرف الثانـي عن استلام الوحـدة موضوع العقـد يقوم الطرف الاول باخطاره بخطاب مسجل أو بالبريد الالكتروني أو بأي وسيلة طبقا للبند الحادي و العشرون للحضور واستلام الوحـدة ويتعين علي الطرف الثاني أن يتقدم لاستلام الوحـدة موضوع العقـد خلال خمسة عشر يوما من تاريخ اخطاره وبانقضاء هذه الفترة يعتبر التسليم قـد تـم من جانب الطرف الأول .



        </li><br>
        <h4 class="text-center main-title">البند التاسع </h4>
        <li>
            يقر الطرف الاول (البائع ) بأنـه سيقوم بتسليم الوحـدة علي النحو الاتـي : الوحـدة من الداخل علي الطوب الأحمـر وصحي خارجي (صواعد تغذيـة وصـرف ) وصـواعد الكهرباء ( مواسير فارغة ) و باب شقة خارجي وبالنسبـة للعمارة كاملة التشطيب والشبابيك الخارجية (للواجهة الامامية فقط) من الالومنيوم والسلالم رخام والمداخل رخام وجرانيت والواجهات دهانات وحديد مشغول طبقا للتصميم المرفق وتشطيب الجراج وغرفة الحارس علي أن يتحمل الطرف الثاني ( المشتري ) تكلفة مقايسـة عداد الكهرباء ومستلزمات التركيب داخل المبني وحوامل صرف التكييفات للوحـدة المباعـة موضوع العقـد كما يلتزم الطرف الأول بادخال المرافق من مياه و كهرباء وصـرف صحـي للمبني فور تسليم المبني لجهاز القاهرة الجديدة وانهاء كافة الاجراءات امام الجهات المختلفة. 
        </li> <br>
        <h4 class="text-center main-title">البند العاشر </h4>
        <li>
            لا يحق للطرف الثاني التصرف بالبيع أو الرهن أو أي تصرف في الوحدة محل التعاقد ، ولا يعتد بأي تعاقدات فيما يخص الوحدة في مواجهه الطرف الأول الا بعد سداد كامل الثمن ، وتحرير مخالصه نهائية للوحدة المبيعة . 
        </li><br>
        <h4 class="text-center main-title">البند الحادى عشر</h4>
        <li>
                        لا يحق للطرف الثاني المطالبة بتحرير العقد النهائي إلا بعد سداد كامل الثمن المتفق عليه ، وسداد رسوم توصيل وتركيب العداد الكهربائي المقدرة من الجهة المختصة وسداد ضرائب التصرفات العقارية أو أي نوع من الضرائب تخص الوحـدة ناشئـة عن تحرير هذا العقـد.  
        </li><br>
        <h4 class="text-center main-title">البند الثاني عشر</h4>
        <li>
            يقر الطرف الأول ( البائع ) بتنازله عن حـق الامتياز علي الوحـدة المباعـة ومقوماتها فور سـداد اخر قسـط وحصول الطرف الثاني ( المشتري ) علي مخالصـة بذلك .
        </li><br>
        <h4 class="text-center main-title">البند الثالث عشر</h4>
        <li>
            من المتفق عليه أن للطرف الثاني بمجرد التوقيع علي هذا العقد حصته الشائعة في الأرض المزمع إنشاء العقار عليها و لا يحق للطرف الأول التصرف في الأرض المملوكه بأي من التصرفات الناشئه للحقوق العينية الأصلية أو التبعية كالرهن والإمتياز و حقوق الإنتفاع و الإرتفاق ظاهره كانت أو خفيه ، ولا يسري في مواجهه الطرف الثاني أي تعاقدات تخص قطعه الأرض محل إنشاء العقار المزمع أنشاءه .
        </li><br>
        <h4 class="text-center main-title">البند الرابع عشر</h4>
        <li>
            هذا البيع بات ومنجز لكل من الطرفين ، و يلتزم الطرف الاول ( البائع ) بالحضور أمام جهاز المدينة ومكتب الشهر العقاري المختص والمحكمة المختصة لمباشرة جميع إجراءات نقل الملكية للطرف الثاني أو عمل توكيل بذلك متى أخطر بذلك رسميا وذلك بعد سـداد الطرف الثاني (المشتري) كافة الاقساط والرسوم والضرائب المستحقة علية علي ان يقوم الطرف الثاني بسداد كافة الأتعاب و المصروفات و رسوم تسجيل هذا العقد ،كما يلتزم الطرف الثاني (المشتري) بتحمل وسـداد كافة ضرائب التصرفات العقارية و العوائد ، وكذلك ايه ضرائب او رسوم تفرضها الدولة ناشئة عن تحرير هذا العقد حاليا او مستقبلا.
        </li><br>
        <h4 class="text-center main-title">البند الخامس عشر</h4>
        <li>
            صار الإتفاق بين طرفي التعاقد علي أن يقتصر الإنتفاع بالحديقه علي مالك الدور الأرضي حصرا دون باقي ملاك وحدات العقار، وقد تعهد مالك الدور الأرضي بالمحافظه علي الحديقة وشكلها الجمالي وعدم إستغلاها بأي صورة تضر بباقي الملاك وعلي سبيل المثال لا الحصر إقامه أيه إنشاءات عليها ، وفي حالة مخالفته يتم إزالة المخالفة علي نفقته الخاصه.
        </li><br>
        <h4 class="text-center main-title">البند السادس عشر</h4>
        <li>
            بمجرد تسليم الوحدة المبيعه وقبل تحريرالعقد النهائي يلتزم الطرف الثاني بالمحافظه علي واجهه العقار وأساسيات العقار و كل ما كان معد للاستخدام المشترك وعدم المساس بهما بأي شكل من الأشكال ، كما يلتزم بسداد حصته في صيانة العقار والمحافظه علي المظهر الجمالي ، وفي حالة مخالفته لأي مما ذكر يلتزم بإزالة المخالفة علي نفقته الخاصة.
        </li><br>
        <h4 class="text-center main-title">البند السابع عشر</h4>
        <li>
            صار الإتفاق بين طرفي التعاقد علي أنه بعد تسليم الوحدة المبيعة وقبل تحرير العقد النهائي يلتزم الطرف الثاني بسداد 5% من قيمه الوحدة المبيعه للطرف الأول ( البائع ) علي أن يتم إيداعها بالبنك باسم الطرف الأول كوديعة صيانة للعقار علي أن يتم الصرف من عائدها علي العقار من صيانة و نظافة و أجر الحارس و إستهلاك الكهرباء الخاص بالخدمات (السلم والمصعد والجراج ) و استهلاك المياه للعقار ويقع ادارة وديعة الصيانة و عائدها المحدد بسعر الفائدة المحدد لدي البنك المركزي علي عاتق الطرف الاول ( البائع ) مع تقديم كشف حساب نصف سنوي يوضح أوجـه الصرف وفائض أو عجـز الفترة بين المصاريف الفعلية وعائـد الوديعـة علي أن يلتزم الطـرف الثاني ( المشتري ) بسداد عجز الفترة ان وجـد و ترحيل الفائض الي الفترة التالية وفي حالة تأخر الطرف الثاني عن سداد وديعة الصيانة فور استلام الوحدة موضوع العقد يلتزم بسداد مبلغ الف جنيه شهريا تبدأ من تاريخ استلام الوحدة علي أن لا يتم تحرير العقد النهائي الا بعد سداد وديعـة الصيانـة.
        </li><br>
        <h4 class="text-center main-title">البند الثامن عشر</h4>
        <li>
                                    صار الإتفاق بين طرفي التعاقد علي أنه في حالة الفسخ بسبب عدم سـداد الأقساط كما هومبين بالبند السابع أو بسبب رغبـة الطرف الثاني ( المشتري ) في فسخ التعاقـد يلتزم الطرف الأول ( البائع ) بـرد المبالغ المسـددة بعد خصم 10% ( فقط عشرة بالمائـة ) من اجمالـي ثمن الوحـدة المباعـة محل التعاقـد تخصم من مستحقاته  وذلك كمصاريف اداريـة علي أن يتم رد باقي المبالغ خلال ستون يوما من تاريخ الفسخ مع أحقيـة الطرف الأول ( البائع ) في التصرف في الوحدة المباعة محل هذا العقـد دون الرجوع للطرف الثاني ( المشتري ) في ذلك .
        </li><br>
        <h4 class="text-center main-title">البند التاسـع عشر</h4>
        <li>
            في حالـة الوفاة لأحـــد الطرفين _ لا قــدر الله _ يحل الورثــة محل مورثهم في كل البنـود السابقـة في هذا العقـد .
        </li><br>
        <h4 class="text-center main-title">البند العشرون</h4>
        <li>
            يقـر الطـرف الثاني ( المشتري ) بتنازلـه عن حـق الشفعـة لباقـي وحـدات العقـار الكائن بـه الوحـدة موضوع العقـد .
        </li><br>
        <h4 class="text-center main-title">البند الحادي و العشرون</h4>
        <li>
            صار الاتفاق بين طرفي  التعاقد علي سريان الاخطار عن طريق المراسلات بالبريد المسجل علي العنوان بصدر هذا العقد  وكذلك البريد الالكتروني أو تطبيق الواتس اب , وقد قرر الطرف الاول بان بريده الالكتروني الخاص  بالمخاطبة هو<br>a5tarshqtk@gmail.com<br>والرقم الخاص بالواتس اب للمخاطبة هو 01001269257 <br>
            كما قرر الطرف الثاني بأن بريده الالكتروني الخاص بالمخاطبة هو  <?php echo $email;?><br>والرقم الخاص بالواتس اب للمخاطبة هو : <?php echo $phone1;?>
        </li><br>
        <h4 class="text-center main-title">البند الثانـي والعشرون </h4>
        <li>
            تختص المحكمة التي يقع في دائرتها العقار علي اختلاف درجاتها بأي نزاع ينشأ لا قدر الله حول تفسير او تنفيذ هذا العقد. 
        </li><br>
        <h4 class="text-center main-title">البند الثالث والعشرون</h4>
        <li>
        تحرر هذا العقد من نسختين متطابقتين تحتوي كل نسخة علي     صفحات بالاضافة الي رسم كروكي للوحدة محل التعاقد و رسم هندسي لواجهة العقار وسلمت لكل طرف نسخة للعمل بها عند الإقتضاء .        <div>
</div>

    </div>
</div>
    <textarea id="txt1" hidden name="p1"></textarea>
    <textarea id="txt2" hidden name="p2"></textarea>
    
<div class="ln_solid"></div>
<div class="form-group">
<script>
function changeLocation (){
    setTimeout(function(){
        window.location = "manage-contracts.php?customer=<?php echo $customerId;?>";},200);
    }
</script>
<hr>
<div class="col-md-6 col-md-offset-3">
   	<input type="submit" id="send" class="btn btn-success" value="Submit" onclick="changeLocation();">
</div>
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
     document.getElementById("txt2").innerHTML =
    document.getElementById("page2").innerHTML;
        $('#page2').bind("DOMSubtreeModified",function(){
             document.getElementById("txt2").innerHTML =
    document.getElementById("page2").innerHTML;
        })
           
        
    </script>

</body></html>