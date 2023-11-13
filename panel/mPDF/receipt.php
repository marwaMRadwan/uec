<?php
require_once __DIR__ . '/vendor/autoload.php';
use Mpdf\Mpdf;
$mpdf = new Mpdf();
$mpdf->SetDirectionality('rtl');

$stylesheet = file_get_contents('receipt_style.css');
$mpdf->WriteHTML($stylesheet,\Mpdf\HTMLParserMode::HEADER_CSS);

$mpdf->WriteHTML('
<!DOCTYPE html>
<html >
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <style>
    body{
    font-family:Arial;
}
*{
    box-sizing: border-box;
}
.header{
    width:80%;
    padding: 30px;
}
.img{
    width:100px;
    height:100px;
    float: left;
}
.header .details{
    float: right;
    width:40%;
    text-align: right;

}
.clear{
    clear: both;
}
.content{
    width:80%;
    padding: 30px;
}
.content h1 ,.content h3 {
    text-align: center;
}
.content .details h4 {
    width:100%;
    float: right;
    text-align: right;
    margin: 3px;
}
.center {
    
    margin: 0 auto;
    text-align: right;
}
.center h3{
    margin:4px;
    text-align: right;

}
.left{
    float: left;
    display: inline-block;
}
span{
    margin: 10px;
    padding: 5px;
    background-color: #eee;
}
.right{
    float: right;
    display:inline-block;
}
</style>
</head>
<body>
    
        <img class="img" src="images/pngtree-human-character-with-green-tree-logo.-png-image_3732560.jpg"/>
        <div class="details"> 
            <h3>اسم الشركه</h3>
            <h4>عنوان الشركه</h4>
            <h4>012211222</h4>
        </div>
    
    <div class="clear"></div>
    <div class="content">
        <h1>ايصال استلام نقديه</h1>
        <h3>رقم الايصال : <span>400</span></h3>
        <div class="details">
            <h4>مشروع : <span> اسم المشروع</span></h4>
            <h4>العنوان : <span> عنوان المشروع</span></h4>
            <h4>رقم الوحده  : <span> 15-ب</span></h4>
            <h4>مساحة الوحده : <span>150 م</span></h4>
        </div>
    <div class="clear"></div>

            <div class = "center">
                    <h3>استلمنا من السيد / <span> اسم العميل</span></h3>
                    <h3> مبلغ / <span>'.$_POST['price-dig'].'</span>فقط و قدره <span>'.$_POST['price-let'].'</span></h3>
                    <h3>و ذلك قيمة /<span>'.$_POST['pay-for'].'</span></h3>
                    <h3> و ذلك بتاريخ / <span>02/11/2019</span></h3>

            </div>
            
        
        <div class="clear"></div>
        
        <div class="right">يعتمد رئيس مجلس الاداره</div>   
        <div class="left">امين الخزنه</div>
        <div class="clear"></div>
    </div>
</body>
</html>');
$output = $mpdf->Output("files/file3.pdf",'F');
$mpdf->Output();
// file_put_contents("files/file.pdf", $output);
?>