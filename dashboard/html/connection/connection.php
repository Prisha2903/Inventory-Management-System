<?php
    // $host = 'localhost'
    // $user = 'root'
    // $password = ''
    // $dbname = 'inventory_db'
	$conn = new mysqli("127.0.0.1:4306", "root", "123456", "repcomp");

	if(!$conn){        
		die("Error: Failed to connect to database");
	}
?>