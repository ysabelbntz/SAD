<?php 
include("database.php");


error_reporting(E_ERROR | E_PARSE);
session_start();

$username = (isset($_POST['username']) ? $_POST['username'] : '');
$password = (isset($_POST['password']) ? $_POST['password'] : '');


if($username == "" || $password == "")
{
	include("layout2.php");
	print '<h1>Fill in all the lines!</h1> <br>
	<a href="index.php">Back</a>';
	exit;
}

$sql = "SELECT username,password,account_type,account_id FROM accounts WHERE username='".$username."';";

$result = $conn->query($sql);


if ($result->num_rows > 0)
{
   	$row = $result->fetch_row();
   	$cpassword = $row[1];
   	$accttype = $row[2];
   	$acctid=$row[3];
    if (password_verify($password, $cpassword))
    {
    	/*
	    echo "<h1>Success! ".$accttype."</h1>";
	    */
		$_SESSION['username'] = $_POST['username'];
		$_SESSION['password'] = $cpassword;
		$_SESSION['key'] = session_id();
		$_SESSION['id'] = $acctid;
		include("check.php");
	}
	else
	{
		include("layout2.php");
		echo "<h1>Wrong password!</h1><br><a href='index.php'>Back</a>";
		exit;
	}
}
else
{
	include("layout2.php");
    echo "<h1>User does not exist</h1><br><a href='index.php'>Back</a>";
    exit;
}
$conn->close();


?>

