<?php
$servername = "localhost";
$username = "root";
$password = "01633830654";
$dbname = "dinhngocdo";
    
$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die ("Connection failed: " . $coon->connect_error);
}
?>