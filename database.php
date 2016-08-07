<?php

$hostname = "localhost";
$username = "root";
$password = "";
$database = "mega";

$conn = new mysqli ($hostname, $username, $password);
$conn->select_db($database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>
