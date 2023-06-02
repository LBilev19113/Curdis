<?php 

$sql = "UPDATE user_data set username = ? where user_id = ?";
$connection->prepare($sql)->execute([$newUsername, $user_id]);
?>