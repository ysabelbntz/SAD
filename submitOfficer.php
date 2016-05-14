<?php
	include ('database.php');
	session_start();
	if(isset($_POST['add_button'])) {

		$lastr=$_POST['lastr'];
		$firstr=$_POST['firstr'];
		$lastc=$_POST['lastc'];
		$firstc=$_POST['firstc'];
		$oadd=$_POST['oadd'];
		$tel=$_POST['tel'];
		$email=$_POST['email'];
		$status=$_POST['status'];
		$notes=$_POST['notes'];

		$userid = $_SESSION['id'];

		$sql="INSERT INTO accounts(first_name,last_name,username,password,account_type,email,contact_number,address,notes)
		  VALUES ('$firstr','$lastr','$firstc','$lastc','$status','$email','$tel','$oadd','$notes')";

		$result = $conn->query($sql);

		if(!$result){
			echo('orayt');
			echo $conn->error;
		}
		else{
			echo('nuna bes');
		}		
	}
	else{
		echo "fuq";
	}
?>