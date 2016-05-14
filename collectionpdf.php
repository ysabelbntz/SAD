<!-- FILTER ACCDG TO CLASSIFICATION -->
<!-- SHOW DATES/DURATION -->
<!-- FILTER ACCDG TO DATES -->
<!-- FORMAT CURRENCY -->
<!-- SHOW ACTUAL BALANCE -->
<!-- CSS HUHU -->

<?php

include ('database.php');

require_once ("fpdf/fpdf.php");
$pdf=new FPDF;
$pdf-> AddPage();
$pdf-> SetFont("Arial","", "10");
$pdf-> Cell(0,10,"COLLECTIONS REPORT",1,1,"C");
$pdf-> Cell(0,10,"From",1,1,"C");



		$date1=$_GET['dateStart'];
		$date2=$_GET['dateEnd'];

		$pdf-> Cell(38,10,$date1,1,0,"C");
		$pdf-> Cell(38,10,$date2,1,1,"C");



$pdf-> Cell(38,10,"Officer",1,0,"C");
$pdf-> Cell(38,10,"Client Name",1,0,"C");
$pdf-> Cell(38,10,"Total Collections",1,0,"C");
$pdf-> Cell(38,10,"Total Penalty",1,0,"C");
$pdf-> Cell(38,10,"Actual Balance",1,1,"C");

$sql4 = "SELECT a.account_id, a.username, cl.client_id, cl.company_name, p.turn_amount, p.penalty FROM accounts a, clients cl, payment p WHERE a.account_id=p.account_id AND cl.client_id=p.client_id;";
$result4 = mysqli_query($conn, $sql4);
$total=0;

if (mysqli_num_rows($result4) > 0) {
    while($row = mysqli_fetch_assoc($result4)) {
		$pdf-> Cell(38,10,$row['username'],1,0,"C");
		$pdf-> Cell(38,10,$row['company_name'],1,0,"C");
		$pdf-> Cell(38,10,$row['turn_amount'],1,0,"C");
		$pdf-> Cell(38,10,$row['penalty'],1,1,"C");

		$total=$total+$row['turn_amount']+$row['penalty'];
    }
}

$pdf-> Cell(50,10,"Total Collection",1,0,"C");
$pdf-> Cell(50,10,$total,1,1,"C");
$pdf-> Output();

?>