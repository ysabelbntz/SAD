<?php

// $url = parse_url(getenv("CLEARDB_DATABASE_URL"));

$hostname = $url["us-cdbr-iron-east-04.cleardb.net"];
$username = $url["b248e13104fe12"];
$password = $url["56e753b9"];
$database = $url["heroku_0d16bc3ff328247"];

$conn = new mysqli ($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>