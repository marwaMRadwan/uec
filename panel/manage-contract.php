<?php
require "db.php";
require "functions.php";
?>
<?php require 'head.php';?>
<div class="right_col" role="main">
<div class="clearfix"></div>
<div class="row">
	<div class="col-md-12 col-sm-12 col-xs-12">
		<div class="x_panel">
    		<div class="x_title">
        		<h2>All Contact Us</h2>
                <ul class="nav navbar-right panel_toolbox">
                   	<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
                </ul>
                <div class="clearfix"></div>
          	</div>
            <div class="x_content">
            <table id="datatable" class="table table-striped table-bordered">
            	<thead>
                	<tr>
                    	<th>Customer Name</th>
                    	<th>Project</th>
                        <th>unit 1</th>
                    	<th>unit 2</th>
                        <th>Contract</th>
                        <th>Status</th>
                        <th>actions</th>
                 	</tr>
          		</thead>
				<tbody>
               	<?php

                       $q="SELECT * FROM `contract` WHERE `status`='0' OR `status`='1'";
                       $qrun=mysqli_query($connection,$q);
                       while($rows=mysqli_fetch_array($qrun)){
					echo ' 
                	<tr>
                        <td>';
                       $qs="SELECT * FROM `customers` WHERE `id`='$rows[cid]'";    
                        $sqrun=mysqli_query($connection,$qs);
                       if($rs=mysqli_fetch_array($sqrun)){
                       echo $rs[fname];
                       }
                               
                    echo '</td>
                        <td>';
                       $qs="SELECT * FROM `housing` WHERE `id`='$rows[pid]'";    
                        $sqrun=mysqli_query($connection,$qs);
                       if($rs=mysqli_fetch_array($sqrun)){
                       echo $rs[arname];
                       }
                               
                    echo '</td>
                        <td>'.$rows[unit1].'</td>
                        <td>'.$rows[unit2].'</td>
                        <td>.<a href="'.$rows[contractfile].'" target="_blank" >'.$rows[qnum].'</a></td>
                        <td>';
                        
                        if($rows[status]==1) echo 'approved' ;
                        else if($rows[status]==0) echo 'pending';
                        
                        
                        echo '</td>
                        <td><a href="edit-contract.php?con='.$rows[qnum].'">edit</a></td>
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