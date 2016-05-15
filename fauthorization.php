<?php

include("database.php");

session_start();

function authorized()
{
  $sql="SELECT * from accounts where username='".$_SESSION['username']."' and password='".$_SESSION['password']."'";

  $result = $conn->query($sql);
  if($_SESSION['key'] != session_id() || mysql_num_rows($result) != 1)
  {
	 return false;
  }
  else
  {
  	return true;
  }
}
?>