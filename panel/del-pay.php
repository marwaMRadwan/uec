<?php
require "db.php";
require "functions.php";
echo 'http://uec-realestate.com/panel/production/add-payment1.php?units=a:1:{i:0;s:1:%221%22;}&proid=10&customer=6&conNum=1577823177&grage=&start=5000&discount=120<br>';
$link=$_GET[link].'&proid='.$_GET[proid].'&customer='.$_GET[customer].'&conNum='.$_GET[conNum].'&grage='.$_GET[grage].'&start='.$_GET[start].'&discount='.$_GET[discount].'&adate='.$_GET[adate];
echo $link;
$i = $_GET[id];
   $q="DELETE FROM `pay` WHERE `id`='$i'";
    $qrun=mysqli_query($connection,$q);
header("Location:".$link);
?>

