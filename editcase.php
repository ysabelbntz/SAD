<?php 

include("layout.php"); //this includes layout.php which contains the navbar and footer
include_once("database.php");
$sql = 'SELECT client_id, representative_last_name, representative_first_name  FROM clients WHERE client_id like "'.$_GET['value'].'"';

if(isset($_POST['add_button'])){
	$notes=$_POST['notes'];
	$sql1="UPDATE cases SET notes='$notes'";
	$result1 = $conn->query($sql1);
	if(!$result){
			echo $conn->error;
	}
	else{
		echo('<meta http-equiv="refresh" content="0;URL=main.php"/>');
	}		
}

?>

<h1>EDIT CASE</h1>
<h2>
<?php 
$result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) > 0) 
  {
    while($row = mysqli_fetch_assoc($result)) 
    {
    echo $row['representative_last_name'].", ".$row['representative_first_name'];
	echo('
	</h2>
	<div id="form_Addcase">
	<form class="form-horizontal" action="submitCase.php?value='.$row['client_id'].'" method="post">
	  <div class="form-group" ID="for_notes">
	      <textarea class="form-control" rows="6" id="notes" placeholder="Enter notes"></textarea>
	  </div>
	  <div class="form-group"> 
	    <div class="col-sm-offset-4 col-sm-6">
	      <button type="submit" class="btn btn-default" id="add_button">Update</button>
	      <button type="submit" class="btn btn-default" id="cancel" onClick="window.location=\'http://localhost:8080/main.php\';">Cancel </button>
	    </div>
	  </div>
	</form>
	</div>
	');
	}
}
?>