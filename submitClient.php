<?php
	include ('database.php');
	session_start();
	if(isset($_POST['add_button'])) {

		$class=$_POST['class'];
		$lastr=$_POST['lastr'];
		$firstr=$_POST['firstr'];
		$lastc=$_POST['lastc'];
		$firstc=$_POST['firstc'];
		$company=$_POST['company'];
		$oadd=$_POST['oadd'];
		$tel=$_POST['tel'];
		$email=$_POST['email'];
		$status=$_POST['status'];
		$notes=$_POST['notes'];

		$userid = $_SESSION['id'];

		$sql="INSERT INTO clients(account_id,classification,representative_first_name,representative_last_name,comaker_first_name,comaker_last_name,company_name,address,status,email,contact_number,notes)
		  VALUES ('$userid','$class','$firstr','$lastr','$firstc','$lastc','$company','$oadd','$status','$email','$tel','$notes')";

		$result = $conn->query($sql);

		if(!$result){
			echo('orayt');
			echo $conn->error;
		}
		else{
			//JOKE LANG
			$id = mysqli_insert_id();
			echo('<meta http-equiv="refresh" content="0;URL=addCase.php?value='.$id.'"/>');
		}		
	}
	else{
		echo "fuq";
	}
?>