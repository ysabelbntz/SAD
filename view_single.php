
<?php 

include("layout.php"); //this includes layout.php which contains the navbar and footer
include ('database.php');

?> 

<!-- div for name and status -->
<div>
	<?php
		if (isset($_GET['client'])){
		  	$local_id=$_GET['client'];

            $sql = "SELECT cl.client_id, cl.representative_last_name, cl.representative_first_name, cl.status FROM clients cl WHERE cl.client_id=$local_id AND cl.status='Active'";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
    ?>
        	<h1 id="single_client_name"><?php echo $row['representative_last_name'].", ".$row['representative_first_name'];?></h1>
            <h3 id="single_client_status">(<?php echo $row['status'];?>)</h3>
            <a href="deleter.php?type=2&id=<?php echo($local_id) ?>"><i class="glyphicon glyphicon-remove" id="icons"></i></a>

    <?php
        		}
    		}
        }
    ?>
</div>

<!-- div for client info -->
<div class="table-responsive">
	<table>
		<?php
		  	$local_id=$_GET['client'];

            $sql1 = "SELECT cl.classification, cl.email, cl.comaker_last_name, cl.comaker_first_name, cl.contact_number, cl.company_name, cl.notes, cl.address FROM clients cl WHERE cl.client_id = $local_id AND cl.status='Active'";
            $result1 = mysqli_query($conn, $sql1);

            if (mysqli_num_rows($result1) > 0) {
                while($row = mysqli_fetch_assoc($result1)) {
        ?>
	        	<tr>
			      <td id="single_details">Classification</td>
			      <td id="single_spec_details"><?php echo $row['classification']?></td>
			      <td id="single_details">E-mail</td>
			      <td id="single_spec_details"><?php echo $row['email']?></td>
			    </tr>
			    <tr>
			    	<td id="single_details">Co-Maker</td>
			    	<td id="single_spec_details"><?php echo $row['comaker_last_name'].", ".$row['comaker_first_name']?></td>
			    	<td id="single_details">Contact Number</td>
			    	<td id="single_spec_details"><?php echo $row['contact_number']?></td>
			    </tr>
			    <tr>
			    	<td id="single_details">Company Name</td>
			    	<td id="single_spec_details"><?php echo $row['company_name']?></td>
			    	<td id="single_details">Notes</td>
			    	<td rowspan="3" id="single_spec_details"><?php echo $row['notes']?></td>
			    </tr>
			    <tr>
			    	<td id="single_details">Address</td>
			    	<td rowspan="2" id="single_spec_details"><?php echo $row['address']?></td>
			    </tr>
			    <tr></tr>
        <?php
    			}
        	}
        ?>
		</table>
	</div>
	<br>
	<br>

<!-- div for active case header with loan duration -->
<div>
	<h3 id="single_client_status">ACTIVE CASE</h3>
	<?php
		$sql10 = "SELECT case_id FROM cases WHERE cases.client_id = '$local_id' AND cases.status='Active'";
    	$result10 = $conn->query($sql10);
    	if (mysqli_num_rows($result10) == 0) {
			echo('<a href="addcase.php?value='.$local_id.'"><i class="glyphicon glyphicon-level-up" id="icons"></i></a>');
		}
	?>
	

	<?php
		if (isset($_GET['client'])){
		  	$local_id=$_GET['client'];

            $sql2 = "SELECT DATE_FORMAT(c.date_of_release, '%b-%d-%y') AS rd, DATE_FORMAT(c.date_of_maturity, '%b-%d-%y') AS md FROM cases c WHERE c.client_id=$local_id AND c.status='Active'";
            $result2 = mysqli_query($conn, $sql2);

            if (mysqli_num_rows($result2) > 0) {
                while($row = mysqli_fetch_assoc($result2)) {
    ?>
		<p style="margin-top:1%;"><?php echo $row['rd'].' to '.$row['md'];?>
    <?php
        		}
    		}
        }
    ?>
    <?php
    	$sql7 = "SELECT case_id FROM cases WHERE cases.client_id = '$local_id' AND cases.status = 'Active'";
    	$result7 = $conn->query($sql7);
    	if (mysqli_num_rows($result7) > 0) {
        while($row = mysqli_fetch_assoc($result7)) {
		echo('<a href="input.php?client='.$local_id.'&case='.$row['case_id'].'"><i class="glyphicon glyphicon-plus" id="icons"></i></a>
		<a href="editcase.php?client='.$local_id.'&case='.$row['case_id'].'"><i class="glyphicon glyphicon-pencil" id="icons"></i></a>');
	?>
		</p>
	</div>
<br>
<!-- div for expected table -->
<div class="table-responsive" id="div_tables">
	<table class="table" id="expected_table">
		<thead>
		  	<tr>
		  		<td colspan="8" id="single_heads">EXPECTED</td>
		  	</tr>
		  	<tr>
		  		<td rowspan="2" id="center_due">No.</td>
		  		<td rowspan="2" id="dates">Due Date</td>
		  		<td colspan="3" id="center_due">Due</td>
		  		<td colspan="3" id="center_balance">Balance</td>
		  	</tr>
		  	<tr>
		  		<td id="center_due">Principal</td>
		  		<td id="center_due">Interest</td>
		  		<td id="center_due">Total</td>
		  		<td id="center_balance">Principal</td>
		  		<td id="center_balance">Interest</td>
		  		<td id="center_balance">Total</td>
		  	</tr>
		</thead>
		<tbody>

		<!-- release -->

		<?php
		if (isset($_GET['client'])){
		  	$local_id=$_GET['client'];

            $sql3 = "SELECT DATE_FORMAT(c.date_of_release, '%b-%d-%y') AS dr, c.loan_amount, c.weekly_interest_rate, c.payment_period, (c.loan_amount*c.weekly_interest_rate*c.payment_period*0.01) intBal, (c.loan_amount+(c.loan_amount*c.weekly_interest_rate*c.payment_period*0.01)) totalBal FROM cases c WHERE c.client_id=$local_id AND c.status='Active'";
            $result3 = mysqli_query($conn, $sql3);;

            if (mysqli_num_rows($result3) > 0) {
                while($row = mysqli_fetch_assoc($result3)) {
       	?>
        	<tr>
        		<td class="container" id="center_due">Release</td>
        		<td class="container" id="dates"><?php echo $row['dr']?></td>
        		<td colspan="3" id="single_due"></td>
        		<td class="container" id="single_balance"><?php $forIntBal = number_format($row['loan_amount'], 2); echo $forIntBal;?></td>
                <td class="container" id="single_balance"><?php $forIntBal = number_format($row['intBal'], 2); echo $forIntBal;?></td>
                <td class="container" id="single_balance"><?php $totIntBal = number_format($row['totalBal'], 2); echo $totIntBal;?></td>
            </tr>
        <?php
        		}
    		}
        }
        ?>

       	<!-- expected table -->
		<?php
		  	
            $sql4 = "SELECT e.expected_id, DATE_FORMAT(e.expected_due_date, '%b-%d-%y') AS dd, e.principal_due, e.interest_due, e.total_due, e.expected_principal_balance, e.expected_interest_balance, e.expected_total_balance FROM cases, expected e WHERE cases.case_id=e.case_id AND e.client_id=$local_id AND cases.status='Active'";
            $result4 = mysqli_query($conn, $sql4);
            $i = 1;

            if (mysqli_num_rows($result4) > 0) {
                // output data of each row
                while($row = mysqli_fetch_assoc($result4)) {
        ?>
        	<tr>
        		<td class="container" id="center_due"><?php echo $i; $i++; ?></td>
        		<td class="container" id="dates"><?php echo $row['dd']?></td>
        		<td class="container" id="single_due"><?php $forIntBal = number_format($row['principal_due'], 2); echo $forIntBal;?></td>
                <td class="container" id="single_due"><?php $forIntBal = number_format($row['interest_due'], 2); echo $forIntBal;?></td>
                <td class="container" id="single_due"><?php $forIntBal = number_format($row['total_due'], 2); echo $forIntBal;?></td>
                <td class="container" id="single_balance"><?php $forIntBal = number_format($row['expected_principal_balance'], 2); echo $forIntBal;?></td>
                <td class="container" id="single_balance"><?php $forIntBal = number_format($row['expected_interest_balance'], 2); echo $forIntBal;?></td>
                <td class="container" id="single_balance"><?php $forIntBal = number_format($row['expected_total_balance'], 2); echo $forIntBal;?></td>
            </tr>
        <?php
    			}
        	}
        ?>
		</tbody>
	</table>

	<!-- payments -->
	<table class="table" id="payment_table">
		<thead>
		  	<tr>
		  		<td colspan="7" id="single_heads">PAYMENTS</td>
		  	</tr>
		  	<tr>
		  		<td rowspan="2" id="dates">Turn Date</td>
		  		<td colspan="3" id="center_due">Paid</td>
		  		<td colspan="3" id="center_balance">Balance</td>
		  	</tr>
		  	<tr>
		  		<td id="center_due">Principal</td>
		  		<td id="center_due">Interest</td>
		  		<td id="center_due">Turn Amount</td>
		  		<td id="center_balance">Principal</td>
		  		<td id="center_balance">Interest</td>
		  		<td id="center_balance">Total</td>
		  	</tr>
		</thead>
		<tbody>
			<tr>
				<td>-</td>
				<td>-</td>
				<td>-</td>
				<td>-</td>
				<td>-</td>
				<td>-</td>
				<td>-</td>
			</tr>
		<?php

			$origapb = 0;
			$origaib = 0;
			$origatb = 0;

			if (isset($_GET['client'])){
		  	$local_id=$_GET['client'];




            $sql5 = "SELECT DATE_FORMAT(p.turn_date, '%b-%d-%y') AS turn_date, p.turn_amount, p.principal_paid, p.interest_paid, p.actual_principal, p.actual_interest, p.actual_total, c.status FROM payment p, cases c WHERE p.client_id=$local_id AND c.client_id=$local_id AND p.case_id=c.case_id AND c.status='Active'";
            $result5 = mysqli_query($conn, $sql5);


            /*$sql6 = "SELECT c.loan_amount, c.weekly_interest_rate, c.payment_period, c.status FROM cases c WHERE c.client_id=$local_id AND c.status='Closed'";
            $result6 = mysqli_query($conn, $sql6);

 			if (mysqli_num_rows($result6) > 0) {
 				while($rowa = mysqli_fetch_assoc($result6)) {
 				$origapb = $rowa['loan_amount'];
            	$origaib = $rowa['loan_amount']*($rowa['weekly_interest_rate']*0.01)*$rowa['payment_period'];
            	$origatb = $origapb+$origaib;
            }
        }*/
            if (mysqli_num_rows($result5) > 0) {

            	
                while($row = mysqli_fetch_assoc($result5)) {

               

        ?>
        	<tr>
        		<td class="container" id="dates"><?php echo $row['turn_date']?></td>
        		<td class="container" id="single_due"><?php $forIntBal = number_format($row['principal_paid'], 2); echo $forIntBal;?></td>
                <td class="container" id="single_due"><?php $forIntBal = number_format($row['interest_paid'], 2); echo $forIntBal;?></td>
        		<td class="container" id="single_due"><?php $forIntBal = number_format($row['turn_amount'], 2); echo $forIntBal;?></td>
        		<td class="container" id="single_balance"><?php $forIntBal = number_format($row['actual_principal'], 2); echo $forIntBal;?></td>
                <td class="container" id="single_balance"><?php $forIntBal = number_format($row['actual_interest'], 2); echo $forIntBal;?></td>
                <td class="container" id="single_balance"><?php $forIntBal = number_format($row['actual_total'], 2); echo $forIntBal;?></td>

            </tr>
        <?php
        		}
    		}
        }
        ?>
		</tbody>
	</table>
	<?php
				}
		}
	?>
</div>
<br>
<!-- div for finished cases -->
<div>
<h3 id="single_client_status">FINISHED CASES</h3>
<br> <br>
<?php
if (isset($_GET['client'])){
	$local_id=$_GET['client'];
	$sql7 = "SELECT case_id FROM cases WHERE cases.client_id = '".$local_id."' AND cases.status = 'Closed'";
	$result7 = $conn->query($sql7);
	if (mysqli_num_rows($result7) > 0) {
		while($rowS = mysqli_fetch_assoc($result7)) {
			$sql2 = "SELECT DATE_FORMAT(c.date_of_release, '%b-%d-%y') AS rd, DATE_FORMAT(c.date_of_maturity, '%b-%d-%y') AS md FROM cases c WHERE c.client_id=$local_id AND c.status='Closed'";
			$result2 = mysqli_query($conn, $sql2);
			
			if (mysqli_num_rows($result2) > 0) {
				while($row = mysqli_fetch_assoc($result2)) {
					?>
					<div class="panel-group">
					<div class="panel panel-default">
					<div class="panel-heading">
					<h5 class="panel-title">
					<a data-toggle="collapse" href="#collapse1"><?php echo $row['rd'].' to '.$row['md'];?></a>
					</h5>
					</div>
					<div id="collapse1" class="panel-collapse collapse">
					<div class="panel-body">
					
					<?php
				}
			}
			?>
			<br>
			<!-- div for expected table -->
				<div class="table-responsive" id="div_tables">
			<table class="table" id="expected_table">
			<thead>
			<tr>
			<td colspan="8" id="single_headsEND">EXPECTED</td>
			</tr>
			<tr>
			<td rowspan="2" id="center_due">No.</td>
			<td rowspan="2" id="dates">Due Date</td>
			<td colspan="3" id="center_due">Due</td>
			<td colspan="3" id="center_balance">Balance</td>
			</tr>
			<tr>
			<td id="center_due">Principal</td>
			<td id="center_due">Interest</td>
			<td id="center_due">Total</td>
			<td id="center_balance">Principal</td>
			<td id="center_balance">Interest</td>
			<td id="center_balance">Total</td>
			</tr>
			</thead>
			<tbody>
			
			<!-- release -->
			
			<?php
			if (isset($_GET['client'])){
				$local_id=$_GET['client'];
				
				$sql3 = "SELECT DATE_FORMAT(c.date_of_release, '%b-%d-%y') AS dr, c.loan_amount, c.weekly_interest_rate, c.payment_period, (c.loan_amount*c.weekly_interest_rate*0.01*c.payment_period) intBal, (c.loan_amount+(c.loan_amount*c.weekly_interest_rate*0.01*c.payment_period)) totalBal FROM cases c WHERE c.client_id=$local_id  AND c.status='Closed'";
				$result3 = mysqli_query($conn, $sql3);;
				
				if (mysqli_num_rows($result3) > 0) {
					while($row = mysqli_fetch_assoc($result3)) {
						?>
						<tr>
						<td class="container" id="center_due">Release</td>
						<td class="container" id="dates"><?php echo $row['dr']?></td>
						<td colspan="3" id="single_due"></td>
						<td class="container" id="single_balance"><?php $forIntBal = number_format($row['loan_amount'], 2); echo $forIntBal;?></td>
						<td class="container" id="single_balance"><?php $forIntBal = number_format($row['intBal'], 2); echo $forIntBal;?></td>
						<td class="container" id="single_balance"><?php $totIntBal = number_format($row['totalBal'], 2); echo $totIntBal;?></td>
						</tr>
						<?php
					}
				}
			}
			?>
			
			<!-- expected table -->
			<?php
			
			$sql4 = "SELECT e.expected_id, DATE_FORMAT(e.expected_due_date, '%b-%d-%y') AS dd, e.principal_due, e.interest_due, e.total_due, e.expected_principal_balance, e.expected_interest_balance, e.expected_total_balance FROM cases, expected e WHERE cases.case_id=e.case_id AND e.client_id=$local_id  AND cases.status='Closed'";
			$result4 = mysqli_query($conn, $sql4);
			$i = 1;
			
			if (mysqli_num_rows($result4) > 0) {
				// output data of each row
				while($row = mysqli_fetch_assoc($result4)) {
					?>
					<tr>
					<td class="container" id="center_due"><?php echo $i; $i++; ?></td>
					<td class="container" id="dates"><?php echo $row['dd']?></td>
					<td class="container" id="single_due"><?php $forIntBal = number_format($row['principal_due'], 2); echo $forIntBal;?></td>
					<td class="container" id="single_due"><?php $forIntBal = number_format($row['interest_due'], 2); echo $forIntBal;?></td>
					<td class="container" id="single_due"><?php $forIntBal = number_format($row['total_due'], 2); echo $forIntBal;?></td>
					<td class="container" id="single_balance"><?php $forIntBal = number_format($row['expected_principal_balance'], 2); echo $forIntBal;?></td>
					<td class="container" id="single_balance"><?php $forIntBal = number_format($row['expected_interest_balance'], 2); echo $forIntBal;?></td>
					<td class="container" id="single_balance"><?php $forIntBal = number_format($row['expected_total_balance'], 2); echo $forIntBal;?></td>
					</tr>
					<?php
				}
			}
			?>
			</tbody>
			</table>
			
			<!-- payments -->
			<table class="table" id="payment_table">
			<thead>
			<tr>
			<td colspan="7" id="single_headsEND">PAYMENTS</td>
			</tr>
			<tr>
			<td rowspan="2" id="dates">Turn Date</td>
			<td colspan="3" id="center_due">Paid</td>
			<td colspan="3" id="center_balance">Balance</td>
			</tr>
			<tr>
			<td id="center_due">Principal</td>
			<td id="center_due">Interest</td>
			<td id="center_due">Turn Amount</td>
			<td id="center_balance">Principal</td>
			<td id="center_balance">Interest</td>
			<td id="center_balance">Total</td>
			</tr>
			</thead>
			<tbody>
			<tr>
			<td>-</td>
			<td>-</td>
			<td>-</td>
			<td>-</td>
			<td>-</td>
			<td>-</td>
			<td>-</td>
			</tr>
			<?php
			
			$origapb = 0;
			$origaib = 0;
			$origatb = 0;
			
			if (isset($_GET['client'])){
				$local_id=$_GET['client'];
				
				
				
				
				$sql5 = "SELECT DATE_FORMAT(p.turn_date, '%b-%d-%y') AS turn_date, p.turn_amount, p.principal_paid, p.interest_paid, p.actual_principal, p.actual_interest, p.actual_total, c.status FROM payment p, cases c WHERE p.client_id=$local_id AND c.client_id=$local_id AND c.status='Closed'";
				$result5 = mysqli_query($conn, $sql5);
				
				
				/*$sql6 = "SELECT c.loan_amount, c.weekly_interest_rate, c.payment_period, c.status FROM cases c WHERE c.client_id=$local_id AND c.status='Closed'";
				$result6 = mysqli_query($conn, $sql6);
				
				if (mysqli_num_rows($result6) > 0) {
				while($rowa = mysqli_fetch_assoc($result6)) {
				$origapb = $rowa['loan_amount'];
				$origaib = $rowa['loan_amount']*($rowa['weekly_interest_rate']*0.01)*$rowa['payment_period'];
				$origatb = $origapb+$origaib;
				}
				}*/
				if (mysqli_num_rows($result5) > 0) {
					
					
					while($row = mysqli_fetch_assoc($result5)) {
						
						
						
						?>
						<tr>
						<td class="container" id="dates"><?php echo $row['turn_date']?></td>
						<td class="container" id="single_due"><?php $forIntBal = number_format($row['principal_paid'], 2); echo $forIntBal;?></td>
						<td class="container" id="single_due"><?php $forIntBal = number_format($row['interest_paid'], 2); echo $forIntBal;?></td>
						<td class="container" id="single_due"><?php $forIntBal = number_format($row['turn_amount'], 2); echo $forIntBal;?></td>
						<td class="container" id="single_balance"><?php $forIntBal = number_format($row['actual_principal'], 2); echo $forIntBal;?></td>
						<td class="container" id="single_balance"><?php $forIntBal = number_format($row['actual_interest'], 2); echo $forIntBal;?></td>
						<td class="container" id="single_balance"><?php $forIntBal = number_format($row['actual_total'], 2); echo $forIntBal;?></td>
						
						</tr>
						<?php
					}
				}
			}
		}
	}
	
	else{
		echo('<br> <br><h5>No active cases.</h5><br>');
	}
}
?>
</div>
</div>
</div>
