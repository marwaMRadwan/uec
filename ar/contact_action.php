<?php
require "../panel/production/db.php";

if( !empty($_POST['email']) &&
    !empty($_POST['name']) &&
    !empty($_POST['message']) &&
    !empty($_POST['phone1']) &&
    !empty($_POST['phone2']) )
{
    $email=$_POST['email'];
    $name=$_POST['name'];
    $message = $_POST['message'];
    $phone1 = $_POST['phone1'];
    $phone2 = $_POST['phone2'];
    $sql = "INSERT INTO contact(name,email,phone1,phone2,message)
                VALUES('$name','$email','$phone1','$phone2','$message')";
    if(mysqli_query($connection,$sql)){
            echo "<div class='alert alert-success text-right'>تم الارسال </div>";
        }else{
            echo "<div class='alert alert-danger text-right'>حدث خطأ أثناء الارسال</div>";
        }
    
    }

else{
            echo "<div class='alert alert-danger text-right'>حدث خطأ أثناء الارسال</div>";
}

?>
