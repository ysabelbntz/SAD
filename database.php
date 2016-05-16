 <?php


// $hostname = "us-cdbr-iron-east-04.cleardb.net";
// $username = "b248e13104fe12";
// $password = "56e753b9";
// $database = "heroku_0d16bc3ff328247";

// $conn = new mysqli ($hostname, $username, $password, $database);

// if ($conn->connect_error) {
//     die("Connection failed: " . $conn->connect_error);
// }

$url = parse_url(getenv('CLEARDB_DATABASE_URL'));

echo '<pre>';
var_dump( $url);
echo '</pre>';
die;

?>