<?php
  include ('database.php');
  session_start();
  if(isset($_POST['add_button'])){
    $id1=$_GET['value'];
    $company=$_POST['company'];
    $oadd=$_POST['oadd'];
    $tel=$_POST['tel'];
    $email=$_POST['email'];
    $status=$_POST['status'];
    $notes=$_POST['notes'];

    $sql1="UPDATE clients SET `notes` = '$notes', `company_name` = '$company', `address` = '$oadd', `email` = '$email', `status` = '$status', `notes` = '$notes' WHERE `client_id` = '$id1'";
    $result1 = $conn->query($sql1);
    if(!$result1){
        echo $conn->error;
    }
    else{
      echo('<meta http-equiv="refresh" content="0;URL=view_Single.php?url_id='.$id1.'"/>');
    }   
  }
  else{
    echo $conn->error;
  }
?>