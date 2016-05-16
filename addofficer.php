<?php 

include("layout.php"); //this includes layout.php which contains the navbar and footer

?>
<h1>ADD OFFICER</h1>
<div id="form_Addclient">
<form class="form-horizontal" action="submitOfficer.php" method="post">
  <div class="form-group">
    <label class="control-label col-sm-4" for="rep">Name of Officer </label>
    <div class="col-sm-3">
          <input type="text" class="form-control form-control-inline2" id="lastr" name="lastr" placeholder="Enter last name">
    </div>
    <div class="col-sm-3">
          <input type="text" class="form-control form-control-inline2" id="firstr" name="firstr" placeholder="Enter first name">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-4" for="co">Account Details </label>
    <div class="col-sm-3">
      <input type="text" class="form-control form-control-inline2" id="lastc" name="lastc" placeholder="Enter username">
    </div>
    <div class="col-sm-3">
      <input type="password" class="form-control form-control-inline2" id="firstc" name="firstc" placeholder="Enter password">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-4" for="status">Account Type </label>
    <div class="col-sm-6">
      <select class="form-control form-control-inline" id="status" name="status">
      <option>Officer</option>
      <option>Admin</option>
      </select>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-4" for="email">Email </label>
    <div class="col-sm-6">
      <input type="email" class="form-control" id="email" name="email" placeholder="Enter email">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-4" for="tel">Contact Number </label>
    <div class="col-sm-6">
      <input type="text" class="form-control" id="tel" name="tel" placeholder="Enter telephone number">
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-4" for="oadd">Home Address </label>
    <div class="col-sm-6"> 
      <textarea class="form-control" rows="3" id="oadd" name="oadd" placeholder="Enter address"></textarea>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-4" for="notes">Notes </label>
    <div class="col-sm-6">
      <textarea class="form-control" rows="3" id="notes" name="notes" placeholder="Enter notes"></textarea>
    </div>
  </div>
  <div class="form-group"> 
    <div class="col-sm-offset-4 col-sm-7">
      <input type="submit" value="Add Officer" class="btn btn-default" id="add_button" name="add_button" onclick="isEmpty();"/>
      <a href="addofficer.php" class="btn btn-default" id="cancel">Cancel </a>
    </div>
  </div>
</form>
</div>