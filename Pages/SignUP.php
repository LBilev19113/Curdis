<?php

    include '../Db/dbconnect.php';
    //include 'signInController.php';

    //login = new signInController();

    
	if ( isset( $_POST['submit'] ) ) {
	
		
	
		$username = $_POST['username'];
        $password = $_POST['password'];
        $confirmpassword = $_POST['confirmpassword'];
		$email = $_POST['email'];


		include '../Validation/signInValidation.php';
		
        if ( !$error ){
            
            $hash = hash('sha256', $password);
            
			$sql = "INSERT INTO user_data ( username, password, email) VALUES (?,?,?)";
			$connection->prepare($sql)->execute([$username, $hash, $email]);
            
            

		   
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
    <title>Sign Up</title>
</head>
<body>
    <div class="signUP-box">
        <h2>Sign Up</h2>
        <form method="POST">
            <div class="user-box">
                <input type="text" name="username" value="<?= @$username ?>" id="1" required>
                <label for="username">Enter username</label>
            </div>
            <div class="user-box">
                <input type="password" name="password" id="2" required>
                <label for="">Password</label>
            </div>
            <div class="user-box">
                <input type="password" name="confirmpassword" id="3" required>
                <label for="confirmpassword">Repeat Password</label>
            </div>
            <div class="user-box">
                <input type="text" name="email"  value="<?= @$email ?>" id="4" required>
                <label for="email">Email</label>
            </div><br>
            <!--<a href="#">
                <span></span>
                <span></span>
                <span></span>
                <span></span>

            </a>-->
            <div class="user-box" >
            <input type="submit" name="submit"  value="Sign up"><br>
            </div>
            <a href="SignIN.php">
                Already have an account?

            </a>
        </form>
    </div>
    
</body>
</html>

