<?php

include ('database.php');
require_once 'dompdf/autoload.inc.php';

// reference the Dompdf namespace
use Dompdf\Dompdf;

// instantiate and use the dompdf class
$dompdf = new Dompdf();

if(isset($_POST['add_button'])){
		$date1=$_POST['period_start'];
		$date2=$_POST['period_end'];
		$class=$_POST['class'];
}

if ($class=="Micro and SME")
{
	$sql4 = "SELECT a.username, cl.representative_last_name, cl.representative_first_name, ca.date_of_release, ca.loan_amount, ca.actual_total_balance
	FROM accounts a, clients cl, cases ca
	WHERE a.account_id=cl.account_id
	AND ca.client_id=cl.client_id;";
}
else
{
	$sql4 = "SELECT a.username, cl.representative_last_name, cl.representative_first_name, ca.date_of_release, ca.loan_amount, ca.actual_total_balance
	FROM accounts a, clients cl, cases ca
	WHERE a.account_id=cl.account_id
	AND ca.client_id=cl.client_id
	AND cl.classification='".$class."';";
}

$result4 = mysqli_query($conn, $sql4);
$total_amount=0;
$total_balance=0;


$content='
<html lang="en">
	<head>
		<link href="bootstrap-3.3.5-dist/css/bootstrap.min.css" rel="stylesheet">
		<link rel = "stylesheet" type = "text/css" href = "css/pdf.css">
		<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
	</head>
	<body>
	<table style="width:100%;">
		<tr>
			<td colspan="5" class="title" style="text-align:right; border-bottom:1px solid gray;"><img src="images/logo.jpg" width="200px"></td>
		</tr>
		<tr>
			<td colspan="5" class="title"><h1>RELEASE REPORT</h1></td>
		</tr>
		<tr>
			<td colspan="5">Date: '.$date1.' to '. $date2.'</td>
		</tr>
		<tr>
			<td colspan="5">Business Type: '.$class.'</td>
		</tr>
		<tr id = "mainthead">
			<td>Officer</td>
			<td>Client Name</td>
			<td>Date of Release</td>
			<td>Loan Amount</td>
			<td>Actual Balance</td>
		</tr>';
if (mysqli_num_rows($result4) > 0)
	{
  		while($row = mysqli_fetch_assoc($result4))
  		{
			$content.='
	  		<tr>
	  			<td>'.$row['username'].'</td>
				<td style="text-align:right;">'.$row['representative_last_name'].', '.$row['representative_first_name'].'</td>
				<td style="text-align:right;">'.$row['date_of_release'].'</td>
				<td style="text-align:right;">'.$row['loan_amount'].'</td>
				<td style="text-align:right;">'.$row['actual_total_balance'].'</td>
			</tr>';
			$total_amount=$total_amount+$row['loan_amount'];
			$total_balance=$total_balance+$row['actual_total_balance'];
		}
	}

	$content.='
	<tr>
		<td colspan="2"></td>
		<td id="bottom">Total Amount</td>
		<td style="text-align:right;">'.$total_amount.'</td>
		<td></td>
	</tr>
	<tr>
		<td colspan="2"></td>
		<td id="bottom">Total Balance</td>
		<td></td>
		<td style="text-align:right;">'.$total_balance.'</td>
	</tr>
	</table>
	</body>
</html>
';

$dompdf->loadHtml($content);

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'portrait');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream('my.pdf',array('Attachment'=>0));