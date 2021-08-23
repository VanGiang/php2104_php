<?php
  $servername = "localhost";
  $username = "root";
  $password = "Caovanthao1.";
  $dbname = "users";
  $table = "nhan_vien";
  
  // Create connection
  $conn = new mysqli($servername, $username, $password, $dbname);
  // Check connection
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    }   
?>