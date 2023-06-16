<?php
	$servername = "localhost";
	$DBusername = "root";
	$DBpassword = "password";
	$database = "Curdis";

	try {
	  $connection = new PDO("mysql:host=$servername;dbname=$database", $DBusername, $DBpassword);
	  $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	} catch(PDOException $e) {
	  echo "Connection failed: " . $e->getMessage();
	}
     ?>
