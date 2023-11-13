<?php
require "db.php";
require "functions.php";
session_start();
if(empty($_SESSION['id'])) header ('Location:index.php?error=Please Login');

if($_GET[contract]){
    $sql="UPDATE `contract` SET `status`='1' 
    WHERE `id`='$_GET[contract]'";
    if(mysqli_query($connection,$sql)) {
     $msg= "Updated";
    header('Location:gdwl.php');
    }
}    

$cid=$_GET[customer];
$q="SELECT * FROM `customers` WHERE `id`='$cid'";
$qrun=mysqli_query($connection,$q);
while($rows=mysqli_fetch_array($qrun)){
$customerName = $rows[fname].' '.$rows[lname];
}

?>
<?php require 'head.php';?>
<div class="right_col" role="main">
<div class="clearfix"></div>
<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
    		<div class="x_title">
        		<h2>All Contracts for <?php echo $customerName;?></h2>
                <ul class="nav navbar-right panel_toolbox">
                   	<li><a class="collapse-link">
                     <i class="fa fa-chevron-up"></i></a></li>
                </ul>
                <div class="clearfix"></div>
          	</div>
            <div class="x_content">
            <table id="datatable" class="table table-striped table-bordered">
            	<thead>
                	<tr>
                    	<th>Contract</th>
                        <th>actions</th>
                 	</tr>
          		</thead>
				<tbody>
               	<?php
                    //SELECT `id`, `cid`, `pid`, `unit1`, `unit2`, `qnum`, `contractfile` FROM `contract` WHERE 1
 $qs="SELECT * FROM `contract` WHERE `status`='0'";
 $qruns=mysqli_query($connection,$qs);
 while($rowss=mysqli_fetch_array($qruns)){
					echo ' 
                	<tr>
    <td><a href="'.$rowss[contractfile].'" target="_blank" >'.$rowss[qnum].'</a></td>
        <td>
        <a href="gdwl.php?contract='.$rowss[id].'" 
        class="btn btn-primary" style="width: 140px;">
        Approve</a>
        </td>
                	</tr>
         		';}?>
         		</tbody>
       		</table>
      	</div>
  	</div>
</div>
</div>
        </div>

    <!-- jQuery -->
    <script src="../vendors/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap -->
    <script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
    <!-- FastClick -->
    <script src="../vendors/fastclick/lib/fastclick.js"></script>
    <!-- NProgress -->
    <script src="../vendors/nprogress/nprogress.js"></script>
    <!-- iCheck -->
    <script src="../vendors/iCheck/icheck.min.js"></script>
    <!-- Datatables -->
    <script src="../vendors/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="../vendors/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/dataTables.buttons.min.js"></script>
    <script src="../vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.flash.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.html5.min.js"></script>
    <script src="../vendors/datatables.net-buttons/js/buttons.print.min.js"></script>
    <script src="../vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js"></script>
    <script src="../vendors/datatables.net-keytable/js/dataTables.keyTable.min.js"></script>
    <script src="../vendors/datatables.net-responsive/js/dataTables.responsive.min.js"></script>
    <script src="../vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js"></script>
    <script src="../vendors/datatables.net-scroller/js/dataTables.scroller.min.js"></script>
    <script src="../vendors/jszip/dist/jszip.min.js"></script>
    <script src="../vendors/pdfmake/build/pdfmake.min.js"></script>
    <script src="../vendors/pdfmake/build/vfs_fonts.js"></script>

    <!-- Custom Theme Scripts -->
    <script src="../build/js/custom.min.js"></script>

  </body>
</html>   