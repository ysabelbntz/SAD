<?php 

include("layout.php"); //this includes layout.php which contains the navbar and footer
include_once("database.php");
$clid = $_GET['client'];
$cid = $_GET['case'];
$sql = 'SELECT clients.client_id, cases.client_id, clients.representative_last_name, clients.representative_first_name, cases.notes FROM cases,clients WHERE clients.client_id = "'.$clid.'" AND cases.case_id = "'.$cid.'" AND clients.client_id=cases.client_id';

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
	<form class="form-horizontal" action="submitEdit2.php?value='.$cid.'" method="post">
	  <div class="form-group" id="for_notes">
	      <textarea class="form-control" rows="8" id="notes" name="notes">'.$row['notes'].'</textarea>
	  </div>
	  <div class="form-group"> 
	    <div class="col-sm-offset-3 col-sm-6">
	      <button type="submit" class="btn btn-default" id="add_button" name="add_button">Update</button>
	      <a href="view_single.php?client='.$clid.'" class="btn btn-default" id="cancel">Cancel </a>
	    </div>
	  </div>
	</form>
	</div>
	');
	}
}
?>