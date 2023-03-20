<?php
	$servername = "localhost";
	$username = "root";
	$password = "";
	$database = "curdis";

	try {
	  $connection = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
	  $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	} catch(PDOException $e) {
	  echo "Connection failed: " . $e->getMessage();
	}
     ?>
