<!DOCTYPE html>
<html>
<head>
	<title>Home Pageg</title>
</head>
<body>
    
<style>

    body {
        margin: 10px;
    }
    a {
        color: red;
        text-decoration: none;
    }
    a:hover {
        text-decoration: underline;
        font-weight: bold;
        font-size: inherit;
    }
    ::selection {
        color: white;
        background: lime;
    }
    
</style>

<?php
session_start();

if (isset($_SESSION["username"])) {
	// user signed in
	echo "Welcome back: ".$_SESSION["username"];
	$is_logged_in = true;
	$username = $_SESSION["username"];
} else {
	// user not signed in
	echo "Please go <a href='login.php'>here</a> to login. || Please go <a href='register.php'>here</a> to register.";
	$is_logged_in = false;
}

?>

<!-- Main site -->

<hr />

Go <a href="setup.php">here</a> to setup database and config files.

<hr />

<center>
<a rel="license" href="http://creativecommons.org/licenses/by/4.0/"><img alt="Creative Commons License" style="border-width:0" src="https://i.creativecommons.org/l/by/4.0/88x31.png" /></a><br /><span xmlns:dct="http://purl.org/dc/terms/" property="dct:title">sql_php7_user_system</span> by <a xmlns:cc="http://creativecommons.org/ns#" href="https://www.blackvikingpro.com/" property="cc:attributionName" rel="cc:attributionURL">BlackVikingPro</a> is licensed under a <a rel="license" href="http://creativecommons.org/licenses/by/4.0/">Creative Commons Attribution 4.0 International License</a>.
</center>

</body>
</html>