<?php

require_once 'connect.php';

    $lastN = $_POST['lastN'];
    $firstN = $_POST['firstN'];
    $age = $_POST['age'];
    $email = $_POST['email'];
        
    $sql = "INSERT INTO persons (last_name, first_name, age, email)
            VALUES ('$lastN', '$firstN', $age, '$email')";

        if (isset($_POST['add'])) 
        {
            $qr = mysqli_query($conn,$sql);
            if ($qr)
            {
                header("location: index.php");
            } else 
            {
                echo "Add failed!" . "<a href='index.php'>Back to index</a>";
            } 
        } 

    mysqli_close($conn);
        
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Persons</title>
    <style>
        form {
            margin: 20px 800px;
        }
        h1{
            margin: 50px 800px 0 ;
        }
        a{
            margin: 10px 800px;
        }
    </style>
</head>
<body>
    <h1>Add Persons</h1>
    <form method="POST">
        <label for="">Last name:</label><br>
        <input type="text" name="lastN"><br>
        <label for="">First name:</label><br>
        <input type="text" name="firstN"><br>
        <label for="">Age:</label><br>
        <input type="number" name="age"><br>
        <label for="">Email:</label><br>
        <input type="text" name="email"><br>
        <input type="submit" name="add" value="Add">
       
    </form>
</body>
</html>