<?php 

$sql = "UPDATE user_data set profilePicture = ? where user_id = ?";
$connection->prepare($sql)->execute([$route, $user_id]);
?>