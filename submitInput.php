<?php
	include ('database.php');
	session_start();
	if(isset($_POST['add_button'])) {
		$clid=$_GET['client'];
		$cid=$_GET['case'];
		$turndate=$_POST['turndate'];
		$classtype=$_POST['classtype'];
		$check=$_POST['check'];
		$principal=$_POST['principal'];
		$interest=$_POST['interest'];
		$penalty=$_POST['penalty'];

		$sql1='SELECT * FROM clients, cases, expected WHERE clients.client_id like "'.$_GET['client'].'" AND cases.case_id like "'.$_GET['case'].'" AND clients.client_id=cases.client_id AND expected.case_id=cases.case_id AND expected.status="Unpaid" AND cases.status="Active"';	
		$result1 = $conn->query($sql1);

		$turnamt=$principal+$interest+$penalty;

		$Ymd = explode("/", $turndate);
		$m = $Ymd[0];
		$d = $Ymd[1];
		$Y = $Ymd[2];
		$turndate = date("Y-m-d", mktime(0, 0, 0, $m, $d, $Y));
   		
   		if(!$result1){
   			echo $conn->error;
   		}	
   		else{
   			$sql2='SELECT expected_id, case_id, total_due, status FROM expected WHERE case_id='.$cid.'';
   			$result2 = $conn->query($sql2);
   			 if (mysqli_num_rows($result2) > 0) {
                while($row = mysqli_fetch_assoc($result2)) {
                	$paid = $row['status'];
                	$total_due = $row['total_due'];
                	if($paid=='Unpaid' && $turnamt<=0){
	                	$turnamt -= $total_due;
	                	$paid = 'Paid';
	                	$sql3 = "UPDATE expected SET status = '$paid' WHERE case_id = '$cid'";
	                	$result3 = $conn->query($sql3);
	                	if(!$result3){
        					echo $conn->error;
    					}
                	}
                	$eid=$row['expected_id'] ;         	
                }
            }
			$sql4 = "INSERT INTO payment(client_id,case_id,account_id,expected_id,turn_date,type_of_payment,check_number,turn_amount,principal_paid,
				interest_paid,penalty,status,notes)
				VALUES ('$clid','$cid','1','$eid','$turndate','$classtype','$check','$turnamt','$principal','$interest','$penalty', 'Valid', '$notes')";
				//madami kulang
			$result4 = $conn->query($sql4);

			if(!$result4){
				echo $conn->error;
			}
			else{
				//echo $dom;
				echo('<meta http-equiv="refresh" content="0;URL=view_Single.php?url_id='.$id1.'"/>');
			}		
		}
	}
	else{
		echo "fuq";
	}
?>