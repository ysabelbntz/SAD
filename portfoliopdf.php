<?php


require_once ("fpdf/fpdf.php");
$pdf=new FPDF;
$pdf-> AddPage();
$pdf-> SetFont("Arial","", "10");
$pdf-> Cell(0,10,"PORTFOLIOS AT RISK REPORT",1,1,"C");


	if(isset($_POST['add_button'])){
		// $date1=$_POST['period_start'];
		// $date2=$_POST['period_end'];
		$class=$_POST['class'];
	}

// $pdf-> Cell(0,10,"As of ".$date1,1,1,"C");
$pdf-> Cell(0,10,"Business Type: ".$class,1,1,"C");

$pdf-> Cell(47.5,10,"Client",1,0,"C");
$pdf-> Cell(47.5,10,"Company",1,0,"C");
$pdf-> Cell(47.5,10,"Date of Last Payment",1,0,"C");
$pdf-> Cell(47.5,10,"Outstanding Balance",1,0,"C");

$sql4 = "SELECT cl.client_id, cl.representative_first_name, cl.representative_last_name, cl.company_name, c.actual_total_balance, cl.status
	FROM clients cl, cases c, payment p,
	WHERE cl.client_id=c.client_id AND cl.status='RISK';";
$result4 = mysqli_query($conn, $sql4);
$total=0;

if (mysqli_num_rows($result4) > 0) {
    while($row = mysqli_fetch_assoc($result4)) {

		$pdf-> Cell(38,10,$row['representative_first_name']." ".$row['representative_last_name'],1,0,"C");
		$pdf-> Cell(38,10,$row['company_name'],1,0,"C");
		$pdf-> Cell(38,10,$row['turn_amount'],1,0,"C");
		$pdf-> Cell(38,10,$row['actual_total_balance'],1,1,"C");

		$total=$total+$row['turn_amount']+$row['penalty'];
    }
}




$pdf-> Output();

?>





