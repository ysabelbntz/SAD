 <?php
	include ('database.php');
	session_start();
	if(isset($_POST['add_button'])) {
		$clid=$_GET['client'];
		$cid=$_GET['case'];
		$userid=$_SESSION['id'];
		$turndate=$_POST['turndate'];
		$classtype=$_POST['classtype'];
		$check=$_POST['check'];
		$principal=$_POST['principal'];
		$interest=$_POST['interest'];
		$penalty=$_POST['penalty'];

		$userid=$_SESSION['id'];

		$sql1='SELECT * FROM clients, cases, expected WHERE clients.client_id like "'.$_GET['client'].'" AND cases.case_id like "'.$_GET['case'].'" AND clients.client_id=cases.client_id AND expected.case_id=cases.case_id AND expected.status="Unpaid" AND cases.status="Active"';	
		$result1 = $conn->query($sql1);

		$turnamt=$principal+$interest+$penalty;
		$p=$principal;
		$i=$interest;
		$tamt=$turnamt;//used in checking which records can be considered as paid

		if (mysqli_num_rows($result1) > 0) {
            while($row = mysqli_fetch_assoc($result1)) {
               	$atb = $row['actual_total_balance'];
                $apb = $row['actual_principal_balance'];
                $aib = $row['actual_interest_balance'];
            }
        }

        $apb -= $principal;
        $aib -= $interest;
        $atb = $apb+$aib;

		$Ymd = explode("/", $turndate);
		$m = $Ymd[0];
		$d = $Ymd[1];
		$Y = $Ymd[2];
		$turndate = date("Y-m-d", mktime(0, 0, 0, $m, $d, $Y));
   		
   		if(!$result1){
   			echo $conn->error;
   		}	
   		else{
		    $sql2='SELECT expected_id, case_id, principal_due, interest_due, total_due, status, remaining_principal_due, remaining_interest_due FROM expected WHERE case_id='.$cid.'';
		    $result2 = $conn->query($sql2);
		    if (mysqli_num_rows($result2) > 0) {
		        while($row = mysqli_fetch_assoc($result2)) {
		            if($p == 0 && $i == 0){
		                break;
		            }
		            $isPrincipalPaid=false;
		            $isInterestPaid=false;
		            $paid = $row['status'];
		            $principal_due = $row['principal_due'];
		            $interest_due = $row['interest_due'];
		            $total_due = $row['total_due'];
		            $eid = $row['expected_id'];
		            $rpd = $row['remaining_principal_due'];
		            $rid = $row['remaining_interest_due'];
		            //$rtd = $rpd + $rid;
		            if($p >= $rpd){
		               $p -= $rpd;
		               $rpd = 0;
		               $sqlA = "UPDATE expected SET remaining_principal_due = '$rpd' WHERE case_id = '".$cid."' AND expected_id = '".$eid."'";
		               $resultA = $conn->query($sqlA);
		               if(!$resultA){
		                    echo $conn->error;
		               }
		               $isPrincipalPaid = true;
		            }
		            else{
		                $rpd -= $p;
		                $p = 0;
		                $sqlB = "UPDATE expected SET remaining_principal_due = '$rpd' WHERE case_id = '$cid' AND expected_id = '$eid'";
		                $resultB = $conn->query($sqlB);
		                if(!$resultB){
		                    echo $conn->error;
		                }
		            }

		            if($i >= $rid){
		               $i -= $rid;
		               $rid = 0;
		               $sqlC = "UPDATE expected SET remaining_interest_due = '$rid' WHERE case_id = '$cid' AND expected_id = '$eid'";
		               $resultC = $conn->query($sqlC);
		               if(!$resultC){
		                    echo $conn->error;
		               }
		               $isInterestPaid = true;
		            }
		            else{
		                $rid -= $i;
		                $i = 0;
		                $sqlD = "UPDATE expected SET remaining_interest_due = '$rid' WHERE case_id = '$cid' AND expected_id = '$eid'";
		                $resultD = $conn->query($sqlD);
		                if(!$resultD){
		                    echo $conn->error;
		                }
		            }

		            if($isPrincipalPaid && $isInterestPaid){
		               $paid = "Paid";
		               $sql3 = "UPDATE expected SET status = '$paid' WHERE case_id = '$cid' AND expected_id = '$eid'";
		               $result3 = $conn->query($sql3);
		               if(!$result3){
		                    echo $conn->error;
		               }
		                $finaleid = $eid;
		            }

		        }              
		    }
			$sql4 = "INSERT INTO payment(client_id,case_id,account_id,expected_id,turn_date,type_of_payment,check_number,turn_amount,principal_paid,
				interest_paid,penalty,actual_principal,actual_interest,actual_total,status,notes)
				VALUES ('$clid','$cid','$userid','$finaleid','$turndate','$classtype','$check','$turnamt','$principal','$interest','$penalty', '$apb', '$aib', '$atb', 'Valid', 'hi')";
				//madami kulang
			$result4 = $conn->query($sql4);

			$sql5 = "UPDATE cases SET actual_total_balance = '".$atb."', actual_principal_balance = '".$apb."', actual_interest_balance = '".$aib."' WHERE case_id = '".$cid."'";//updates status
	        $result5 = $conn->query($sql5);

	        $sql6 = "SELECT actual_total_balance FROM cases WHERE case_id='".$cid."' AND client_id='".$clid."'";
	        $result6 = $conn->query($sql6);
	        $rowG = mysql_fetch_assoc($result6);
	        if($rowG['actual_total_balance'] <= 0){
	        	$sql7 = "UPDATE cases SET status='Closed' WHERE case_id='".$cid."' AND client_id='".$clid."'";
	        	$result7 = $conn->query($sql7);
	        }


			if(!$result4||!$result5){
				echo $conn->error;
			}
			else{
				//echo $dom;
				echo('<meta http-equiv="refresh" content="0;URL=view_single.php?client='.$clid.'"/>');
			}		
		}
	}
	else{
		echo "fuq";
	}
?>