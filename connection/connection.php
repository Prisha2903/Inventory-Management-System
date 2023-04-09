<?php
     $host = 'localhost';
     $user = 'root';
     $password = '';
     $dbname = 'inventory_db';
	$conn = new mysqli($host, $user, $password, $dbname);

	if(!$conn){        
		die("Error: Failed to connect to database");
	}
?>