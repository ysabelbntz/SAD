<?php 

include("layout.php"); //this includes layout.php which contains the navbar and footer
include_once("database.php");
$sql = 'SELECT * FROM accounts WHERE account_id like "'.$_GET['value'].'"';
?>
<h1>EDIT OFFICER</h1>
<h2>
<?php 
$result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) > 0) 
  {
    while($row = mysqli_fetch_assoc($result))
    {
    echo $row['last_name'].", ".$row['first_name']." ( ".$row['username']." )";
?>
</h2>
<?php
echo('
<div id="form_Addclient">
<form class="form-horizontal" action="submitEdit3.php?value='.$row['account_id'].'" method="post">
  <div class="form-group">
    <label class="control-label col-sm-4" for="rep">Name of Officer </label>
    <div class="col-sm-3">
          <input type="text" class="form-control form-control-inline2" id="lastr" name="lastr" value="'.$row['last_name'].'" readonly>
    </div>
    <div class="col-sm-3">
          <input type="text" class="form-control form-control-inline2" id="firstr" name="firstr" value="'.$row['first_name'].'" readonly>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-4" for="status">Account Type </label>
    <div class="col-sm-6">
      <input type="text" class="form-control form-control-inline" id="status" name="status" value="'.$row['account_type'].'" readonly>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-4" for="email">Email </label>
    <div class="col-sm-6">
      <input type="email" class="form-control" id="email" name="email" value="'.$row['email'].'">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-4" for="tel">Contact Number </label>
    <div class="col-sm-6">
      <input type="text" class="form-control" id="tel" name="tel" value="'.$row['contact_number'].'">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-4" for="oadd">Home Address </label>
    <div class="col-sm-6"> 
      <textarea class="form-control" rows="3" id="oadd" name="oadd">'.$row['address'].'</textarea>
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
      <input type="submit" value="Add Officer" class="btn btn-default" id="add_button" name="add_button" onclick="isEmpty();"/>
      <a href="viewAllOfficers.php" class="btn btn-default" id="cancel">Cancel </a>
    </div>
  </div>
</form>
</div>
');
}
}
?>