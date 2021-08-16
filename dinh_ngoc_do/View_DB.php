<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link href="style_ViewDB.css">
    <title>View_DB</title>
</head>
<body>
    <h1 style="text-align: center;">List User</h1>
    <div class="container">
        <div class="wrapper">
            <a href="Action_ViewDB.php" name="deletealluser" class="btn btn-danger">Delete All</a>
            <form action="Action_ViewDB.php" method="POST">
                <input type="text" placeholder="Search..." name="search" require>
                <input type="submit" name="btnsearch" class="btn btn-primary" value="Search">
            </form>
            <form action="Action_ViewDB.php"></form>
        </div>
        <table class="table">
            <thead>
                <tr>
                <th scope="col">ID</th>
                <th scope="col">First_Name</th>
                <th scope="col">Last_Name</th>
                <th scope="col">Sex</th>
                <th scope="col">Age</th>
                <th scope="col">Email</th>
                <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                include '../MySQL/connect.php';
                $sql = "SELECT * FROM do_test1";
                $result = $conn->query($sql);
    
                if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {?>
                    <tr>
                        <td><?php echo $row["id"]; ?></td>
                        <td><?php echo $row["first_name"]; ?></td>
                        <td><?php echo $row["last_name"]; ?></td>
                        <td><?php echo $row["sex"]; ?></td>
                        <td><?php echo $row["age"]; ?></td>
                        <td><?php echo $row["email"]; ?></td>
                        <td>
                            <a href="View_DB.php".php?edituser=<?php echo $row["id"]; ?>"
                                class="btn btn-info">Edit</a>
                            <a href="Action_ViewDB.php?deleteuser=<?php echo $row["id"]; ?>"
                                class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                <?php }
                } 
                $conn->close();
                ?>
            </tbody>
        </table>
    </div>
    <h1 style="text-align: center;">Database</h1>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
</body>
</html>