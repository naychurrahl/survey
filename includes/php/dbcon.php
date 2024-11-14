<?php

  $hostname = "localhost";
  $username = "root";
  $password = "";
  $database = "sand";

  $pdo = "mysql:host={$hostname};dbname={$database};charset=UTF8";

  try {
    $con = new PDO($pdo, $username, $password);
  } catch (PDOException $e) {
    die("ERROR! -> {$e->getMessage()}");
  }

?>