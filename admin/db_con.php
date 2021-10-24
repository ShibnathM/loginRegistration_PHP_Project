<?php
$serverName = "localhost";
$username = "root";
$password = "";
$dbName="collegedata";

$conn = new mysqli ($serverName, $username, $password, $dbName);

if ($conn -> connect_errno) {
  echo "Failed to connect to MySQL: " . $conn -> connect_error;
  exit();
}
?>