<?php

require("db_credentials.php");

// Create connection
$conn = new mysqli(db_server, db_username, db_password, db_name);

// Check connection
if ($conn->connect_error) {
	$db_connection = false;
    die("Connection failed: " . $conn->connect_error);
} 
// connected successfully
$db_connection = true;

$ip = $_SERVER["REMOTE_ADDR"];
?>