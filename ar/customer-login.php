<?php 
require "../panel/production/db.php";
  require "../panel/production/functions.php";
  session_start();    
        $msg=$_GET[error];

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $uname=check($_POST["email-address"]);
    $password=check($_POST["password"]);
    
    if(empty($uname))$error['user']="برجاء ادخال البريد الاليكتروني";
    if(empty($password))$error['pass']="برجاء ادخال كلمة السر";
      if(!$error){
      $password=md5($password);
      $q="SELECT * FROM `customers` WHERE `email`='$uname' and `pass`='$password'";
      $qrun=mysqli_query($connection,$q);
      if($rows=mysqli_fetch_array($qrun)){        
        $_SESSION["id"]=$rows['id'];
        $_SESSION["uname"]=$rows[fname];
        header ('Location:customer.php');
    }
    else{
      $msg.="برجاء تسجيل الدخول بشكل صحيح";
    }
  }
}

require 'head.php';?>
<?php require 'nav.php';?>

<main class="login-form p-5">
    <div class="cotainer">
        <div class="row justify-content-center">
            <div class="col-md-8 col-12">
                <div class="card py-5 my-5">
                    <div class="card-body">
                        <?php echo '<div class="atert alert-danger p-3 mb-2 text-right">'.$msg.'</div>';?>
                        <form method="post">
                            <div class="form-group row">
                                <label for="email_address" class="col-md-4 col-form-label text-md-right">البريد الإليكتروني</label>
                                <div class="col-md-6">
                                    <input type="text" id="email_address" class="form-control" name="email-address" required autofocus>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">كلمة السر</label>
                                <div class="col-md-6">
                                    <input type="password" id="password" class="form-control" name="password" required>
                                </div>
                            </div>

                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary" name="login">
                                    تسجيل الدخول
                                </button>
                            </div>
                    </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>

</main>
<?php require 'footer.php';?>