<?php
  $servername = "localhost";
  $username = "phuon";
  $password = "Phuon.598";
  $dbname = "php2104";

  // Create connection
  $conn = mysqli_connect($servername, $username, $password, $dbname);
  // Check connection
  if ($conn->connect_error) 
  {
    die("Connection failed: " . $conn->connect_error);
  } 
?>