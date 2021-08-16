<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Person</title>
    <style>
        form {
            margin: 20px 530px;
        }
        table {
            margin: 0 30px;
            width: 600px;
        }
        h1 {
             margin: 50px 770px 0;
        }
        p {
            margin: 20px 840px 0;
        }
        th {
            background-color: #9999;
        }
        #action {
            margin: 20px 585px;
        }
        button {
            margin: 0 5px;
        }
        
    </style>
</head>
<body>

    <h1>Data Persons</h1>
    <form id="action" method="POST">
        <input type="text" name="search">
        <button type="submit" name="btn_search" value="<?php echo $search; ?>">Search</button>
        <button type="submit" name="btn_sortA">Sort Age ASC</button>
        <button type="submit" name="btn_sortD">Sort Age DESC</button>
        <button type="submit" name="back">Back</button>
    </form>
<?php


require_once 'connect.php'; //Include file connect.php
   
    if (isset($_POST['btn_search'])) {
        $search = $_POST['search'];
        $sql = "SELECT * FROM persons WHERE last_name LIKE '%$search%';";
    } else if (isset($_POST['btn_sortD'])) {
        $sql = "SELECT * FROM persons ORDER BY age DESC;";
    } else if (isset($_POST['btn_sortA'])) {
        $sql = "SELECT * FROM persons ORDER BY age ASC;";
    } else if (isset($_POST['back'])) {
        $sql = "SELECT * FROM persons;";
    } else {
        $sql = "SELECT * FROM persons;";
    }


    if ($result = mysqli_query($conn, $sql)) {
      if (mysqli_num_rows($result) > 0) {
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
          while ($row = mysqli_fetch_array($result)) { 
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