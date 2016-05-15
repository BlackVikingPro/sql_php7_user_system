<?php
require("auth/connect.php");

$sql = "SELECT * FROM `myguests` WHERE 1";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "id: " . $row["id"]. " - Name: " . $row["firstname"]. " " . $row["lastname"]. " - Username: " . $row["username"] . " - Password: ". $row["password"] . "<br>";
    }
} else {
    echo "0 results";
}
$conn->close();

?>