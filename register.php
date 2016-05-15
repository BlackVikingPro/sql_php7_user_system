<?php

require("auth/connect.php");

if (isset($_POST["register"])) {
    
// let's set variables
$fname = htmlspecialchars($_POST["fname"]);
$lname = htmlspecialchars($_POST["lname"]);
$email = htmlspecialchars($_POST["email"]);
$username = htmlspecialchars($_POST["username"]);
$password = $_POST["password"];

// let's encrypt the password
$password = password_hash($password, PASSWORD_DEFAULT);

$sql = "INSERT INTO MyGuests (firstname, lastname, username, email, password, ip)
VALUES ('$fname', '$lname', '$username', '$email', '$password', '$ip')";


if ($conn->query($sql) === TRUE) {
    echo "<br />New user created successfully";
    echo "<br />Go <a href='login.php'>here</a> to login.";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

} else {
	// wait for user input
}

$conn->close();

?>
<!DOCTYPE html>
<html>
<head>
	<title>Register</title>
</head>
<body>

<form method="post" action="">
	<label>First name: </label><input type="text" name="fname" />
    <label>Last name: </label><input type="text" name="lname" />
    <label>Username: </label><input type="text" name="username" />
    <label>Email: </label><input type="email" name="email" />
    <label>Password: </label><input type="password" name="password" />
    <button type="reset">Reset</button>
    <button type="submit" name="register">Register</button>
</form>

</body>
</html>