<?php
require "db.php";
require "functions.php";
if(isset($_GET[del])){
	$q="DELETE FROM `customers` WHERE `id`='$_GET[del]'";
    $qrun=mysqli_query($connection,$q);
	header('Location:manage-customers.php');
}

?>
<?php require 'head.php';?>
<div class="right_col" role="main">
<div class="clearfix"></div>
<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
    		<div class="x_title">
        		<h2>All Customers</h2>
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
                    	<th>Customer Email</th>
                        <th>actions</th>
                 	</tr>
          		</thead>
				<tbody>
               	<?php
                       $q="SELECT * FROM `customers`";
                       $qrun=mysqli_query($connection,$q);
                       while($rows=mysqli_fetch_array($qrun)){
					echo ' 
                	<tr>
                    	<td>'.$rows[fname].' '.$rows[lname].'</td>
                        <td>'.$rows[email].'</td>
                        <td>
                        ';
                        if($_SESSION[type]==0)
						echo '
							<a href="manage-customers.php?del='.$rows[id].'&img='.$rows[cover].'" class="btn btn-danger" style="width: 140px;">delete</a>
						';
						
						echo '
							<a href="edit-customer.php?edit='.$rows[id].'&img='.$rows[cover].'" class="btn btn-primary" style="width: 140px;">Edit</a>
						';
                        if($_SESSION[type]==0)
						echo '
							<a href="edit-pass.php?edit='.$rows[id].'" class="btn btn-primary" style="width: 140px;">Edit Password</a><br>
                            ';
                        echo '
							<a href="add-contract.php?customer='.$rows[id].'" class="btn btn-primary" style="width: 140px;">Add Contract</a>
							<a href="manage-contracts.php?customer='.$rows[id].'" class="btn btn-primary" style="width: 140px;">Manage Contract</a>
							<a href="mamage-rec.php?customer='.$rows[id].'" class="btn btn-primary" style="width: 140px;">Manage Receipts</a><br>

							<a href="add-booking.php?customer='.$rows[id].'" class="btn btn-primary" style="width: 140px;">Book Unit</a>
							<a href="manage-booking.php?customer='.$rows[id].'" class="btn btn-primary" style="width: 140px;">Manage Booking</a>
							

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