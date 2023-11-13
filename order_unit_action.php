

<?php
require "panel/production/db.php";

    if( !empty($_POST['email']) &&
        !empty($_POST['name']) &&
        !empty($_POST['message']) &&
        !empty($_POST['price']) &&
        !empty($_POST['city']) &&
        !empty($_POST['type']) &&
        !empty($_POST['space']) &&
        !empty($_POST['role']) &&
        !empty($_POST['phone1']) )
    {

        $email=$_POST['email'];
        $name=$_POST['name'];
        $message = $_POST['message'];
        $price = $_POST['price'];
        $city = $_POST['city'];
        $type = $_POST['type'];
        $space = $_POST['space'];
        $role = $_POST['role'];
        $phone1 = $_POST['phone1'];
        $phone2 = $_POST['phone2'];
        $sql = 
            "INSERT INTO `order_unit`
            (`name`, `email`, `phone1`, `phone2`, `message`, `price`, `type`, `role`, `city`, `space`) VALUES ('$name','$email','$phone1','$phone2','$message','$price','$type','$role','$city','$space')";
        if(mysqli_query($connection,$sql)){
            echo "<div class='alert alert-success'>Successfully added </div>";
        }else{
            echo "<div class='alert alert-danger'>Error: There was an error while adding</div>";
        }
    
    }

else{
            echo "<div class='alert alert-danger'>Error: There was an error while adding</div>";
}
?>