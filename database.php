<?php


$hostname = 'host';
$username = 'bf9f5127fb32aa';
$password = 'efcc2b40';
$database = 'heroku_a9918873932cf93';

$conn = new mysqli ($servername, $username, $password);
$conn->select_db($database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>