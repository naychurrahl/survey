<?php

  require_once("./includes/php/functions.php");

  session_start();
  if(isset($_POST['submit'])){
    $_SESSION['user'] = substr(hash("SHA256", zlib_encode(hash("SHA256", base64_encode($_SERVER['HTTP_USER_AGENT'].$_SERVER['REMOTE_ADDR'].$_SERVER['SERVER_ADDR'])), ZLIB_ENCODING_RAW)), 10, 20);
    
    $insert_user = database_insert_unique($con, "users", ["user" => $_SESSION['user']]);
    $_SESSION['code'] = $insert_user['code'];
    switch ($insert_user['code']) {
      case "200":
      case "402":
        $user = $insert_user['message'];
        $data =[
          ["user" => $user, "question" => 1, "answer" => $_POST['question_1']],
          ["user" => $user, "question" => 2, "answer" => $_POST['question_2']],
          ["user" => $user, "question" => 3, "answer" => $_POST['question_3']],
          ["user" => $user, "question" => 4, "answer" => $_POST['question_4']],
          ["user" => $user, "question" => 5, "answer" => $_POST['question_5']],
          ["user" => $user, "question" => 6, "answer" => $_POST['question_6']],
          ["user" => $user, "question" => 7, "answer" => $_POST['question_7']]
        ];

        $ins = database_insert($con, "answers", $data);
        switch ($ins['code']) {
          case '200':
            $_SESSION['status'] = 400; // make cookie thankyou line 5
            header("location: ./thankyou.php");
            break;            
          default:
            die("Please refresh");
            break;
        }
        break;
      
      default:
        die("Just refresh first let's see");
        break;
    }
  } else {
    header("location: ./");
  }


 /* naychur => itsfunnyforreal */
  

?>