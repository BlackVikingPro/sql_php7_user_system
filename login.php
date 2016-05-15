<?php
require("auth/connect.php");

session_start();

if (isset($_SESSION["username"])) {
	header("Location: index.php");
	die();
} else {
	// continue, not logged in.
}

if (isset($_POST["username"])) {

	$username = $_POST["username"];
	$password = $_POST["password"];

	// let's authenticate the username by authenticating the password
	$sql = "SELECT password FROM `myguests` where username = '$username'";

	$result = $conn->query($sql);

	if ($result->num_rows > 0) {
	    // output data of each row
	    while($row = $result->fetch_assoc()) {
	        $hash = $row["password"];
	    }
	} else {
	    echo "Incorrect username.<br />";
	    $hash = false;
	}

	if (password_verify($password, $hash)) {
	    // password valid
	    $password_true = 1;
	} else {
	    echo 'Invalid password.<br />';
	    $password_true = 0;
	}

	$sql = "SELECT * FROM myguests WHERE username='".$username."' AND password ='".$hash."' LIMIT 1";
	$res = $conn->query($sql);
if ($password_true == 1) {
	if ($res->num_rows == 1) {
		$_SESSION["username"] = $username;
		header("Location: index.php");
		exit();
	} else {
		die("<p>Invalid login info. Please <a href='' onclick='window.location.reload()'>retry</a></p>");
	}
} else {
	// password didn't verify
}

}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Login Simple</title>
</head>
<body>

<hr />

<form method="post" action="">
	Username: <input type="text" name="username" /> <br />
	Password: <input type="password" name="password" /> <br />
	<button type="reset">Reset</button><button type="submit">Submit</button>
</form>
<br />
Go <a href="register.php">here</a> to register.

</body>
</html>