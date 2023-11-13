<?php 
  require "db.php";
  require "functions.php";
	session_start();
if(empty($_SESSION['id'])) header ('Location:index.php?error=Please Login');
if($_GET[customer]=="" ) header('Location:manage-customers.php');
if(!$_GET[customer] ){ header('Location:manage-customers.php');}

if($_SERVER["REQUEST_METHOD"] == "POST"){
        $proid=check($_POST['proid']);
    if($proid!=''){
    header('Location:add-unit-booking.php?proid='.$proid.'&customer='.$_GET[customer]);
    }
    else{
        $error="please choose a project";
    }
}
require 'head.php';?>
<!-- Add Employee Form -->
 <div class="right_col" role="main">
 	<div class="">
    	<div class="page-title">
        	<div class="title_left">
            	<h3>Add Customer Contact</h3>
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
<div class="item form-group">
	<label class="control-label col-md-3 col-sm-3 col-xs-12" 
    for="name">Project <span class="required">*</span></label>
    <div class="col-md-6 col-sm-6 col-xs-12">

 <select class="form-control col-md-7 col-xs-12 js-example-basic-multiple" name='proid' placeholder="project name" required="required">
     <option disabled selected>project</option>
     <?php
    $q = "SELECT * FROM `housing`";
    $qrun=mysqli_query($connection,$q);
    while($rows=mysqli_fetch_array($qrun)){
        echo '<option value='.$rows[id].'>'.$rows[arname].'</option>';
    }?>
</select>
    
    </div>
</div>
    

    
<div class="ln_solid"></div>
<div class="form-group">
	<div class="col-md-6 col-md-offset-3">
   		<input type="submit" id="send" 
           class="btn btn-success" value="Submit">
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
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/js/select2.min.js"></script>
<script>
$(document).ready(function() {
    $('.js-example-basic-multiple').select2();
});</script>
</body></html>