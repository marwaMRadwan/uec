<?php
require "db.php";
require "functions.php";
session_start();
if(empty($_SESSION['id'])) header ('Location:index.php?error=Please Login');
if($_GET[customer]=="" ) header('Location:manage-customers.php');
if(!$_GET[customer] ){ header('Location:manage-customers.php');}
$customerId =$_GET[customer];
/*
if($_GET[recid]){
    $sql="UPDATE `pay` SET `status`='1' 
    WHERE `id`='$_GET[recid]'";
    if(mysqli_query($connection,$sql)) {
     $msg= "Updated";
     header('Location:mamage-rec.php?customer='.$_GET[customer]);
    }
}    
*/
require 'head.php';?>
<!-- Add Employee Form -->
 <div class="right_col" role="main">
 	<div class="">
    	<div class="page-title">
        	<div class="title_left">
            	<h3>reciept table</h3>
          	</div>
   		</div>
        <div class="clearfix"></div>
    	<div class="row">
        	<div class="col-md-12 col-sm-12 col-xs-12">
           		<div class="x_panel">
                	<div class="x_title">
						<h2>reciept table</h2>
						<ul class="nav navbar-right panel_toolbox">
							<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
						</ul>
						<div class="clearfix"></div>
              		</div>
                  <div class="x_content">
                      <div class="text-left">
<?php
$qs="SELECT * FROM `contract` WHERE `cid`='$_GET[customer]' 
AND `status`='1'";
 $qruns=mysqli_query($connection,$qs);
 while($rowss=mysqli_fetch_array($qruns)){
echo '
  <details>
  <summary>'.$rowss[qnum].'</summary>
  
  
                      
    <table  id="datatable" class="table table-striped table-bordered">
        <tr>
            <th>م</th>
            <th>رقم العقد</th>
            <th>تاريخ الاستحقاق</th>
            <th>نوع الدفعة</th>
            <th>قيمة الدفعة</th>
            <th>تم تحصيل</th>
            <th>الخصم</th>
            <th>المتبقي</th>
            <th>actions</th>
        </tr>
  '; 
    $i=0;
    $sqq ="SELECT * FROM `payments` WHERE  `cid`='$_GET[customer]' ";
  $qrunss=mysqli_query($connection,$sqq);
    while($rows=mysqli_fetch_array($qrunss)){
        $i+=1;
        $date=date_create($rows[date]);

    echo 
        "<tr>
        <td>".$i."</td>
        <td>".date_format($date,"d M Y")."</td>
        <td>".$rows[paytype]."</td>
        <td>".$rows[payval]."</td>
        <td>".$rows[paid]."</td>
        <td>".$rows[discount]."</td>
        <td>".$rows[remain]."</td>
        <td>";
        if($rows[payval]!=$rows[paid])
            
        echo "
        <a href='add-rec.php?partid=".$rows[id]."&customer=".$_GET[customer]."&conNum=".$rows[contractnum]."'
        class='btn btn-primary' style='width: 140px;'
         >Pay</a>
         <br>";
        else echo "تم الدفع";
        echo "
        </td>
        </tr>";
        
    }
       echo ' 
    </table>
    </details>';
    }?>
</div>

                    
    </div></div></div></div></div>
<script src="../vendors/jquery/dist/jquery.min.js"></script>
<script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="../vendors/nprogress/nprogress.js"></script>
<script src="../vendors/validator/validator.js"></script>
<script src="../build/js/custom.min.js"></script>
<script src="script.js"></script>
</body></html>