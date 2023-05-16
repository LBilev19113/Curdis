<?php
$sql = $connection->prepare("insert into friends (user, friend) values (?, ?)"); 
$sql->execute([$sender, $receiver ]);

$sql = $connection->prepare("insert into friends (user, friend) values (?, ?)"); 
$sql->execute([$receiver, $sender ]);

$sql = $connection->prepare("DELETE FROM requests WHERE receiver = ? and sender = ?"); 
$sql->execute([$sender, $receiver ]);



?>