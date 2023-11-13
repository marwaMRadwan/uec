<?php
  function check($var){
    $var=trim($var);
    $var=strip_tags($var);
    $var=stripcslashes($var);
    return $var;
  }
?>
