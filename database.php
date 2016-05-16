<?php

$url = parse_url(getenv("CLEARDB_DATABASE_URL"));

$hostname = $url["host"];
$username = $url["user"];
$password = $url["pass"];
$db = substr($url["heroku_0d16bc3ff328247"], 1);

$conn = new mysqli ($hostname, $username, $password);
$conn->select_db($db);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>