<?php 
    require "panel/production/db.php";
session_start();
if(empty($_SESSION['id'])) 
    header ('Location:customer-login.php?error=Please Login');

//$id=$_SESSION['id']);

require 'head.php';
require 'nav.php';?>

<div class="container mt-3 mb-5" style="min-height:65vh;">
  <h2>Client Area</h2>
  <br>
  <!-- Nav tabs -->
  <ul class="nav nav-tabs">
    <li class="nav-item">
      <a class="nav-link active" data-toggle="tab" href="#home">Home</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="tab" href="#menu1">My Contracts</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="tab" href="#menu2">My Reciepts</a>
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
      <td>unit 1</td>          
      <td>unit 2</td>          
      <td>contract</td>          
                </tr>
    <?php
    $_id=$_SESSION["id"];
      $q="SELECT `id`, `cid`, `pid`, `unit1`, `unit2`, `qnum`, `contractfile`, `status` FROM `contract` WHERE `cid`='$_id' AND status=1";
       $qrun=mysqli_query($connection,$q);
       while($rows=mysqli_fetch_array($qrun)){
           echo '
    <tr>
        <td>'.$rows[unit1].'</td>
        <td>'.$rows[unit2].'</td>
        <td><a href="panel/production/'.$rows[contractfile].'" target="_blank"><i class="fas fa-eye"></i> View</a></td>
    </tr>
    ';
       }
        ?>
</table>    

    </div>
    <div id="menu2" class="container tab-pane fade"><br>
<?php
$qs="SELECT * FROM `contract` WHERE `cid`='$_id' 
AND `status`='1'";
 $qruns=mysqli_query($connection,$qs);
 while($rowss=mysqli_fetch_array($qruns)){
echo '
  <details>
  <summary>'.$rowss[qnum].'</summary>
  
  
                      
    <table  id="datatable" class="table table-striped table-bordered">
        <tr>
            <th>م</th>
            <th>تاريخ الاستحقاق</th>
            <th>نوع الدفعة</th>
            <th>قيمة الدفعة</th>
            <th>تم تحصيل</th>
            <th>الخصم</th>
            <th>المتبقي</th>
            <th>file</th>
        </tr>
  '; 
    $i=0;
    $sqq ="SELECT * FROM `pay` WHERE  `cid`='$_id' AND contractnum='$rowss[qnum]' ORDER By `paydate` ASC";
  $qrunss=mysqli_query($connection,$sqq);
    while($rows=mysqli_fetch_array($qrunss)){
        $i+=1;
        $date=date_create($rows[paydate]);

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

        $sa ="SELECT * FROM `payments` WHERE   paynum='$rows[id]'";
        $qa=mysqli_query($connection,$sa);
          while($ra=mysqli_fetch_array($qa)){
              echo "<a target='_blank' href='panel/production/".$ra[file]."' class='btn btn-success'><i class='fas fa-eye'></i> view</a><br>";
          }      

        echo "
        </td>
        </tr>";
        
    }
       echo ' 
    </table>
    </details>';
    }?>



    </div>
  </div>
</div>


<?php require 'footer.php';?>