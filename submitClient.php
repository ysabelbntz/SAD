<?php
	include ('database.php');
	session_start();
	if(isset($_POST['add_button'])) {

			$userid = $_SESSION['id'];
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

			$query1 = "INSERT INTO clients (account_id,classification,representative_first_name,representative_last_name,comaker_first_name,comaker_last_name,company_name,address,status,email,contact_number,notes)
			  VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
			$stmt = $conn->prepare($query1);
			if ($stmt) {
				$stmt->bind_param("isssssssssss",$userid, $class, $firstr, $lastr, $firstc, $lastc, $company, $oadd, $status, $email, $tel, $notes);
				$stmt->execute();
				$stmt->close();
			} else {
				trigger_error('Statement failed : ' . $stmt->error, E_USER_ERROR);
			}

			$query2 = "SELECT client_id FROM clients WHERE account_id=? AND classification=? AND representative_first_name=? AND representative_last_name=? AND comaker_first_name=? AND comaker_last_name=? AND company_name=? AND address=? AND status=? AND email=? AND contact_number=? AND notes=?";
			$stmt = $conn->prepare($query2);

			if ($stmt) {
			  	$stmt->bind_param("ssssssssssss",$userid, $class, $firstr, $lastr, $firstc, $lastc, $company, $oadd, $status, $email, $tel, $notes);
			    $stmt->execute();
			    $stmt->bind_result($client_id);

			    while ($stmt->fetch()) {
			        echo('<meta http-equiv="refresh" content="0;URL=addcase.php?value='.$client_id.'"/>');
			    }

			    $stmt->close();

			} else {
			    trigger_error('Statement failed : ' . $stmt->error, E_USER_ERROR);
			}
	}
	else{
		echo $conn->error;
	}
?>
