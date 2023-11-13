<html>
<head></head>
<body>

<?php
  require "db.php";
  require "functions.php";
  session_start();
if(empty($_SESSION['id'])) header ('Location:index.php?error=Please Login');

require_once 'vendor/autoload.php';
use Mpdf\Mpdf;
//$mpdf = new Mpdf();
$mpdf = new Mpdf(['setAutoBottomMargin' => 'pad']);

$mpdf->SetDirectionality('rtl');
$qnum=$_POST[contractNum];
$x='';               
foreach($_POST['uf'] as $key => $value) {
    $n[]=$value;
}
 
foreach($_POST['ufl'] as $key => $value) {
    $m[]=$value;
}
foreach($m as $key => $value) {
    
    $x .="رقم الدور ".$n[$key].'رقم الوحدة '. $value.'<br>';
}
$mpdf->SetMargins(50, 50, 40);
$mpdf->SetHTMLFooter(
    '<table style="width:100%;">
    <tr style="height:150;">
    <td style="width:50%;vertical-align:top;">
    الطرف الأول
    <br><br><br><br><br><br><br><br><br>
    </td>
    <td style="text-align:left;vertical-align:top;">
    الطرف الثاني
    <br><br><br><br><br><br><br><br><br>
    </td>
    </tr>
    </table>{PAGENO}'
);
$mpdf->WriteHTML('
    <!DOCTYPE html>
    <html>
    <head><link href="style.css" rel="stylesheet"></head>
    <body>
    '. $_POST['p1'].'<br>
    '. $_POST['p2'].'
    </body></html>'
);
unlink("files/".$qnum.".pdf");    
$filename = "files/".$qnum.".pdf";
$output = $mpdf->Output($filename,'F');
//$mpdf->Output();
$cId= $_POST[cId];
$pId= $_POST[pId];
$units=$m;
    
$start = $_POST[start];
$discount = $_POST[dis];

    
$sql="UPDATE `contract` SET `data1`='$_POST[p1]',`data2`='$_POST[p2]' WHERE `qnum`='$qnum'";
mysqli_query($connection,$sql);?>
<script>
window.close();
</script>
</body>
</html>