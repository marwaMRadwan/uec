<?php   session_start();
?>
<div class="col-md-3 left_col">
          <div class="left_col scroll-view">
            <div class="navbar nav_title" style="border: 0;">
              <a href="logout.php" class="site_title">
              <i class="fa fa-building"></i>
              <span>United Egyptions</span></a>
            </div>

            <div class="clearfix"></div>

            <!-- menu profile quick info -->
            <div class="profile clearfix">
              <div class="profile_info">
                <span>Welcome,</span>
                <h2><?php echo $_SESSION["uname"];?></h2>
              </div>
            </div>
            <!-- /menu profile quick info -->

            <br />

            <!-- sidebar menu -->
            <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
              <div class="menu_section">
                <ul class="nav side-menu">
                <?php 
                if($_SESSION[type]==0)
                echo '
                  <li><a><i class="fa fa-home"></i> Employees <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="add-admin.php">Add Employee</a></li>
                      <li><a href="all-admin.php">View all Employees</a></li>
                    </ul>
                
                  </li>
                  <li><a><i class="fa fa-home"></i> Approve Contracts <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="gdwl.php">Approve Contracts</a></li>
                    </ul>
                
                  </li>
                ';
                ?>
                
                 <li><a><i class="fa fa-home"></i> Main <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="slider.php">Add slide</a></li>
                      <li><a href="manage-slider.php">Manage slider</a></li>
                      <li><a href="data.php">Our Data</a></li>
                    </ul>
                  </li>

                   <li><a><i class="fa fa-edit"></i>Tourist or Government  Project <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="tour_hous.php">Add Tourist or Government project</a></li>
                      <li><a href="manage-tour_hous.php">Manage Tourist or Government project</a></li>
                      
                    </ul>
                  </li>
                   <li><a><i class="fa fa-edit"></i>Housing Project <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                    
                   <li><a href="housing.php">Add Housing project</a></li>
                     
                      <li><a href="manage-housing.php">Manage Housing project</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-table"></i> Customers <span class="fa fa-chevron-down"></span></a>
                    <ul class="nav child_menu">
                      <li><a href="add-customer.php">Add Customer</a></li>
                      <li><a href="manage-customers.php">Manage Customer</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-bar-chart-o"></i> Orders <span class="fa fa-chevron-down"></span></a>
                <ul class="nav child_menu">
                      <li><a href="manage-orders.php">Show All</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-clone"></i>Contacts <span class="fa fa-chevron-down"></span></a>
                   <ul class="nav child_menu">
                      <li><a href="manage-contactus.php">Show All</a></li>
                    </ul>
                  </li>
                  <li><a><i class="fa fa-clone"></i>Contracts <span class="fa fa-chevron-down"></span></a>
                   <ul class="nav child_menu">
                      <li><a href="manage-contract.php">Show All</a></li>
                    </ul>
                  </li>

                  </ul>
              </div>

            </div>
            <!-- /sidebar menu -->


          </div>
        </div>