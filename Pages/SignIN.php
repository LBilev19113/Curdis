<?php 
session_start();


include '../Db/dbconnect.php';

if ( isset( $_POST['submit'] ) ) {

	

	$email = $_POST['email'];
	$password = $_POST['password'];
    $hash = hash('sha256', $password);
	
	
	include '../Db/checkIfUserExists.php';

    //include '../Validation/logInValidation.php';


	
	if ( $user ) {
			
		$_SESSION['user'] = $email;
		
		
		header("location: mainPage.php");
        
		exit;
		
	} else {
		
        //трябва да се оправи
		echo "<p style='text-align:center;'><b style='color:red;'>Невалидни потребителски данни</b></p><br><br>";
	}
}
	
?>	

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../Css/SignUPcssDark.css">
    <title>Sign In</title>
</head>
<body>
    <div class="signUP-box">
        <h2>Sign In</h2>
        <form method="POST" >
           <div class="user-box">
                <input type="text" name="email" id="1" autocomplete="off" required>
                <label for="">Email</label>
            </div>
            <div class="user-box">
                <input type="password" name="password" id="2" autocomplete="off" required>
                <label for="">Password</label>
            </div><br>
            <div class="user-box">
            <input type="submit" name="submit" value="Sign in"><br>
            </div>
            <a href="SignUP.php">
                Don't have an account yet?

            </a>
        </form>
    </div>

    
    
</body>
</html>



