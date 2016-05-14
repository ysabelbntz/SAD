<?php


require_once 'dompdf/autoload.inc.php';

// reference the Dompdf namespace
use Dompdf\Dompdf;

// instantiate and use the dompdf class
$dompdf = new Dompdf();



$content='

	<html lang="en">
	<head>
		<link rel = "stylesheet" type = "text/css" href = "css/pdf.css">
		<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
	</head>
	<body>
		<h1>PORTFOLIOS REPORT</h1>
		<p>insert table here</p>
	</body>

';

$dompdf->loadHtml($content);

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'portrait');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream('my.pdf',array('Attachment'=>0));