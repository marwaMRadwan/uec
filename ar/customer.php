<?php 
    require "../panel/production/db.php";
session_start();
if(empty($_SESSION['id'])) 
    header ('Location:customer-login.php?error=برجاء تسجيل الدخول');

//$id=$_SESSION['id']);

require 'head.php';
require 'nav.php';?>

<div class="container mt-3 mb-5 text-right" style="min-height:65vh;">
  <h2></h2>
  <br>
  <!-- Nav tabs -->
  <ul class="nav nav-tabs">
    <li class="nav-item">
      <a class="nav-link active" data-toggle="tab" href="#home">الرئيسية</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="tab" href="#menu1">العقود</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="tab" href="#menu2">الايصالات</a>
    </li>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div id="home" class="container tab-pane active"><br>
        <div>
    <?php
    $_id=$_SESSION["id"];
      $q="SELECT * FROM `customers` WHERE `id`='$_id'";
       $qrun=mysqli_query($connection,$q);
       while($rows=mysqli_fetch_array($qrun)){
	echo '
    <table>
    <tr>
        <td>User Name:</td>
        <td>'.$rows[fname].'</td>
    </tr>
    <tr>
        <td>User Email:</td>
        <td>'.$rows[email].'</td>
    </tr>
</table>    
    ';
       }
        ?>
    
        </div>
    </div>
    <div id="menu1" class="container tab-pane fade"><br>
            <table class="table table-striped">
<tr>
      <td>الوحدة 1</td>          
      <td>الوحدة 3</td>          
      <td>العقد</td>          
                </tr>
    <?php
    $_id=$_SESSION["id"];
      $q="SELECT `id`, `cid`, `pid`, `unit1`, `unit2`, `qnum`, `contractfile`, `status` FROM `contract` WHERE `cid`='$_id'";
       $qrun=mysqli_query($connection,$q);
       while($rows=mysqli_fetch_array($qrun)){
           echo '
    <tr>
        <td>'.$rows[unit1].'</td>
        <td>'.$rows[unit2].'</td>
        <td><a href="panel/prodution/'.$rows[contractfile].'" target="_blank">'.$rows[contractfile].'</a></td>
    </tr>
    ';
       }
        ?>
</table>    

    </div>
    <div id="menu2" class="container tab-pane fade"><br>
        <table class="table table-striped">
<tr>
      <td>التاريخ</td>          
      <td>نوع الدفعة</td>          
      <td>القيمة</td>          
      <td>ما تم دفعه</td>          
      <td>النتبقي</td>          
                </tr>
    <?php
    $_id=$_SESSION["id"];
      $q="SELECT `id`, `contractnum`, `status`, `paydate`, `paytype`, `payval`, `comment`, `cid`, `paid`, `remain`, `proid` FROM `pay` WHERE `cid`='$_id'";
       $qrun=mysqli_query($connection,$q);
       while($rows=mysqli_fetch_array($qrun)){
    
           echo '
    <tr>
        <td>'.$rows[paydate].'</td>
        <td>'.$rows[paytype].'</td>
        <td>'.$rows[payval].'</td>
        <td>'.$rows[paid].'</td>
        <td>'.$rows[remain].'</td>
    </tr>
    ';
       }
        ?>
</table>    
    </div>
  </div>
</div>


<?php require 'footer.php';?>