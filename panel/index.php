<?php 
  require "db.php";
  require "functions.php";
  session_start();
  if(isset($_SESSION['id'])){
    if($_SESSION[type]==0) header ('Location:add-admin.php');
    else if($_SESSION[type]==1) header('Location:data.php');
  } 
    
  if($_POST['login']){
    $uname=check($_POST["username"]);
    $password=check($_POST["password"]);
    if(empty($uname))$error['user']="Please Enter Your Email";
    if(empty($password))$error['pass']="Please Enter Your Password";
    if(!$error){
      $password=md5($password);
      $q="SELECT * FROM `employees` WHERE `email`='$uname' and `pass`='$password'";
      $qrun=mysqli_query($connection,$q);
      if($rows=mysqli_fetch_array($qrun)){
        $_SESSION["id"]=$rows['id'];
        $_SESSION["uname"]=$rows[name];
        $_SESSION["type"]=$rows[type];
        if($rows[type]==0) header ('Location:add-admin.php');
        else header('Location:data.php');
    }
    else{
      $msg="Please Login";
    }
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Ekhtar Shaetk</title>
    <!-- Bootstrap -->
    <link href="../vendors/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="../vendors/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <!-- NProgress -->
    <link href="../vendors/nprogress/nprogress.css" rel="stylesheet">
    <!-- iCheck -->
    <link href="../vendors/iCheck/skins/flat/green.css" rel="stylesheet">
    <!-- bootstrap-progressbar -->
    <link href="../vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet">
    <!-- JQVMap -->
    <link href="../vendors/jqvmap/dist/jqvmap.min.css" rel="stylesheet" />
    <!-- bootstrap-daterangepicker -->
    <link href="../vendors/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.0.12/dist/css/select2.min.css" rel="stylesheet" />
    <script type="text/javascript" src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
    <link href="style.css" type="text/css" rel="stylesheet" />
    <style>
        .tox-notifications-container{display: none!important;}
      </style>


    <!-- Custom Theme Style -->
    <link href="../build/css/custom.min.css" rel="stylesheet">
</head>

<body class="nav-md">
    <div class="container body">
        <div class="main_container" style="padding-top:5%">
            <div style="width:50%; margin:auto; padding-top:5%;padding-bottom:5%;text-align:center;color:white;border: 2px solid wheat;
    border-radius: 15px;">
            <form method="post" enctype="multipart/form-data">
                <h1>Log in</h1>
                <h1>
                    <?php echo $msg;echo $_GET[error]; ?>
                </h1>
                <div>
                    <input id="username" name="username" placeholder="Email" style="width:60%;border:2px solid white;color:black;font-size:1.5rem;padding:1%"/>                    
                    <h5 class="uname"><?php echo $error['user']; ?> </h5>
                </div>
                <div>
                    <input id="password" name="password" type="password" placeholder="Password" style="width:60%;border:2px solid white;color:black;font-size:1.5rem;padding:1%"/>
                    <h5 class="uname">
                        <?php echo $error['pass']; ?> </h5>
                </div>
                <p class="login button" style="background:none;border:none;text-align:center;width:100%">
                    <input type="submit" value="Login" name="login" 
                    style="background-color:#385898;width:30%; text-align:center;font-size:2rem;padding:1%;border: navajowhite;" />
                </p>
            </form>
</div>
        </div>
    </div>
</body>

</html>
