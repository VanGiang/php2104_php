<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Person</title>
    <style>
        form {
            margin: 20px 600px;
        }
        table{
            margin: 0 30px;
        }
        h1{
            margin: 50px 770px 0;
        }
        p{
            margin: 20px 840px 0;
        }
        th{
            background-color: #9999;
        }
    </style>
</head>
<body>

    <h1>Data Persons</h1>
<?php

require_once 'connect.php'; //Include file connect.php
    
    $sql = "SELECT * FROM persons";

    if($result = mysqli_query($conn, $sql)){
      if(mysqli_num_rows($result) > 0){
          echo "<form>";
          echo "<table border = '1'>";
              echo "<tr>";
                  echo "<th>Id</th>";
                  echo "<th>Last Name</th>";
                  echo "<th>First Name</th>";
                  echo "<th>Age</th>";
                  echo "<th>Email</th>";
                  echo "<th>Action</th>";
              echo "</tr>";
          while($row = mysqli_fetch_array($result)){ 
?>
              <tr>
                  <td><?php echo $row['id']; ?></td>
                  <td><?php echo $row['last_name']; ?></td>
                  <td><?php echo $row['first_name']; ?></td>
                  <td><?php echo $row['age']; ?></td>
                  <td><?php echo $row['email']; ?></td>
                  <td><a href="edit_person.php?id=<?php echo $row['id']; ?>">Edit</a> | <a href="delete_person.php?id=<?php echo $row['id']; ?>">Delete</a></td>
              </tr>
<?php
          }
          echo "</table>";
        }
      }
    echo "</form>";

    //Close connecttion
    mysqli_close($conn);
?>
    <p><a href='add_person.php'>Add</a></p>
</body>
</html>