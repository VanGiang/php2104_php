<?php 
$servername = 'localhost';
$username = 'leduong';
$password = 'Leduong.4dec';
$dbname = 'php2104';

// Connect db

$conn = new mysqli($servername ,$username ,$password ,$dbname);

// Check connect

if ($conn->connect_error)
{
     die('Error connecting' . $conn->$connect_error);
}

?>