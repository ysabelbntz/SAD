<?php
include("database.php");
include("layout.php");
include("authorization.php"); 

$curr_date = date("Y/m/d");

?>



<div id="side_by_side">
	
		<div id='calendar'>
		</div>
		<div id="tables">
			<div class="table-responsive" id="for_table">
				<table class="table table-hover">
				  <thead>
				    <tr id="mainthead">
<?php


$display_date = date("M d, Y");
?>
		<th><?php print $display_date?></th>
				    </tr>
<?php

$sql = "SELECT clients.representative_last_name, clients.representative_first_name,clients.company_name, clients.status, cases.status
FROM expected, clients, cases
WHERE expected.expected_due_date='".$curr_date."'
AND expected.client_id = clients.client_id AND cases.status!='Closed' AND clients.status!='Closed';";

$result = $conn->query($sql);
if ($result->num_rows > 0)
{
?>
		<tr id="subthead">
			<th>Client</th>
			<th>Company</th>
		</tr>
	</thead>
		<tbody>

<?php
	while($row=$result->fetch_array())
	{
?>
		
				    <tr>
				      <td><?php print $row[0]?>, <?php print $row[1]?></td>
				      <td><?php print $row[2]?></td>
				    </tr>
<?php
	}
}
else
{
?>
<tr id="subthead">
			<th colspan="2">No payments due this day</th>
		</tr>
	</thead>
<?php
}
?>
</tbody>
</table>
</div>
<!--remove date-->
			<div class="table-responsive" id="for_2ndtable"> 
				<table class="table table-hover">
				  <thead>
				    <tr id="mainthead">
				      <th colspan="2">Active Cases</th>
				    </tr>


<?php
$acctid=$_SESSION["id"];
$sqlcase = "SELECT clients.representative_last_name, clients.representative_first_name,clients.company_name
FROM accounts,clients,cases
WHERE
(clients.status='Active' OR clients.status='Risk')
AND cases.status='Active'
AND clients.account_id = '".$acctid."'
AND accounts.account_id = '".$acctid."'
;";

$result2 = $conn->query($sqlcase);
if ($result2->num_rows > 0)
{
?>
				    <tr id="subthead">
				      <th>Client</th>
				      <th>Company</th>
				    </tr>
				  </thead>
				  <tbody>
<?php
	while($row2=$result2->fetch_array())
	{
?>

				    <tr>
				      <td><?php print $row2[0]?>, <?php print $row2[1]?></td>
				      <td><?php print $row2[2]?></td>
				    </tr>
<?php
	}
}
else
{
?>
<tr id="subthead">
			<th colspan="2">No active cases</th>
		</tr>
	</thead>
<?php
}
?>
</tbody>
</table>
</div>
	</div>

<script>



$(document).ready(function() {
 	var date = new Date();
 	var d = date.getDate();
 	var m = date.getMonth();
 	var y = date.getFullYear();
    // page is now ready, initialize the calendar...

    $('#calendar').fullCalendar({

    	editable: false,
    	weekMode: 'liquid',
    	contentHeight:500,
<?php

$sqlcal = "SELECT clients.representative_last_name, clients.representative_first_name,expected.expected_due_date,clients.status
FROM expected, clients
WHERE expected.client_id = clients.client_id AND clients.status!='Closed'";

$resultcal = $conn->query($sqlcal);


$countercal = 0;

if ($resultcal->num_rows > 0)
{
?>
events: [

<?php
while($rowcal=$resultcal->fetch_array())
	{
		if ($countercal == $resultcal->num_rows)
		{
?>
	    	{
	    		title:<?php echo "'".$rowcal[0].", ".$rowcal[1]?>,
	    		start: <?php echo "'".$rowcal[2]."'"?>
	    	}
	    <?php
			
		}
		else
		{
		?>
			{
	    		title:<?php echo "'".$rowcal[0].", ".$rowcal[1]."'"?>,
	    		start: <?php echo "'".$rowcal[2]."'"?>
	    	},
		<?php
		}
		$countercal++;
	}
	?>
],
<?php
}
		?>
	
    
    eventColor: 'gray'
    });
});
 </script>