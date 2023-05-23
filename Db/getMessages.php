<?php

$stmt = $connection->prepare("SELECT messages.message, user_data.profilePicture FROM messages join user_data on messages.sender = user_data.user_id where (sender = ? and receiver = ?) or (sender = ? and receiver = ?)"); 
$stmt->execute([ $messageSender, $messageReceiver, $messageReceiver, $messageSender ]);
$messages = $stmt->fetchall();

?>