<?php

  require_once("../includes/php/functions.php");
  
  session_start();
  if (isset($_POST['submit'])){
    $log = login($con, $_POST['name'].$_POST['password']);
    if ($log){
      $_SESSION['auth'] = "ok";
      header("location: ../admin/");
    } else {
      header("location: ../login/");
    }
  } else{
    header("location: ../login/");
  }

?>