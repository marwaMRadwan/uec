<?php
require "db.php";
require "functions.php";
session_start();
unset($_SESSION[recErr]);
if(empty($_SESSION['id'])) header ('Location:index.php?error=Please Login');
$ree =$_POST['recieptNum'];
$conNum=$_POST[contractnum];
$cusId = $_GET[customer];
$partId=$_POST[partid];
$llll= 'add-rec.php?partid='.$partId.'&customer='.$cusId.'&conNum='.$conNum;
$result=mysqli_query($connection,"SELECT COUNT(*) AS total  FROM `payments` WHERE `recNum`='$ree'");
$data=mysqli_fetch_assoc($result);
echo 'tot'.$data['total'];
if($data['total']) {
$_SESSION['recErr']="reciepet number used before";

header("Location:".$llll);
die();
}


//https://uec-realestate.com/panel/production/


require_once __DIR__ . '/vendor/autoload.php';
use Mpdf\Mpdf;
$mpdf = new Mpdf();
$mpdf->SetDirectionality('rtl');
$receipt_content_table = '
<table style="width:100%;">
    <tr >
        <td colspan="2">
            <img class="img" src="header.jpg" style="width:100%"/>
        </td>
    </tr>
    <tr >
        <td style="text-align:center" colspan="2">
            <h1 >ايصال استلام نقديه</h1>
            <h3 >رقم الايصال : <span>'.$_POST[recieptNum].'</span></h3>
        <h3 >رقم العقد : <span>'.$_POST[contractnum].'</span></h3>        
        </td>
    </tr>
    <tr >
        <td>
        <div >مشروع : <span > '.$_POST[proName].'</span></div>
        </td>
        <td width="50%">
        <div>العنوان : <span> '.$_POST[proAddr].'</span></div>
        </td>
    </tr>
    <tr>
    <td>
    
    <div >رقم الوحده  : <span> '.$_POST[Units].'</span></div>

    </td>
    <td>
    <div >مساحة الوحده : <span>'.$_POST[Areas].' م </span></div>

    </td>
    </tr>
    <tr >
        <td colspan = "2">
            <h3>استلمنا من السيد / <span> '.$_POST[cname].'</span></h3>
            <h3> مبلغ / <span>'.$_POST['priceNum'].'</span>ج فقط و قدره <span>'.$_POST['priceTxt'].'</span></h3>
            <h3>و ذلك قيمة /<span>'.$_POST['payFor'].' مستحق في '.$_POST['ddd'].'</span></h3>
            <h3> و ذلك بتاريخ / <span>'.$_POST[recDate].'</span></h3>
        </td>
    </tr>
    <tr>
        <td width="70%"><h4>امين الخزنه</h4><br><br><br></td>
        <td width="30%"><h4> يعتمد رئيس مجلس الاداره</h4><br><br><br></td>
    </tr>
</table>
';
$stylesheet = file_get_contents('receipt_style.css');
$mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);
$mpdf->WriteHTML('
<!DOCTYPE html>
<html >
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
</head>
<body>
'. $receipt_content_table .'
<div style="margin:20px;padding:30px;border-bottom:1px solid #000"> </div>
'. $receipt_content_table .'
</body>
</html>');
$filename = "files/".time().".pdf";
$output = $mpdf->Output($filename,'F');
$mpdf->Output();
$sql = "INSERT INTO `payments`(`id`, `recNum`, `proname`, 
`address`, `units`, `areas`, `client`, `date`, `pfor`, 
`priceNum`, `priceTxt`,`file`,`conNum`,`paynum`) 
VALUES (null,'$_POST[recieptNum]','$_POST[proName]',
'$_POST[proAddr]','$_POST[Units]','$_POST[Areas]',
'$_POST[cname]','$_POST[recDate]','$_POST[payFor]',
'$_POST[priceNum]','$_POST[priceTxt]','$filename',
'$_POST[contractnum]','$_POST[partid]')";
mysqli_query($connection,$sql);
$sql ="UPDATE `pay` SET `paid` = paid + '$_POST[priceNum]', `discount`= discount+'$_POST[discount]' WHERE `id` = '$_POST[partid]'";
mysqli_query($connection,$sql);
$sql ="UPDATE `pay` SET `remain` = payval - paid - discount WHERE `id` = '$_POST[partid]'";
mysqli_query($connection,$sql);

$to_email = 'elsayh_85@yahoo.com';
$subject = 'Reciept payment';
$message = 'Recipt paid for client: '.$_POST[cname].'and paid'.$_POST[priceNum];
$headers = 'From: united egyptian company';
mail($to_email,$subject,$message,$headers);
header("Location:mamage-rec.php?customer=".$_GET[customer])

?>