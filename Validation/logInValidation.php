<?php

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  echo "<b style='color:red;'>Not an email</b><br><br>";
  $error = true;
}

if (!preg_match("/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/",$password)){
  echo "<b style='color:red;'>Password must incluce minimum eight characters, at least one letter and one number</b><br><br>";
  $error = true;
}



?>