<?php
$customerName="أحمد محمد";
$customerID="12345678910123";
$dyana="مسلم";
$nationality="مصري";
$address="56 د هضبة الأهرام";
 $days =["Saturday"=>"السبت","Sunday"=>"الأحد","Monday"=>"الأثنين","Tuesday"=>"الثلاثاء","Wednesday"=>"الأربعاء","Thursday"=>"الخميس","Friday"=>"الجمعه" ];
?>
<html>
<head>
<link href="https://fonts.googleapis.com/css?family=Cairo&display=swap" rel="stylesheet">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<style>
    *{font-family: 'Arial', sans-serif;line-height:2;}
    body{padding-top:9%;padding-bottom:9%;}

</style>
</head>
<body dir="rtl" class="text-right">
    
<h4 class="text-center main-title">
نموذج عقد بيع و تخصيص<br>
وحدة سكنيه تحت الإنشاء
</h4>
<div class="py-2 px-5">
<?php echo "إنه فى يوم ".$days[date('l')]." الموافق "
.date("d")." / ".date("m")." / ".date("Y")."<br>";
?>
    <div>
    بين كلا من : <br>

أولا :السيد / وليد أحمد عطا السايح بصفته وكيلا عن السيد/ فتحي عبدالسلام عبدالسلام حسن القاري بعقد الوكالة رقم 5863 حرف ( ع ) والاخير بصفته وكيلا عن السيد / ناصر الدين حامد ابوزيد بموجب عقد وكالة رقم 4590 حرف ( ع )
 ومقره/  4 عمارات النرجس – التجمع الخامس  
<br>
<p class="text-left">" طرف أول – بائع "</p>    
</div>
<div>
ثانيا السيد/ <?php echo $customerName."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";?>
رقم قومي / <?php echo $customerID ."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";?>    
 الديانه / <?php echo $dyana."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";?>
<?php echo $nationality."&nbsp;&nbsp;";?>الجنسية
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
    مقيم في <?php echo "/ ".$address."&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";?>
    <br>
    <p class="text-left">" طرف ثانى – مشتري "</p>
</div>

<div>
<h5 class="text-center">بند تمهيدي</h5>
    <li>
    يمتلك الطرف الاول بصفته وكيلا عن السيد/ فتحي عبدالسلام عبدالسلام حسن بعقد الوكالة رقم 5863 حرف ( ع ) والاخير بصفته وكيلا عن السيد/ ناصر الدين حامـد ابوزيـد سالم بعقـد الوكالـة رقم 4590 حرف( ع ) بتاريخ 1/ 4 / 2018 م توثيق مكتب القاهرة الجديدة كامل قطعة الارض رقم 76 حرف K الحي الخامس – بيت الوطن بمدينة القاهرة الجديدة والبالغ مساحتها 670 م2 فقط ( ستمائة و سبعون متر مربع ) كود حجز رقم ( 6341921579 ) والمحددة الحدود والمعالم كالتالي :</li>
    <li class="list-unstyled">الحد البحري :  قطعة 71</li>
    <li class="list-unstyled">الحد الشرقي :  قطعة 75</li>
    <li class="list-unstyled">الحد القبلي   : شـــارع </li>
    <li class="list-unstyled">الحد الغربي  :  قطعة 77 </li>
    <li class="list-unstyled">
    وذلك حسبما ورد بمحضر التسليم ، و أصبح " الطرف الأول " مالكا لقطعه الأرض سالفه الذكر ، ولما كان قد رغب " الطرف الثاني " في شراء وحدة سكنية ضمن وحدات العقار المزمع إنشاءه علي قطعه الأرض سالفه الذكر ، وقد تلاقت معه إرادة الطرف الأول القابل لبيع الوحده السكنية وبعد أن اقر كلا من الطرفين بكامل أهليتهما للتعاقد و أنهما غير خاضعين لأي من أحكام الحراسة أتفقا علي الآتي :-
    </li>
    </div>    
    
</div>

</body>

</html>