<?php 

include("layout.php"); //this includes layout.php which contains the navbar and footer
include_once("database.php");
$sql = 'SELECT * FROM clients WHERE client_id like "'.$_GET['value'].'"';
?>

<h1>EDIT CLIENT</h1>
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
<div id="form_Addclient">
<form class="form-horizontal" action="submitEdit1.php?value='.$row['client_id'].'" role="form" method="post">

<!-- EDIT THESE PARTS FOR DISABLING EDITS: I ADDED READONLY BUT IT WON\'T WORK FOR SELECT --> 
 <!-- <div class="form-group">
    <label class="control-label col-sm-4" for="class">Classification </label>
    <div class="col-sm-6">
      <select class="form-control form-control-inline" id="class">
      <option readonly>Micro</option>
      <option readonly>SME</option>
    </select>
    </div>
  </div> -->
  <div class="form-group">
    <label class="control-label col-sm-4" for="rep">Name of Representative </label>
    <div class="col-sm-3">
          <input type="text" class="form-control form-control-inline2" id="last" value="'.$row['representative_last_name'].'" readonly> 
    </div>
    <div class="col-sm-3">
          <input type="text" class="form-control form-control-inline2" id="first" value="'.$row['representative_first_name'].'" readonly>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-4" for="co">Name of Co-maker </label>
    <div class="col-sm-3">
      <input type="text" class="form-control form-control-inline2" id="last" value="'.$row['comaker_last_name'].'" readonly>
    </div>
    <div class="col-sm-3">
      <input type="text" class="form-control form-control-inline2" id="first" value="'.$row['comaker_first_name'].'" readonly>
    </div>
  </div>
<!-- END OF DISABLED SECTION--> 

  <div class="form-group">
    <label class="control-label col-sm-4" for="company">Company Name </label>
    <div class="col-sm-6">
      <input type="text" class="form-control" id="company" name="company" value="'.$row['company_name'].'">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-4" for="tel">Contact Number </label>
    <div class="col-sm-6">
      <input type="text" class="form-control" id="tel" name="tel" value="'.$row['contact_number'].'">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-4" for="email">Email </label>
    <div class="col-sm-6">
      <input type="email" class="form-control" id="email" name="email" value="'.$row['email'].'">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-4" for="oadd">Office Address </label>
    <div class="col-sm-6"> 
      <textarea class="form-control" rows="3" id="oadd" name="oadd">'.$row['address'].'</textarea>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-4" for="status">Status </label>
    <div class="col-sm-6">
      <select class="form-control form-control-inline" id="status" name="status" value="'.$row['classification'].'">
      <option>Active</option>
      <option>Risk</option>
      <option>Runaway</option>
      </select>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-4" for="notes">Notes </label>
    <div class="col-sm-6">
      <textarea class="form-control" rows="3" id="notes" name="notes">'.$row['notes'].'</textarea>
    </div>
  </div>
  <div class="form-group"> 
    <div class="col-sm-offset-4 col-sm-7">
      <button type="submit" class="btn btn-default" id="add_button" name="add_button">Update</button>
     <a href="viewClient.php" class="btn btn-default" id="cancel">Cancel </a>
    </div>
  </div>
</form>
</div>
');
}
}
?>
