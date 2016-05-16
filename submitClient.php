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
			// $id = mysqli_insert_id();
			//KELANGAN KO MAKUHA YUNG CLIENT ID PAGKAINSERT
			$sql2="SELECT client_id FROM clients WHERE account_id='$userid' AND classification='$class' AND representative_first_name='$firstr' AND representative_last_name='$lastr' AND comaker_first_name='$firstc' AND comaker_last_name='$lastc' AND company_name='$company' AND address='$oadd' AND status='$status' AND email='$email' AND contact_number='$tel' AND notes='$notes'";
			$result2 = mysqli_query($conn, $sql2);
			  if (mysqli_num_rows($result2) > 0) 
			  {
			    while($row = mysqli_fetch_assoc($result2)) 
			    {
				echo('<meta http-equiv="refresh" content="0;URL=addcase.php?value='.$row['client_id'].'"/>');
				}
			}
			else{
				echo $conn->error;
			}		
		}
	}
	else{
		echo $conn->error;
	}
?>