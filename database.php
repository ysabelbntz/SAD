<?php
  $url=parse_url(getenv("CLEARDB_DATABASE_URL"));

  $server = $url["host"];
  $username = $url["user"];
  $password = $url["pass"];
  $db = substr($url["path"],1);

  mysql_connect($server, $username, $password);

  $conn= mysql_select_db($db);



if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

?>