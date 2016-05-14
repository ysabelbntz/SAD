
<?php 

include("layout.php"); //this includes layout.php which contains the navbar and footer
include ('database.php');

?> 

<!-- div for name and status -->
<div>
	<?php
		if (isset($_GET['url_id'])){
		  	$local_id=$_GET['url_id'];

            $sql = "SELECT cl.client_id, cl.representative_last_name, cl.representative_first_name, cl.status FROM clients cl WHERE cl.client_id=$local_id;";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
                while($row = mysqli_fetch_assoc($result)) {
    ?>
        	<h1><?php echo $row['representative_last_name'].", ".$row['representative_first_name'];?></h1>
            <h3>(<?php echo $row['status'];?>)</h3>

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
		  	$local_id=$_GET['url_id'];

            $sql1 = "SELECT cl.classification, cl.email, cl.comaker_last_name, cl.comaker_first_name, cl.contact_number, cl.company_name, cl.notes FROM clients cl WHERE cl.client_id = $local_id;";
            $result1 = mysqli_query($conn, $sql1);

            if (mysqli_num_rows($result1) > 0) {
                while($row = mysqli_fetch_assoc($result1)) {
        ?>
	        	<tr>
			      <td>Classification</td>
			      <td><?php echo $row['classification']?></td>
			      <td>E-mail</td>
			      <td><?php echo $row['email']?></td>
			    </tr>
			    <tr>
			    	<td>Co-Maker</td>
			    	<td><?php echo $row['comaker_last_name'].", ".$row['comaker_first_name']?></td>
			    	<td>Contact Number</td>
			    	<td><?php echo $row['contact_number']?></td>
			    </tr>
			    <tr>
			    	<td>Company Name</td>
			    	<td><?php echo $row['company_name']?></td>
			    	<td>Notes</td>
			    	<td rowspan="3">Hello World</td>
			    </tr>
			    <tr>
			    	<td>Address</td>
			    	<td rowspan="2">1211 Katipunan Ave., Quezon City</td>
			    </tr>
			    <tr></tr>
        <?php
    			}
        	}
        ?>
		</table>
	</div>

<!-- div for active case header with loan duration -->
<div>
	<h3>ACTIVE CASE</h3>

	<?php
		if (isset($_GET['url_id'])){
		  	$local_id=$_GET['url_id'];

            $sql2 = "SELECT DATE_FORMAT(c.date_of_release, '%b-%d-%y') AS rd, DATE_FORMAT(c.date_of_maturity, '%b-%d-%y') AS md FROM cases c WHERE c.client_id=$local_id;";
            $result2 = mysqli_query($conn, $sql2);

            if (mysqli_num_rows($result2) > 0) {
                while($row = mysqli_fetch_assoc($result2)) {
    ?>
        	<p><?php echo $row['rd'].' to '.$row['md'];?>
    <?php
        		}
    		}
        }
    ?>
		<a href="input.php"><i class="glyphicon glyphicon-plus" id="icons"></i></a>
		<a href="editclient.php"><i class="glyphicon glyphicon-pencil" id="icons"></i></a>
		<a href="addcase.php"><i class="glyphicon glyphicon-level-up" id="icons"></i></a>
		</p>
	</div>

<!-- div for expected table -->
<div class="table-responsive" id="view_expected_table">
	<table class="table">
		<thead>
		  	<tr>
		  		<td colspan="8" id="colored_head">EXPECTED</td>
		  	</tr>
		  	<tr>
		  		<td rowspan="2">No.</td>
		  		<td rowspan="2">Due Date</td>
		  		<td colspan="3">Due</td>
		  		<td colspan="3">Balance</td>
		  	</tr>
		  	<tr>
		  		<td>Principal</td>
		  		<td>Interest</td>
		  		<td>Total</td>
		  		<td>Principal</td>
		  		<td>Interest</td>
		  		<td>Total</td>
		  	</tr>
		</thead>
		<tbody>

		<!-- release -->

		<?php
		if (isset($_GET['url_id'])){
		  	$local_id=$_GET['url_id'];

            $sql3 = "SELECT c.date_of_release, c.loan_amount, c.weekly_interest_rate, c.payment_period, (c.loan_amount*c.weekly_interest_rate*c.payment_period) intBal, (c.loan_amount+(c.loan_amount*c.weekly_interest_rate*c.payment_period)) totalBal FROM cases c WHERE c.client_id=$local_id;";
            $result3 = mysqli_query($conn, $sql3);;

            if (mysqli_num_rows($result3) > 0) {
                while($row = mysqli_fetch_assoc($result3)) {
       	?>
        	<tr>
        		<td class="container" id="center_column">Release</td>
        		<td class="container" id="center_column"><?php echo $row['date_of_release']?></td>
        		<td colspan="3"></td>
        		<td class="container" id="money"><?php echo $row['loan_amount']?></td>
                <td class="container" id="money"><?php echo $row['intBal']?></td>
                <td class="container" id="money"><?php echo $row['totalBal']?></td>
            </tr>
        <?php
        		}
    		}
        }
        ?>

       	<!-- expected table -->
		<?php
		  	
            $sql4 = "SELECT e.expected_id, DATE_FORMAT(e.expected_due_date, '%b-%d-%y') AS dd, e.principal_due, e.interest_due, e.total_due, e.expected_principal_balance, e.expected_interest_balance, e.expected_total_balance FROM cases, expected e WHERE cases.case_id=e.case_id AND e.client_id=$local_id;";
            $result4 = mysqli_query($conn, $sql4);
            $i = 1;

            if (mysqli_num_rows($result4) > 0) {
                // output data of each row
                while($row = mysqli_fetch_assoc($result4)) {
        ?>
        	<tr>
        		<td class="container" id="center_column"><?php echo $i; $i++; ?></td>
        		<td class="container" id="center_column"><?php echo $row['dd']?></td>
        		<td class="container" id="money"><?php echo $row['principal_due']?></td>
                <td class="container" id="money"><?php echo $row['interest_due']?></td>
                <td class="container" id="money"><?php echo $row['total_due']?></td>
                <td class="container" id="money"><?php echo $row['expected_principal_balance']?></td>
                <td class="container" id="money"><?php echo $row['expected_interest_balance']?></td>
                <td class="container" id="money"><?php echo $row['expected_total_balance']?></td>
            </tr>
        <?php
    			}
        	}
        ?>
		</tbody>
	</table>

	<!-- payments -->
	<table class="table">
		<thead>
		  	<tr>
		  		<td colspan="7" id="colored_head">PAYMENTS</td>
		  	</tr>
		  	<tr>
		  		<td rowspan="2">Turn Date</td>
		  		<td rowspan="2">Turn Amount</td>
		  		<td colspan="2">Paid</td>
		  		<td colspan="3">Balance</td>
		  	</tr>
		  	<tr>
		  		<td>Principal</td>
		  		<td>Interest</td>
		  		<td>Principal</td>
		  		<td>Interest</td>
		  		<td>Total</td>
		  	</tr>
		</thead>
		<tbody>

		<?php
			if (isset($_GET['url_id'])){
		  	$local_id=$_GET['url_id'];

            $sql5 = "SELECT DATE_FORMAT(p.turn_date, '%b-%d-%y') AS turn_date, p.turn_amount, p.principal_paid, p.interest_paid, c.actual_principal_balance, c.actual_interest_balance, c.actual_total_balance FROM cases c, payment p WHERE c.client_id=$local_id AND p.client_id=$local_id;";
            $result5 = mysqli_query($conn, $sql5);

            if (mysqli_num_rows($result5) > 0) {
                while($row = mysqli_fetch_assoc($result5)) {
        ?>
        	<tr>
        		<td class="container" id="center_column"><?php echo $row['turn_date']?></td>
        		<td class="container" id="money"><?php echo $row['turn_amount']?></td>
        		<td class="container" id="money"><?php echo $row['principal_paid']?></td>
                <td class="container" id="money"><?php echo $row['interest_paid']?></td>
                <td class="container" id="money"><?php echo $row['actual_principal_balance']?></td>
                <td class="container" id="money"><?php echo $row['actual_interest_balance']?></td>
                <td class="container" id="money"><?php echo $row['actual_total_balance']?></td>
            </tr>
        <?php
        		}
    		}
        }
        ?>
		</tbody>
	</table>
</div>

<!-- div for finished cases -->
<div>
	<h3>FINISHED CASES</h3>
	No finished cases.
	<!-- INSERT CODE HERE -->
</div>
