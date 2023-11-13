<?php
require "db.php";
require "functions.php";
session_start();
if(empty($_SESSION['id'])) header ('Location:index.php?error=Please Login');
if(isset($_GET[del])){
	$q="DELETE FROM `tour_gover` WHERE `id`='$_GET[del]'";
    $qrun=mysqli_query($connection,$q);
	if($qrun) unlink('../../'.$_GET[img]);
	header('Location:manage-tour_hous.php');
}
?>
<?php require 'head.php';?>
<div class="right_col" role="main">
<div class="clearfix"></div>
<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
    		<div class="x_title">
        		<h2>All Tourist Or Government Project</h2>
                <ul class="nav navbar-right panel_toolbox">
                   	<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                </ul>
                <div class="clearfix"></div>
          	</div>
            <div class="x_content">
            <table id="datatable" class="table table-striped table-bordered">
            	<thead>
                	<tr>
                    	<th>Name</th>
                    	<th>اسم المشروع</th>
                        <th>actions</th>
                 	</tr>
          		</thead>
				<tbody>
               	<?php
                       $q="SELECT * FROM `tour_gover`";
                       $qrun=mysqli_query($connection,$q);
                       while($rows=mysqli_fetch_array($qrun)){
					echo ' 
                	<tr>
                    	<td>'.$rows[name].'</td>
                        <td>'.$rows[arname].'</td>
                        <td>
							<a href="manage-tour_hous.php?del='.$rows[id].'&img='.$rows[cover].'" class="btn btn-danger">delete</a>
							<a href="edit-tour_hous.php?edit='.$rows[id].'&img='.$rows[cover].'" class="btn btn-primary">Edit</a>
                            <br>
							<a href="add-video.php?pro='.$rows[id].'" class="btn btn-primary">Add Video</a>
							<a href="manage-videos.php?pro='.$rows[id].'" class="btn btn-primary">Manage Videos</a><br>
							<a href="add-phase.php?pro='.$rows[id].'" class="btn btn-primary">Add Phase</a>
							<a href="manage-phase.php?pro='.$rows[id].'" class="btn btn-primary">Manage Phase</a><br>
						<a href="add-news.php?pro='.$rows[id].'" class="btn btn-primary">Add Article</a>
							<a href="manage-news.php?pro='.$rows[id].'" class="btn btn-primary">Manage News</a>

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