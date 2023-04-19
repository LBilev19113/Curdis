<?php

$stmt = $connection->prepare("SELECT * FROM user_data WHERE email = ? AND password = ?"); 
	$stmt->execute([ $email, $hash ]); 
	$user = $stmt->fetch();

?>