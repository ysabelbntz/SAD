<?php
	include ('database.php');
	session_start();
	if(isset($_POST['add_button'])) {
		$id1=$_GET['value'];
		$turndate=$_POST['turndate'];
		$classtype=$_POST['classtype'];
		$check=$_POST['check'];
		$principal=$_POST['principal'];
		$interest=$_POST['interest'];
		$rate=$_POST['penalty'];

		$sql1='SELECT * FROM clients, cases, actual, expected WHERE clients.client_id like "'.$_GET['value'].'" AND clients.client_id=cases.client_id AND cases.status='Active'';	
		$result1 = $conn->query($sql1);

		$aib = $loan*$r*$weeks;
		$atb = $loan-$aib-$apb;
		$apb = $atb-$aib;
		$days = $weeks*7;//convert to days

		$Ymd = explode ("/", $turndate);
		$m = $Ymd[0];
		$d = $Ymd[1];
		$Y = $Ymd[2];
		$turndate = date("Y-m-d", mktime(0, 0, 0, $m, $d, $Y));
   		
   		if(!$result1){
   			echo $conn->error;
   		}	
   		else{
			$sql="INSERT INTO payment(client_id,case_id,account_id,expected_id,turn_date,type_of_payment,check_number,turn_amount,principal_paid,
				interest_paid,penalty,status,notes)
				VALUES ('$id1','cases.case_id','$loan','$dor','$dom','$weeks','$rate','$notes','$status','0.00','0.00')";
				//madami kulang
			$result = $conn->query($sql);

			if(!$result){
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