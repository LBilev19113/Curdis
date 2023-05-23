<?php

$sql = "INSERT INTO messages (sender, receiver, message) VALUES (?, ?, ?);";
$connection->prepare($sql)->execute([$messageSender, $messageReceiver, $message]);

?>