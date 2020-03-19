<?php
    ini_set('display_errors', 1);
    error_reporting(E_ALL);
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "Lager";

    try {
      $db = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
      // set the PDO error mode to exception
      $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e){
      echo "Connection failed: " . $e->getMessage();
    }
?>
