<?php $ar = "http://$_SERVER[HTTP_HOST]"."/ar"."$_SERVER[REQUEST_URI]"; ?>

<nav class="navbar navbar-expand-lg navbar-light bg-light .main-bg">
  <a class="navbar-brand" href="#">
  <img src="images/logo-08.png" class="img-fluid">
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav ml-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Our Projects
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="our-projects.php">Housing Projects</a>
          <a class="dropdown-item" href="our-government-projects.php">Government and Tourist Projects</a>
          </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="order-unit.php">Order Your Unit</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="videos.php">Our Videos</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="news.php">Our News</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="contact.php">Contact Us</a>
      </li>
    <?php  
        session_start();
        if(isset($_SESSION["uname"]))
        {    echo '
      <li class="nav-item">
        <a class="nav-link" href="customer.php">'.$_SESSION["uname"].'</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="logout.php">logout</a>
      </li>';
      }
        else
        echo '
      <li class="nav-item">
        <a class="nav-link" href="customer-login.php">Customer Log</a>
      </li>';
        ?>
      
        
        
    <li class="nav-item">
        <a class="nav-link" href="<?php echo $ar;?>">Ar</a>
      </li>


    </ul>
  </div>
</nav>