<?php
session_start();

include("authorization.php"); 
include_once("database.php");

if(!isset($_SESSION['key'])){
	echo('<meta http-equiv="refresh" content="0;URL=index.php"/>');
}
else{
$userid = $_SESSION['id'];
$sql123 = 'SELECT account_type,account_id FROM accounts WHERE account_id like "'.$userid.'"';
$result123 = mysqli_query($conn, $sql123);

?>
<html lang="en">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="shortcut icon" href="images/favicon.ico" type="image/icon"/>
	<link rel="icon" href="images/favicon.ico" type="image/icon"/>
	<title>MEGA Lending Resources</title>
	<link href="bootstrap-3.3.5-dist/css/bootstrap.min.css" rel="stylesheet">

	<link href="css/bootstrap-datepicker3.standalone.css" rel="stylesheet">
	<link href="css/responsive-calendar.css" rel="stylesheet" media="screen">
	
	<link rel = "stylesheet" type = "text/css" href = "css/main.css">
	<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="fullcalendar/fullcalendar.css" />
	<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn\'t work if you view the page via file:// -->
</head>
<body>
	<nav class="navbar navbar-default navbar-static">
	  <div class="container-fluid">
	    <!-- Brand and toggle get grouped for better mobile display -->
	    <div class="navbar-header">
	      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
	        <span class="sr-only">Toggle navigation</span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	        <span class="icon-bar"></span>
	      </button>
	      <a class="navbar-brand" href="main.php"><img src="images/logo.jpg" alt="logo" id="logo"></a> <!-- logo for the navbar -->
	    </div>


<div>
<!-- if admin is logged in -->
<?php 
  if (mysqli_num_rows($result123) > 0) 
  {
    while($row = mysqli_fetch_assoc($result123))
    {
$acct='Admin';
if($row['account_type']===$acct){
echo('
<div class="top"style="text-align:right;">
	Logged in as '.$_SESSION['username'].'||  <a href="logout.php">Log out</a>
	<div style="margin-bottom:1%;">
		<div>
			 <!-- Collect the nav links, forms, and other content for toggling -->
		    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		      	<ul class="nav navbar-nav navbar-right">
				    <li class="active"><a href="main.php">HOME</a></li>
					<li class="dropdown">
			        	<a class="dropdown-toggle" data-toggle="dropdown" href="#">CLIENTS</a>
			        	<ul class="dropdown-menu">
			          		<li><a href="addclient.php">Add Client</a></li>
			         		<li><a href="viewClient.php">View All Clients</a></li>
			        	</ul>
			      	</li>
			      	<li class="dropdown">
			        	<a class="dropdown-toggle" data-toggle="dropdown" href="#">COLLECTIONS</a>
			        	<ul class="dropdown-menu">
			          		<li><a href="collection.php">Collections Report</a></li>
			         		<li><a href="portfolio.php">Portfolios Report</a></li>
			         		<li><a href="release.php">Release Report</a></li>
			        	</ul>
			      	</li>
			      	<li class="dropdown">
			        	<a class="dropdown-toggle" data-toggle="dropdown" href="#">OFFICERS</a>
			        	<ul class="dropdown-menu">
			          		<li><a href="addofficer.php">Add Officer</a></li>
			         		<li><a href="viewAllOfficers.php">View All Officers</a></li>
			        	</ul>
			      	</li>
			      	<li class="dropdown">
			        	<a class="dropdown-toggle" data-toggle="dropdown" href="#">MAINTENANCE</a>
			        	<ul class="dropdown-menu">
			          		<li><a href="backup.php">Backup</a></li>
			         		<li><a href="restore.php">Restore</a></li>
			        	</ul>
			      	</li>
				</ul>
			</div><!-- /.navbar-collapse -->
		</div>
	</div><!--removelater-->
</div><!-- /.container-fluid -->
		</nav>
');
}
else{
echo('
<div class="top"style="text-align:right;">
	Logged in as '.$_SESSION['username'].'|| <a href="logout.php">Log out</a>
	<div style="margin-bottom:1%;">
		<div>
			 <!-- Collect the nav links, forms, and other content for toggling -->
		    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
		      	<ul class="nav navbar-nav navbar-right">
				    <li class="active"><a href="main.php">HOME</a></li>
					<li class="dropdown">
			        	<a class="dropdown-toggle" data-toggle="dropdown" href="#">CLIENTS</a>
			        	<ul class="dropdown-menu">
			          		<li><a href="addclient.php">Add Client</a></li>
			         		<li><a href="viewClient.php">View All Clients</a></li>
			        	</ul>
			      	</li>
			      	<li class="dropdown">
			        	<a class="dropdown-toggle" data-toggle="dropdown" href="#">COLLECTIONS</a>
			        	<ul class="dropdown-menu">
			          		<li><a href="collection.php">Collections Report</a></li>
			         		<li><a href="portfolio.php">Portfolios Report</a></li>
			        	</ul>
			      	</li>
				</ul>
			</div><!-- /.navbar-collapse -->
		</div>
	</div><!--removelater-->
</div><!-- /.container-fluid -->
		</nav>
');
}
}
}
?>
	  <div class="footer">
 
       Developed by SYNC Consulting Group | 2016
 
      </div>
<!-- for whoever is logged in --> 

    <!-- jQuery (necessary for Bootstrap\'s JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="bootstrap-3.3.5-dist/js/bootstrap.min.js"></script>
    <script src="js/bootstrap-datepicker.js"></script>
    <script src="js/jquery.js"></script>
	<script src="js/responsive-calendar.js"></script>
	<script src="js/moment.min.js"></script>
	<script src="fullcalendar/fullcalendar.js"></script>

	<?php
	}
	?>