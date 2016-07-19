<?php 
include("database.php");


error_reporting(E_ERROR | E_PARSE);
session_start();

$username = (isset($_POST['username']) ? $_POST['username'] : "");
$password = (isset($_POST['password']) ? $_POST['password'] : "");

$sql = "SELECT username,password,account_type,account_id FROM accounts WHERE username='".$username."' AND account_type!=\"Closed\"";

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
		$_SESSION['errMsg'] = "Invalid username and/or password";
		header("Location: login.php");
		die;
	}
}
else
{
    $_SESSION['errMsg'] = "Invalid username and/or password";
    header("Location: index.php");
    die;
}

if($username == "" || $password == "")
{
	$_SESSION['errMsg'] = "Please enter username and/or password";
    header("Location: index.php");
    die;
}

$conn->close();


?>

