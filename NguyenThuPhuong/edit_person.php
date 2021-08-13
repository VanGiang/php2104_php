<?php

require_once 'connect.php';

    $id=$_GET['id'];
    if(isset($_GET['id'])) 
    {   
        $sql = "SELECT * FROM persons WHERE id =$id";
        $qr = mysqli_query($conn,$sql);
        $row = mysqli_fetch_array($qr);
    }

    if (isset($_POST['edit'])) 
    {
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
    <h1>Edit Persons</h1>
    <form method="POST">
        <label for="">Last name:</label><br>
        <input type="text" name="lastN" value="<?php echo $row['last_name'] ?>"><br>
        <label for="">First name:</label><br>
        <input type="text" name="firstN" value="<?php echo $row['first_name'] ?>"><br>
        <label for="">Age:</label><br>
        <input type="number" name="age" value="<?php echo $row['age'] ?>"><br>
        <label for="">Email:</label><br>
        <input type="text" name="email" value="<?php echo $row['email'] ?>"><br>
        <input type="submit" name="edit" value="Edit">
       
    </form>
</body>
</html>