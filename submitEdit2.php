<!-- EDIT CASE -->
<?php
  include ('database.php');
  session_start();
  echo('sasa');
  if(isset($_POST['add_button'])){
    
      $id1 = $_GET['value'];
      $notes=$_POST['notes'];

      $sql1="UPDATE cases SET notes = '$notes' WHERE case_id = '$id1';";
      $result1 = $conn->query($sql1);

      if(!$result1){
          echo $conn->error;
      }
      else{
        echo('sasa');
        // echo('<meta http-equiv="refresh" content="0;URL=view_single.php?url_id='.$id1.'"/>');
      }   
    }

  else{
    echo $conn->error;
}
?>