<script type = "text/javascript">
  function isEmpty() {//checks if all fields are complete
      if (document.getElementById("loan").value == "" || document.getElementById("dor").value == "" ||document.getElementById("weeks").value == "" ||
          document.getElementById("rate").value == "" || document.getElementById("status").value == ""){
          alert("Please fill out all fields.");
          if(document.getElementById("loan").value == ""){
            lastr.style.background="red";
          }
          return false;
      }
  }
</script>
<?php 

include("layout.php"); //this includes layout.php which contains the navbar and footer
include_once("database.php");
$sql = 'SELECT client_id, representative_last_name, representative_first_name  FROM clients WHERE client_id like "'.$_GET['value'].'"';
?>

<h1>ADD CASE</h1>
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
  <div class="form-group">
    <label class="control-label col-sm-4" for="loan">Loan Amount </label>
    <div class="col-sm-4">
      <input type="number" class="form-control" id="loan" name="loan" placeholder="Micro: 3-20K, SME: 30K+" required>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-4" for="release">Date of Release </label>
    <div class="col-sm-4">
    <div class="input-group date" data-provide="datepicker-inline" id="picker_case">
      <input type="text" class="form-control" id="dor" name="dor" required>
      <div class="input-group-addon">
          <span class="glyphicon glyphicon-th"></span>
      </div>
     </div> 
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-4" for="weeks">Payment Period </label>
    <div class="col-sm-3">
      <input type="number" class="form-control" id="weeks" name="weeks" placeholder="Weeks" required>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-4" for="rate">Weekly Interest Rate (%) </label>
    <div class="col-sm-3">
      <select class="form-control form-control-inline" id="rate" name="rate">
      <option>1.75</option>
      <option>3</option>
      <option>4</option>
    </select>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-4" for="status">Status </label>
    <div class="col-sm-7">
      <select class="form-control form-control-inline" id="status" name="status">
      <option>Active</option>
      <option>Closed</option>
    </select>
    </div>
  </div>
  <div class="form-group">
    <label class="control-label col-sm-4" for="notes">Notes </label>
    <div class="col-sm-5">
      <textarea class="form-control" rows="3" id="notes" name="notes" placeholder="Enter notes"></textarea>
    </div>
  </div>

  <div class="form-group"> 
    <div class="col-sm-offset-4 col-sm-6">
      <button type="submit" class="btn btn-default" id="add_button" name="add_button">Add Case</button>
      <button type="submit" class="btn btn-default" id="cancel" onClick="window.location=\'http://localhost:8080/addclient.php\';">Cancel </button>
    </div>
  </div>
</form>
</div>
');
    }
  }
?>
