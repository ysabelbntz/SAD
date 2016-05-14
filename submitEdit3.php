<!-- EDIT OFFICER -->
<?php
  include ('database.php');
  session_start();
  if(isset($_POST['add_button'])){

    if ($_POST['oadd'] || $_POST['tel'] || $_POST['email'] || $_POST['notes']) {

    $id1=$_GET['value'];
    $oadd=$_POST['oadd'];
    $tel=$_POST['tel'];
    $email=$_POST['email'];
    $notes=$_POST['notes'];


    $sql1="UPDATE accounts SET notes = '$notes', address = '$oadd', contact_number = '$tel', email = '$email', notes = '$notes' WHERE account_id = '$id1'";
    $result1 = $conn->query($sql1);

    if(!$result1){
        echo $conn->error;
    }
    else{
      echo('<meta http-equiv="refresh" content="0;URL=viewallofficers.php"/>');
    }   
  }
}
  else{
    echo $conn->error;
  }
?>