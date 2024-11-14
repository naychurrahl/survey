<?php 
  require_once("./includes/php/functions.php");

  session_start();
  $url = "http://localhost/survey/admin";

  if (!isset($_SESSION['status'])){ //make cookie ndex line 28
    header("location: ./");
  } else {
    header ("refresh: 5; url={$url}");
  }
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./includes/css/index.css">
    <style>

      html {
        display: flexbox;
        justify-content: center;
        align-items: center;
      }

    </style>
  </head>
  <body>
    <div class="bg"></div>
    <div class="container">
      <h3> Les casa des Naychur </h3>
      <h1> THANK YOU! GRACIAS! </h1>
      <h1>O SHEY! NAGODE SOSAI! </h1>
      <h1>ODIN MMA! ARIGATO O! </h1>
      <a href="<?php echo $url;?>"> CLick to add me on whatsapp if you are not automatically redirected after 5 seconds</a>
    </div> 
  </body>
</html>