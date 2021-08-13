<?php

require_once 'connect.php';

    if (isset($_GET['id']))
    {
        $id = $_GET['id'];

        $sqlS = "SELECT * FROM persons WHERE id = $id";

        $result = mysqli_query($conn, $sqlS);
        $rows = mysqli_fetch_array($result); 

        $lastR = $rows['last_name'];
        $firstR = $rows['first_name'];
        $ageR = $rows['age'];
        $emailR = $rows['email'];
             
    }


    if (isset($_POST['edit'])) 
    {
        $id=$_GET['id'];
        $lastN = $_POST['lastN'];
        $firstN = $_POST['firstN'];
        $age = $_POST['age'];
        $email = $_POST['email'];
    
        $sql = "UPDATE persons 
                 SET last_name = '$lastN', first_name = '$firstN', age = $age, email = '$email'
                 WHERE id = $id";
        $qr = mysqli_query($conn,$sql);
    
        if ($qr)
        {
            header("location: index.php");
        } else 
        {
            echo "Edit failed!" . "<a href='index.php'>Back to index</a>";
        }
    }
    //Close connecttion
    mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Persons</title>
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
    <h1>Edit Persons</h1>
    <form method='POST'>
        <label>Last name:</label><br>
        <input type='text' name='lastN' value='<?php echo $lastR; ?>'><br>
        <label>First name:</label><br>
        <input type='text' name='firstN' value='<?php echo $firstR; ?>'><br>
        <label>Age:</label><br>
        <input type='text' name='age' value='<?php echo $ageR; ?>'><br>
        <label>Email:</label><br>
        <input type='text' name='email' value='<?php echo $emailR; ?>'><br>
        <input type='submit' name='edit' value='Edit'>
    </form> 
        
</body>
</html>