<?php 

$en = "http://$_SERVER[HTTP_HOST]".$_SERVER[REQUEST_URI]; 
$en = str_replace("/ar","",$en);
?>


<nav class="navbar navbar-expand-lg navbar-light bg-light .main-bg">
  <a class="navbar-brand" href="#">
  <img src="images/logo-08.png" class="img-fluid">
  </a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="index.php">الرئيسية <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          مشاريعنا
        </a>
        <div class="dropdown-menu text-right" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="our-projects.php">المشاريع السكنية</a>
          <a class="dropdown-item" href="our-government-projects.php">المشاريع السياحية و الحكومية</a>
          </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="order-unit.php">أطلب وحدتك</a>
      </li>

      <li class="nav-item">
        <a class="nav-link" href="videos.php">فيديوهاتنا</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="news.php">اخبارنا</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="contact.php">تواصل معنا</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="customer-login.php">دخول العملاء</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?php echo $en;?>">EN</a>
      </li>


    </ul>
  </div>
</nav>