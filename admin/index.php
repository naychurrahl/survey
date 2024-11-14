<?php

  require_once("../includes/php/functions.php");
  session_start();
  if ($_SESSION['auth'] !== 'ok'){
    header("location: ../login/");
  }

  function yesNo($q, $n){
    echo ("
      Question {$n}: <br>
      Yes: ".percentage($q['yes'], $q['total'])."<br>
      No: ".percentage($q['no'], $q['total'])."<br><br>"
    );
  }

  function prose($q, $n){
    echo "Question {$n}:<br>";
    foreach ($q as $key => $value) {
      $key++;
      echo "{$key}) {$value}<br>";
    }
    echo "<br>";
  }

  $data = database_fetch_table($con, "answers");
  $q3 = $q4 = $q6 = ["yes" => 0, "no" => 0, "total" => 0];
  foreach ($data['message'] as $value) {
    if(!$value['answer']){
      continue;
    }
    switch ($value['question']) {
      case 1:
        $q1[] = $value['answer'];
        break;
      case 2:
        $q2[] = $value['answer'];
        break;
      case 3:
        $q3['total']++;
        switch (strtolower($value['answer'])){
          case "yes":
            $q3['yes']++;
            break;
          case "no";
            $q3['no']++;
            break;
        }
        break;      
      case 4:
        $q4['total']++;
        switch (strtolower($value['answer'])){
          case "yes":
            $q4['yes']++;
            break;
          case "no";
            $q4['no']++;
            break;
        }
        break;
      case 5:
        $q5[] = $value['answer'];
        break;
      case 6:
        $q6['total']++;
        switch (strtolower($value['answer'])){
          case "yes":
            $q6['yes']++;
            break;
          case "no";
            $q6['no']++;
            break;
        }
        break;
      case 7:
        $q7[] = $value['answer'];
        break;
      
      default:
        # code...
        break;
    }
  }


  prose($q1, 1);
  prose($q2, 2);
  yesNo($q3, 3);
  yesNo($q4, 4);
  prose($q5, 5);
  yesNo($q6, 6);
  prose($q7, 7);

?>