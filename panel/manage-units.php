<?php
require "db.php";
require "functions.php";
session_start();
if(empty($_SESSION['id'])) header ('Location:index.php?error=Please Login');
if($_GET[pro]=="" || $_GET[floor]=="") header('Location:manage-floors.php');
if(!$_GET[pro] || !$_GET[floor]){ header('Location:manage-floors.php');}

if(isset($_GET[del])){
	$q="DELETE FROM `units` WHERE `id`='$_GET[del]'";
    $qrun=mysqli_query($connection,$q);
	header('Location:manage-units.php?pro='.$_GET[pro].'&floor='.$_GET[floor].'');
}
?>
<?php require 'head.php';?>
<div class="right_col" role="main">
<div class="clearfix"></div>
<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
    		<div class="x_title">
                <h3>Manage Units floor
                    <?php echo $_GET[floor];?>
                </h3>
                <ul class="nav navbar-right panel_toolbox">
                   	<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                </ul>
                <div class="clearfix"></div>
          	</div>
            <div class="x_content">
            <table id="datatable" class="table table-striped table-bordered">
                <tr>
                    <th>Unit Number</th>
                    <th>Unit Location</th>
                    <th>area</th>
                    <th>meter price</th>
                    <th>total price</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
                <?php
    $q = "SELECT * FROM `units` WHERE `project`='$_GET[pro]' AND `floor`='$_GET[floor]'";
    $qrun=mysqli_query($connection,$q);
    while($rows=mysqli_fetch_array($qrun)){
        $tot = $rows[price]*$rows[area];
        echo "
    <tr>
        <td>$rows[unitNum]</td>        
        <td>$rows[location]</td>
        <td>$rows[area]</td>
        <td>$rows[price]</td>
        <td>$tot</td>
        <td>";
            if($rows[status]==0) echo "متاح";
            else if($rows[status]==1) echo "غير متاح";
            else  echo "حجز مؤقت";
        echo '
        </td>
        <td>
            <a href="add-unit-img.php?unit='.$rows[id].'" 
            class="btn btn-primary" style="width: 140px;">
            Add image</a>';
            if($rows[status]==0) 
echo '
<a 
href="manage-units.php?del='.$rows[id].'&pro='.$_GET[pro].'&floor='.$_GET[floor].'" 
class="btn btn-danger" style="width: 140px;"> 
delete</a>
 <a href="edit-unit.php?unit='.$rows[id].'" 
            class="btn btn-primary" style="width: 140px;">
            edit</a>

';


        echo '
        
            </td>
    </tr>';}
?>                    
</table>
</div></div></div></div></div>
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


