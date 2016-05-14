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

$sql = "SELECT clients.representative_last_name, clients.representative_first_name,clients.company_name
FROM expected, clients
WHERE expected.expected_collection_date='".$curr_date."'
AND expected.client_id = clients.client_id;";

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
			<th colspan="2">No payments due</th>
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
FROM accounts,clients
WHERE
(clients.status='ACTIVE' OR clients.status='RISK')
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

	<?php
	$aaaa = "2016-2-1";
	?>
<script>

 $(document).ready(function() {

    // page is now ready, initialize the calendar...

    $('#calendar').fullCalendar({
        // put your options and callbacks here
        dayClick: function(){
        	
        	alert("\'<?php print $aaaa; ?>\'");
        }
    });

});
 </script>