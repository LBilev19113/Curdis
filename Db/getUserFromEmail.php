<?php

$stmt = $connection->prepare("SELECT * FROM user_data WHERE email = ? "); 
$stmt->execute([ $email ]);
$user = $stmt->fetch();


?>