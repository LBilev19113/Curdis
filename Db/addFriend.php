<?php 

$sql = "INSERT INTO requests ( sender, receiver) VALUES (?,?)";
$connection->prepare($sql)->execute([$sender, $receiver]);
?>