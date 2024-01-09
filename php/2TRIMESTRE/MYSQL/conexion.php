<?php
$servername = "loading.thsite.top";
$username = "thsi_35754745";
$password = "nBogJY9x";
$dbname = "thsi_35754745_proyecto";

try {
  $conn = new PDO("mysql:host=$servername; $dbname", $username, $password);
  // set the PDO error mode to exception
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
  echo "Connected successfully";
} catch(PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}
?> 