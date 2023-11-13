<?php
require "db.php";
require "functions.php";
session_start();
if(empty($_SESSION['id'])) header ('Location:index.php?error=Please Login');
if($_GET[pro]=="") header('Location:manage-housing.php');
if(!$_GET[pro]){ header('Location:manage-housing.php');}

?>
<?php require 'head.php';?>
<div class="right_col" role="main">
<div class="clearfix"></div>
<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
    		<div class="x_title">
        		<h2>All Unit</h2>
                <ul class="nav navbar-right panel_toolbox">
                   	<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                </ul>
                <div class="clearfix"></div>
          	</div>
            <div class="x_content">
            <table id="datatable" class="table table-striped table-bordered">
            	<thead>
                	<tr>
                        <th>floor</th>
                        <th>add unit</th>
                 	</tr>
          		</thead>
				<tbody>
<tr>
<td>Basement</td>
<td>                            
<a href="add-units.php?pro=<?php echo $_GET[pro]?>&floor=basement" class="btn btn-primary" style="width: 140px;">Add Units</a>
<a href="manage-units.php?pro=<?php echo $_GET[pro]?>&floor=basement" class="btn btn-primary" style="width: 140px;">Manage Units</a>
</td>
</tr>
<tr>
<td>Ground</td>
<td>                            
<a href="add-units.php?pro=<?php echo $_GET[pro]?>&floor=ground" class="btn btn-primary" style="width: 140px;">Add Units</a>
<a href="manage-units.php?pro=<?php echo $_GET[pro]?>&floor=ground" class="btn btn-primary" style="width: 140px;">Manage Units</a>
</td>
</tr>
<?php
$q="SELECT * FROM `housing` WHERE `id`='$_GET[pro]'";
$qrun=mysqli_query($connection,$q);
while($rows=mysqli_fetch_array($qrun)){
for($i=1;$i<=$rows[floors];$i++)
echo ' 
<tr>
    <td>'.$i.'</td>
    <td>
    <a href="add-units.php?pro='.$_GET[pro].'&floor='.$i.'" class="btn btn-primary" style="width: 140px;">Add Units</a>
    <a href="manage-units.php?pro='.$_GET[pro].'&floor='.$i.'" class="btn btn-primary" style="width: 140px;">Manage Units</a>
    </td>
</tr>
';}?>

<tr>
<td>Roof</td>
<td>                            
<a href="add-units.php?pro=<?php echo $_GET[pro]?>&floor=roof" class="btn btn-primary" style="width: 140px;">Add Units</a>
<a href="manage-units.php?pro=<?php echo $_GET[pro]?>&floor=roof" class="btn btn-primary" style="width: 140px;">Manage Units</a>
</td>
</tr>

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