<?php
$servername = "localhost";
$username = "root";
$password = "sasabenitez";
$db = "mega";

$conn = new mysqli ($servername, $username, $password);
$conn->select_db($db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>