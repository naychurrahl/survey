<?php 
  require_once("./includes/php/functions.php");

  session_start();
  $url = "https://wa.me/message/2CDNUX7NX5VXG1";

  if (!isset($_COOKIE['status'])){
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
  </head>
  <body>
    <div class="background_image"></div>
    <div class="card">
      <h style="font-size: 3em; margin: 10px;font-weight: 10px;"> Les casa des Naychur </h>
      <h1> THANK YOU! </h1>
      <h1> GRACIAS! </h1>
      <h1>O SHEY!</h1>
      <h1>NAGODE SOSAI! </h1>
      <h1>DAALU!</h1>
      <h1>ARIGATO O! </h1>
      <a href="<?php echo $url;?>"> CLick to add me on whatsapp if you are not automatically redirected after 5 seconds</a>
    </div> 
  </body>
</html>