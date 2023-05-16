<?php

$sql = $connection->prepare("select user_id, username, profilePicture from user_data where user_id in (SELECT user_data.user_id FROM curdis.user_data join requests on user_data.user_id=requests.sender where requests.receiver= ? group by requests.receiver)"); 
$sql->execute([ $user["user_id"] ]);
$requests = $sql->fetchall();

?>