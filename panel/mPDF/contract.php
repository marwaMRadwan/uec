<?php
require_once __DIR__ . '/vendor/autoload.php';
use Mpdf\Mpdf;
$mpdf = new Mpdf();
$mpdf->SetDirectionality('rtl');

$mpdf->WriteHTML('
<!DOCTYPE html>
<html    >
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>

<link href="style.css" rel="stylesheet">
</head>
<body>
'.$_POST['text'].'
</body>
</html>');
$output = $mpdf->Output("files/file1.pdf",'F');
$mpdf->Output();
// file_put_contents("files/file.pdf", $output);
?>