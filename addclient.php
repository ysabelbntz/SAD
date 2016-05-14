<script type = "text/javascript">
  function isEmpty() {//checks if all fields are complete
      if (document.getElementById("lastr").value == "" || document.getElementById("firstr").value == "" ||document.getElementById("lastc").value == "" ||
          document.getElementById("firstc").value == "" || document.getElementById("company").value == "" || document.getElementById("tel").value == "" || 
          document.getElementById("email").value == "" || document.getElementById("oadd").value == ""){
          alert("Please fill out all fields.");
          if(document.getElementById("lastr").value == ""){
            lastr.style.background="red";
          }
          return false;
      }
  }
</script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<script src="js/application.js"></script>

<?php 

include("layout.php"); //this includes layout.php which contains the navbar and footer

?>

<h1>ADD CLIENT</h1>
<div id="form_Addclient">
<form class="form-horizontal" action="submitClient.php" method="post">
  <div class="form-group">
    <label class="control-label col-sm-4" for="class">Classification </label>
    <div class="col-sm-7">
      <select class="form-control form-control-inline" id="class" name="class">
      <option>Micro</option>
      <option>SME</option>
    </select>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-4" for="rep">Name of Representative </label>
    <div class="col-sm-3">
          <input type="text" class="form-control form-control-inline2" id="lastr" name="lastr" placeholder="Enter last name" required>
    </div>
    <div class="col-sm-3">
          <input type="text" class="form-control form-control-inline2" id="firstr" name="firstr" placeholder="Enter first name" required>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-4" for="co">Name of Co-maker </label>
    <div class="col-sm-3">
      <input type="text" class="form-control form-control-inline2" id="lastc" name="lastc" placeholder="Enter last name" required>
    </div>
    <div class="col-sm-3">
      <input type="text" class="form-control form-control-inline2" id="firstc" name="firstc" placeholder="Enter first name" required>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-4" for="company">Company Name </label>
    <div class="col-sm-6">
      <input type="text" class="form-control" id="company" name="company" placeholder="Enter company name" required>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-4" for="tel">Contact Number </label>
    <div class="col-sm-6">
      <input type="text" class="form-control" id="tel" name="tel" placeholder="Enter telephone number" required>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-4" for="email">Email </label>
    <div class="col-sm-6">
      <input type="email" class="form-control" id="email" name="email" placeholder="Enter email" required>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-4" for="oadd">Office Address </label>
    <div class="col-sm-6"> 
      <textarea class="form-control" rows="3" id="oadd" name="oadd" placeholder="Enter address" required></textarea>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-4" for="status">Status </label>
    <div class="col-sm-6">
      <select class="form-control form-control-inline" id="status" name="status">
      <option>Active</option>
      <option>Risk</option>
      <option>Runaway</option>
      </select>
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
      <input type="submit" value="Add Client" class="btn btn-default" id="add_button" name="add_button"/>
      <button type="cancel" class="btn btn-default" id="cancel" onClick="window.location=\'http://localhost:8080/addclient.php\';">Cancel </button>
    </div>
  </div>
</form>
</div>
<div class="modal fade bs-example-modal-md" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" id="accepted">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <h2>Client successfully added!</h2>
        <h3 id="company">Hi!</h3>
        <h3 id="class"></h3>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">CLICK ANYWHERE</button>
        </div>
      </div>
    </div>
  </div>
