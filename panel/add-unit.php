<?php 
  require "db.php";
  require "functions.php";
	session_start();
if(empty($_SESSION['id'])) header ('Location:index.php?error=Please Login');
if($_GET[customer]==""|| $_GET[proid]=="") header('Location:manage-customers.php');
if(!$_GET[customer] || !$_GET[proid] ){ header('Location:manage-customers.php');}


if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(!empty($_POST['check_list'])){
        //echo serialize($arr);
        header(
        'Location:add-start.php?units='.serialize($_POST['check_list']).'&proid='.$_GET[proid].'&customer='.$_GET[customer].'&conNum='.time().'&grage='.$_POST[grage]
        );
        foreach($_POST['check_list'] as $selected){
            echo $selected."</br>";
        }   
    }
}
require 'head.php';?>
<!-- Add Employee Form -->
 <div class="right_col" role="main">
 	<div class="">
    	<div class="page-title">
        	<div class="title_left">
            	<h3>Add Customer Unit</h3>
          	</div>
   		</div>
        <div class="clearfix"></div>
    	<div class="row">
        	<div class="col-md-12 col-sm-12 col-xs-12">
           		<div class="x_panel">
                	<div class="x_title">
						<h2>Add Project</h2>
						<ul class="nav navbar-right panel_toolbox">
							<li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a></li>
						</ul>
						<div class="clearfix"></div>
              		</div>
                  <div class="x_content">
                  <h3><?php echo $error;?></h3>
<form class="form-horizontal form-label-left" 
novalidate method="post">

<?php
    $q = "SELECT * FROM `housing` WHERE `id`='$_GET[proid]'";
    $qrun=mysqli_query($connection,$q);
    if($rows=mysqli_fetch_array($qrun)){
    //SELECT `garage` FROM `housing` WHERE 1
    if($rows[garage]>0)
        echo'
    <input type="checkbox" name="grage">يوجد جراج
    ';
        else{
            echo 'الجراج غير متاح';
        }
    }
?>
    
    
    <table class="table table-striped table-bordered">
    <tr>
        <th>Floor</th>
        <th>Unit Number</th>
        <th>Unit Location</th>
        <th>Status</th>
    </tr>
    <?php
    $q = "SELECT * FROM `units` WHERE `project`='$_GET[proid]'";
    $qrun=mysqli_query($connection,$q);
    while($rows=mysqli_fetch_array($qrun)){
        echo "
    <tr>
        <th>floor $rows[floor]</th>
        <td>$rows[unitNum]</td>        
        <td>$rows[location]</td>
        <td>";
        if($rows[status]==0)
            echo "<input type='checkbox' value=$rows[id] name='check_list[]'> متاح";
        else if($rows[status]==1)
            echo "غير متاح";
        else if($rows[status]==2)
            echo "حجز مؤقت";
            
    echo "</td>
</tr>";
    
    }?>
        
     </table>
    
    
<div class="ln_solid"></div>
<div class="form-group">
	<div class="col-md-6 col-md-offset-3">
   		<input type="submit" id="send" class="btn btn-success" value="Submit">
    </div>
</div>
</form>
</div></div></div></div></div></div>

<script src="../vendors/jquery/dist/jquery.min.js"></script>
<script src="../vendors/bootstrap/dist/js/bootstrap.min.js"></script>
<script src="../vendors/fastclick/lib/fastclick.js"></script>
<script src="../vendors/nprogress/nprogress.js"></script>
<script src="../vendors/validator/validator.js"></script>
<script src="../build/js/custom.min.js"></script>
</body></html>