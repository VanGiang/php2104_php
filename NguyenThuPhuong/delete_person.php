<?php

require_once 'connect.php';
    $id = $_GET['id'];
  
    $sql = "DELETE FROM persons WHERE id = $id";
    $qr = mysqli_query($conn,$sql);
    if ($qr)
    {
        header("location: index.php");
    } else 
    {
        echo "Delete failed!" . "<a href='index.php'>Back to index</a>";
    }  

    mysqli_close($conn);
    
?>
