<?php


$hostname = "us-cdbr-iron-east-04.cleardb.net";
$username = "b248e13104fe12";
$password = "56e753b9";
$database = "heroku_0d16bc3ff328247";

$conn = new mysqli ($hostname, $username, $password);
$conn->select_db($database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>