<?php

$sql = $connection->prepare("select user_id, username, profilePicture from user_data where user_id in (SELECT friends.friend FROM curdis.user_data join friends on user_data.user_id=friends.user where user_data.user_id = ?)"); 
$sql->execute([ $user["user_id"] ]);
$friends = $sql->fetchall();

?>