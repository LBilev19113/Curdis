<?php 

$sql = "UPDATE user_data set username = ?, profilePicture = ? where user_id = ?";
$connection->prepare($sql)->execute([$newUsername,$img, $user_id]);
?>