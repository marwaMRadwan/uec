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
$mpdf = new Mpdf();

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
$mpdf->SetMargins(0, 0, 40);
$mpdf->WriteHTML('
    <!DOCTYPE html>
    <html>
    <head><link href="style.css" rel="stylesheet"></head>
    <body>'. $_POST['p1'].'</body></html>');

$filename = "files/".time().".pdf";
$output = $mpdf->Output($filename,'F');
//$mpdf->Output();
$cId= $_POST[cId];
$pId= $_POST[pId];
$units=$m;
    

    
if(count($units)==2){
$sql="INSERT INTO `booking`(`id`, `cid`, `pid`, `unit1`, `unit2`,`qnum`,`contractfile`) VALUES (null,'$cId','$pId','$units[0]','$units[1]','$qnum','$filename')";    
}
else{
    $sql="INSERT INTO `booking`(`id`, `cid`, `pid`, `unit1`,`qnum`,`contractfile`) VALUES (null,'$cId','$pId','$units[0]','$qnum','$filename')";    
}

if(mysqli_query($connection,$sql)) {
    foreach($units as $v) {
        $sql = "UPDATE `units` SET `status`=2 WHERE `unitNum`='$v'";
        mysqli_query($connection,$sql);
    }
    
    
}

?>
<script>
window.close();
</script>
</body>
</html>