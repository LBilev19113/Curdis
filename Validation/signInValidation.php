<?php



include 'dbconnect.php';
print_r($confirmpassword);
print_r($password);

$error = false;


if ($password != $confirmpassword){
            
    echo "<b style='color:red;'>The passwords aren't matching</b><br><br>";
    $error = true;
}

$stmt = $connection->prepare("SELECT email FROM user_data WHERE email = ?"); 
$stmt->execute([ $email]); 
$checkEmail = $stmt->fetch();

if($checkEmail){

    echo "<b style='color:red;'>The email is already used</b><br><br>";
    $error = true;
}

$stmt2 = $connection->prepare("SELECT username FROM user_data WHERE username = ?"); 
$stmt2->execute([ $username]); 
$checkUsername = $stmt2->fetch();

if($checkUsername){

    echo "<b style='color:red;'>The username is already used</b><br><br>";
    $error = true;
}


if (!preg_match("/^[a-zA-Z-_-]*$/",$username)) {
    echo "<b style='color:red;'>You can only use letters, \"-\" and \"_\"</b><br><br>";
    $error = true;
  }

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    echo "<b style='color:red;'>Not an email</b><br><br>";
    $error = true;
  }
  
if (!preg_match("/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{8,}$/",$password)){
    echo "<b style='color:red;'>Password must incluce minimum eight characters, at least one letter and one number</b><br><br>";
    $error = true;
}

?>