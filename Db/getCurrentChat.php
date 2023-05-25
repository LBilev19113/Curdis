<?php

$stmt = $connection->prepare("SELECT * FROM user_data WHERE user_id = ? "); 
$stmt->execute([ $messageReceiver ]);
$currentChat = $stmt->fetch();


?>