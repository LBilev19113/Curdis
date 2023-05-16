<?php

$sql = $connection->prepare("DELETE FROM requests WHERE receiver = ?"); 
$sql->execute([$user_id ]);

?>