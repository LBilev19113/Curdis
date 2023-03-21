<?php

public class signUpController{


	function addToDb($username, $password, $email){


				$sql = "INSERT INTO user_data ( username, password, email) VALUES (?,?,?)";
				$connection->prepare($sql)->execute([$username, $hash, $email]);
			}    
		


	}

?>
