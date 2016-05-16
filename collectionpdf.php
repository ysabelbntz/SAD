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
	$sql4 = "SELECT a.last_name, a.first_name, cl.client_id, cl.company_name, p.turn_amount, p.penalty, p.turn_date, cl.classification, ca.actual_total_balance
	FROM accounts a, clients cl, payment p, cases ca
	WHERE a.account_id=p.account_id
	AND cl.client_id=p.client_id
	AND ca.client_id=cl.client_id
	AND ca.client_id=p.client_id
	AND p.case_id = ca.case_id
	;";
}
else
{
	$sql4 = "SELECT a.last_name, a.first_name,  cl.client_id, cl.company_name, p.turn_amount, p.penalty, p.turn_date, cl.classification, ca.actual_total_balance
	FROM accounts a, clients cl, payment p, cases ca
	WHERE a.account_id=p.account_id
	AND a.account_id=cl.account_id
	AND cl.client_id=p.client_id
	AND ca.client_id=cl.client_id
	AND ca.client_id=p.client_id
	AND p.case_id = ca.case_id
	AND cl.classification='".$class."';";
}

$result4 = mysqli_query($conn, $sql4);
$total=0;



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
			<td colspan="5" class="title"><h1>COLLECTIONS REPORT</h1></td>
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
			<td>Total Collections</td>
			<td>Total Penalty</td>
			<td>Actual Balance</td>
		</tr>';

if (mysqli_num_rows($result4) > 0)
	{
  		while($row = mysqli_fetch_assoc($result4))
  		{
			$content.='
	  		<tr>
	  			<td>'.$row['last_name'].', '.$row['first_name'].'</td>
				<td style="text-align:right;">'.$row['company_name'].'</td>
				<td style="text-align:right;">'.$row['turn_amount'].'</td>
				<td style="text-align:right;">'.$row['penalty'].'</td>
				<td style="text-align:right;">'.$row['actual_total_balance'].'</td>
			</tr>';

			$total=$total+$row['turn_amount']+$row['penalty'];
		}
	}
	$content.='
	<tr>
		<td colspan="3"></td>
		<td id="bottom">Total Collection</td>
		<td style="text-align:right;">'.$total.'</td>
	</tr>
	</table>
	</body>

';

$dompdf->loadHtml($content);

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'portrait');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream('my.pdf',array('Attachment'=>0));