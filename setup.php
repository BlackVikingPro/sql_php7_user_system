<?php

require("auth/connect.php");

if (isset($_POST["setup"])) {

// sql to create table
$create_table = "CREATE TABLE MyGuests (
id INT NOT NULL AUTO_INCREMENT PRIMARY KEY, 
firstname VARCHAR(30) NOT NULL,
lastname VARCHAR(30) NOT NULL,
username VARCHAR(30) NOT NULL,
email VARCHAR(50) NOT NULL,
password VARCHAR(70) NOT NULL,
ip VARCHAR(30),
reg_date TIMESTAMP
)";

if ($conn->query($create_table) === TRUE) {
    echo "Table [ MyGuests ] created successfully";
    echo "<br />Please go <a href='/'>here</a>";
} else {
    echo "Error creating table: " . $conn->error;
}

$conn->close();

} else {
	// wait for input
}

if (isset($_POST["reset"])) {

// sql to create table
$reset_db = "DROP TABLE myguests";

if ($conn->query($reset_db) === TRUE) {
    echo "Table [ MyGuests ] deleted successfully";
} else {
    echo "Error dropping table: " . $conn->error;
}

$conn->close();

} else {
	// wait for input
}

?>
<!DOCTYPE html>
<html>
<head>
	<title>Setup Database</title>
</head>
<body>

<style>

ol li {
	text-align: center;
	list-style-position: inside;
}

</style>

<center>

<h2>Setup your database!</h2>

<p>
	Hello, World. I am BlackVikingPro. <br />
	Please read the below steps to setup your database!
	<ol>
		<li>Go to your phpMyAdmin console and create a database with your own name.</li>
		<li>Edit the <a href="auth/db_credentials.php">db_credentials.php</a> file with your dabase information.</li>
		<li>Come back here and hit the below to let us setup the rest!</li>
	</ol>
</p>


<form action="" method="post">
	<button name="setup" type="submit">SETUP DB!!!</button><br />
</form>
<form action="" method="post">
	<button name="reset" type="submit">DELETE DB!!!</button>
</form>

</center>

</body>
</html>