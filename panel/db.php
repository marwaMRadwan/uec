<?php
    $host="localhost";
    $user_name="root";
    $passwod="";
    $DB_name="ekhtar";
    $connection=mysqli_connect($host,$user_name,$passwod,$DB_name);
    if(!$connection) die(mysqli_connect_error());
    $connection->set_charset("utf8");
?>


