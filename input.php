<script type="text/javascript">
function class_type(val){
 var element=document.getElementById('class');
 if(val=='check')
   element.style.display='block';
 else  
   element.style.display='none';
}

function isPricipalNegative(){
  var x = document.getElementById("principal").value;

  if(x < 0){
    document.getElementById('prNega').style.display = "block";
    document.getElementById('add_button').disabled= true;
  }
  else{
    document.getElementById('prNega').style.display = "none";
  }
 }

 function isInterestNegative(){
  var x = document.getElementById("interest").value;

  if(x < 0){
    document.getElementById('iNega').style.display = "block";
    document.getElementById('add_button').disabled= true;
  }
  else{
    document.getElementById('iNega').style.display = "none";
  }
 }

 function isPenaltyNegative(){
  var x = document.getElementById("rate").value;

  if(x < 0){
    document.getElementById('pNega').style.display = "block";
    document.getElementById('add_button').disabled= true;
  }
  else{
    document.getElementById('pNega').style.display = "none";
  }
 }

 function enableInput(){
  var x = document.getElementById("principal").value;
  var y = document.getElementById("interest").value;
  var z = document.getElementById("rate").value;

  if(x >= 0 && y >= 0 && z >= 0){
    document.getElementById('add_button').disabled= false;
  }
  else{
    document.getElementById('add_button').disabled= true;
  }
 }
</script> 

<?php 

date_default_timezone_set("Asia/Manila");

include("layout.php"); //this includes layout.php which contains the navbar and footer
include_once("database.php");
$clid = $_GET['client'];
$cid = $_GET['case'];
$sql = 'SELECT clients.client_id, clients.representative_last_name, clients.representative_first_name, cases.case_id, DATE_FORMAT(expected.expected_due_date, "%M %d, %Y") AS expected, expected.remaining_interest_due, expected.remaining_principal_due, expected.status FROM cases, clients, expected WHERE clients.client_id = "'.$clid.'" AND cases.case_id = "'.$cid.'" AND expected.case_id = "'.$cid.'" AND clients.client_id=cases.client_id AND expected.case_id=cases.case_id AND expected.status="Unpaid" LIMIT 1';
?>

<h1 id="h1_input">INPUT PAYMENT</h1>
<h2 id="h2_input">
<?php
$weeks=0;
$penalty=25;
$today = date("Y-m-d");
$todayWord = date("M d, Y");
$sql2='SELECT expected_due_date, status, case_id FROM expected WHERE case_id='.$cid.'';
$result2 = $conn->query($sql2);
 if (mysqli_num_rows($result2) > 0) {
    while($row = mysqli_fetch_assoc($result2)) {
      $expected_due_date = $row['expected_due_date'];
      $paid = $row['status'];
      if(($paid == "Unpaid") AND ($today > $expected_due_date)){//checks if record is unpaid and only accepts if turnamount is more than 0
        $weeks++;
      }             
    }
  }
//$days_between = ceil(abs($end - $start) / 86400);
$result = mysqli_query($conn, $sql);
  if (mysqli_num_rows($result) > 0) 
  {
    while($row = mysqli_fetch_assoc($result)) 
    {
      echo $row['representative_last_name'].", ".$row['representative_first_name'];
      echo('
      </h2>
      <div id="div_input">
      <div class="table-responsive" id="input_table">
      <table class="table table-hover">
        <thead>
          <tr id="input_thead">
            <th colspan="2">Expected Payment as of '.$todayWord.'<br>Due on '.$row['expected'].'</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td colspan="2" id="input_title">Principal</td>
          </tr>
          <tr>
            <td>Principal (Per Week)</td>
            <td id="money">'.number_format($row['remaining_principal_due'],2).'</td>
          </tr>
          <tr>
            <td>Weeks Late</td>
            <td id="money">'.$weeks.'</td>
          </tr>
          <tr>
            <td>Total Principal</td>
            <td class="total" id="money">'.number_format(($row['remaining_principal_due']*($weeks+1)),2).'</td>
          </tr>
          <tr>
            <td colspan="2" id="input_title">Interest</td>
          </tr>
          <tr>
            <td>Interest (Per Week)</td>
            <td id="money">'.number_format($row['remaining_interest_due'],2).'</td>
          </tr>
          <tr>
            <td>Weeks Late</td>
            <td id="money">'.$weeks.'</td>
          </tr>
          <tr>
            <td>Total Interest</td>
            <td class="total" id="money">'.number_format($row['remaining_interest_due']*($weeks+1),2).'</td>
          </tr>
          <tr>
            <td colspan="2" id="input_title">Penalty</td>
          </tr>
          <tr>
            <td>Penalty (Per Day)</td>
            <td id="money">'.number_format($penalty,2).'</td>
          </tr>
          <tr>
            <td>Days Late</td>
            <td id="money">'.($weeks*7).'</td>
          </tr>
          <tr>
            <td>Total Penalty</td>
            <td class="total" id="money">'.number_format(($penalty*$weeks*7),2).'</td>
          </tr>
          <tr class="total" id="input_title">
            <td>Total</td>
            <td id="money">'.number_format(($row['remaining_principal_due']*($weeks+1)) + ($row['remaining_interest_due']*($weeks+1)) + ($penalty*$weeks*7),2).'</td>
          </tr>
        </tbody>
      </table>
    </div>
    </div>

  <form class="form-horizontal" action="submitInput.php?client='.$clid.'&case='.$cid.'" method="post" role="form" id="form_input">
    <div class="form-group">
      <label class="control-label col-sm-offset-2 col-sm-4" for="turn">Turn Date </label>
      <div class="col-sm-6">
      <div class="input-group date" data-provide="datepicker-inline" id="picker_case">
        <input type="text" name="turndate" class="form-control">
        <div class="input-group-addon">
            <span class="glyphicon glyphicon-th"></span>
        </div>
       </div> 
      </div>
    </div>  
');
?>
    <div class="form-group">
      <label class="control-label col-sm-offset-2 col-sm-4" for="class">Payment Type</label>
      <div class="col-sm-6" id="input_class"> 
        <select class="form-control form-control-inline" id="class" name="class">
        <option value="cash">Cash</option>
        <option value="check">Check</option>
        <option value="col">Collateral</option>
      </select>
      </div>
    </div>

    <div class="form-group" style='display:block;'>
      <label class="control-label col-sm-offset-2 col-sm-4" for="check">Check Number </label>
      <div class="col-sm-6">
        <input type="text" class="form-control" id="check" name="check" placeholder="Check Number">
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-offset-2 col-sm-4" for="principal">Principal Paid </label>
      <div class="col-sm-6">
        <input type="number" class="form-control" id="principal" name="principal" placeholder="Principal Paid" oninput='isPricipalNegative();enableInput();' required>
        <span id="prNega" style="display: none; color:#e35152;">You must enter a valid principal amount</span>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-offset-2 col-sm-4" for="interest">Interest Paid </label>
      <div class="col-sm-6">
        <input type="number" class="form-control" id="interest" name="interest" placeholder="Interest Paid" oninput='isInterestNegative();enableInput();' required>
        <span id="iNega" style="display: none; color:#e35152;">You must enter a valid interest amount</span>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-offset-2 col-sm-4" for="rate">Penalty Paid </label>
      <div class="col-sm-6">
        <input type="number" class="form-control" id="rate" name="penalty" placeholder="Penalty Paid" oninput='isPenaltyNegative();enableInput();' required>
        <span id="pNega" style="display: none; color:#e35152;">You must enter a valid penalty amount</span>
      </div>
    </div>
    <?php
    echo ('
    <div class="form-group"> 
      <div class="col-sm-offset-6 col-sm-6">
        <input type="submit" value="Input" class="btn btn-default" id="add_button" name="add_button"/>
        <a href="view_single.php?client='.$clid.'&case='.$cid.'" class="btn btn-default" id="cancel">Cancel </a>
      </div>
    </div>
  </form>
  </div>
  ');
    }
  }
?>
  <script type="text/javascript">
    $("select[name=class]").change(function() {
    if (this.value == "check")
        $("input[name=check]").prop("disabled", false);
    else
        $("input[name=check]").prop("disabled", true);
    }).change();
  </script>
