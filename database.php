<?php

$url = getenv('JAWSDB_URL');
$dbparts = parse_url($url);

$hostname = $dbparts['host'];
$username = $dbparts['root'];
$password = $dbparts['sasabenitez'];
$database = ltrim($dbparts['mega'],'/');

$conn = new mysqli ($servername, $username, $password);
$conn->select_db($database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>