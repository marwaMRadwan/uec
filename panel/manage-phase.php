<?php
require "db.php";
require "functions.php";
session_start();
if(empty($_SESSION['id'])) header ('Location:index.php?error=Please Login');
if($_GET[pro]=="") header('Location:manage-tour_hous.php');
if(!$_GET[pro]){ header('Location:manage-tour_hous.php');}
if($_SERVER["REQUEST_METHOD"] == "POST") {
    foreach ($_POST as $name => $value) {
    $t=substr($name,0,4);
    $i=substr($name,4); 
    if($t=="dele"){
        $q="DELETE FROM `phases` WHERE `id`='$i'";
        $qrun=mysqli_query($connection,$q);
        }
	}
}
?>
<?php require 'head.php';?>
<div class="right_col" role="main">
<div class="clearfix"></div>
<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
<div class="x_title">
    <?php 
    $qa="SELECT `id`, `name` FROM `tour_gover` WHERE `id`='$_GET[pro]'";
    $qarun=mysqli_query($connection,$qa);
    if($r=mysqli_fetch_array($qarun)){
    echo '<h2>Manage '.$r[name].' phase</h2>';
    }?>
    <ul class="nav navbar-right panel_toolbox">
        <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
    </ul>
    <div class="clearfix"></div>
</div>
<div class="x_content">
    <table id="datatable" class="table table-striped table-bordered">
        <thead>
            <tr>
                <th>title</th>
                <th>action</th>
            </tr>
        </thead>
		<tbody>
        <?php
        $q="SELECT * FROM `phases` WHERE `proid`='$_GET[pro]'";
        $qrun=mysqli_query($connection,$q);
        while($rows=mysqli_fetch_array($qrun)){
		echo ' 
		    <tr>
                <td>'.$rows[entitle].'</td>
                <td>
				    <form method="post">
                        <input type="submit" name="dele'.$rows[id].'" value="delete" class="btn btn-danger">
                    </form>
                </td>
            </tr>';
        }?>
        </tbody>
    </table>
</div>
</div></div></div></div>
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