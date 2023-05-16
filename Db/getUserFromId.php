<?php

$stmt = $connection->prepare("SELECT * FROM user_data WHERE user_id = ? "); 
$stmt->execute([ $friend['user_id'] ]);
$userById = $stmt->fetchall();

#echo $userById['username'];


?>