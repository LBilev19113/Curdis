<?php

$stmt = $connection->prepare("SELECT user_id FROM user_data WHERE username = ? "); 
$stmt->execute([ $username ]);
$userIdFromName = $stmt->fetch();


?>