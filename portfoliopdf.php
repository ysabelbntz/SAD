<?php

include ('database.php');
require_once 'dompdf/autoload.inc.php';

// reference the Dompdf namespace
use Dompdf\Dompdf;

// instantiate and use the dompdf class
$dompdf = new Dompdf();

if(isset($_POST['add_button'])){

		$class=$_POST['class'];
}

if ($class=="Micro and SME")
{
	$sql4 = "SELECT a.last_name, a.first_name, cl.representative_last_name, cl.representative_first_name, cl.company_name, pa.turn_date, ca.actual_total_balance
	FROM clients cl, cases ca, payment pa, accounts a
	WHERE a.account_id = cl.account_id
	AND cl.client_id=ca.client_id
	AND ca.case_id = pa.case_id
	AND pa.payment_id = (SELECT MAX(payment_id) FROM payment pay, clients cli, cases cas WHERE cli.client_id=cas.client_id AND cas.case_id = pay.case_id)
	AND cl.status='RISK';";

}
else
{
	$sql4 = "SELECT a.last_name, a.first_name, cl.representative_last_name, cl.representative_first_name, cl.company_name, pa.turn_date, ca.actual_total_balance
	FROM clients cl, cases ca, payment pa, accounts a
	WHERE a.account_id = cl.account_id
	AND cl.client_id=ca.client_id
	AND ca.case_id = pa.case_id
	AND pa.payment_id = (SELECT MAX(payment_id) FROM payment pay, clients cli, cases cas WHERE cli.client_id=cas.client_id AND cas.case_id = pay.case_id)
	AND cl.status='RISK'
	AND cl.classification='".$class."';";
}

$result4 = mysqli_query($conn, $sql4);
$total=0;
$curr_date = date("M d, Y");


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
			<td colspan="5" class="title"><h1>PORTFOLIOS AT RISK REPORT</h1></td>
		</tr>
		<tr>
			<td colspan="5">Business Type: '.$class.'</td>
		</tr>
		<tr>
			<td colspan="5">As of '.$curr_date.'</td>
		</tr>
		<tr id = "mainthead">
			<td>Officer</td>
			<td>Client</td>
			<td>Company</td>
			<td>Date of Last Payment</td>
			<td>Outstanding Balance</td>
		</tr>';

if (mysqli_num_rows($result4) > 0)
	{
  		while($row = mysqli_fetch_assoc($result4))
  		{
			$content.='
	  		<tr>
	  			<td>'.$row['last_name'].', '.$row['first_name'].'</td>
				<td>'.$row['representative_last_name'].', '.$row['representative_first_name'].'</td>
				<td style="text-align:right;">'.$row['company_name'].'</td>
				<td style="text-align:right;">'.$row['turn_date'].'</td>
				<td style="text-align:right;">'.$row['actual_total_balance'].'</td>
			</tr>';
			$total=$total+$row['actual_total_balance'];
		}
	}
	$content.='
	<tr>
		<td colspan="3"></td>
		<td id="bottom">Total Balance</td>
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