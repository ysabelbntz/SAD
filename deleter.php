<?php

session_start();
//check if authorized
include("database.php");

$type = $_GET['type'];
$id = $_GET['id'];

if($type == 1){//1 is officer
	$sql = "UPDATE accounts SET account_type='Closed' WHERE accounts.account_id = '".$id."'";
	$result = $conn->query($sql);
	if($result){
		echo('<meta http-equiv="refresh" content="0;URL=viewAllOfficers.php"/>');
	}
}
else if($type == 2){//2 is client
	$sql = "UPDATE clients SET status='Closed' WHERE clients.client_id = '".$id."'";
	$result = $conn->query($sql);
	if($result){
		echo('<meta http-equiv="refresh" content="0;URL=viewClient.php"/>');
	}
}
else{//3 is case
	echo("Wutchu doin?");
}



?>