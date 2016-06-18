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

  function isLoanNegative(){
  var x = document.getElementById("loan").value;

  if(x < 0){
    document.getElementById('lNega').style.display = "block";
    document.getElementById('add_button').disabled= true;
  }
  else{
    document.getElementById('lNega').style.display = "none";
    document.getElementById('add_button').disabled= false;
  }
 }
</script>
<?php 


include("layout.php"); //this includes layout.php which contains the navbar and footer
include_once("database.php");
$sql = 'SELECT client_id, representative_last_name, representative_first_name  
FROM clients WHERE client_id like "'.$_GET['value'].'"';
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
      <input type="number" class="form-control" id="loan" name="loan" placeholder="Micro: 3-20K, SME: 30K+" oninput="isLoanNegative();" required>
      <span id="lNega" style="display: none; color:#e35152;">You must enter a valid loan amount</span>
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
      <input type="submit" class="btn btn-default" value="Add Case" id="add_button" name="add_button"/>
      <a href="addcase.php" class="btn btn-default" id="cancel">Cancel</a>
    </div>
  </div>
</form>
</div>
');
    }
  }
?>
>>>>>>> 3c316af6587758ea3f7a9df4e20caed0e04b0dff
