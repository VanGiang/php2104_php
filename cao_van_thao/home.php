<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
    <title>Document</title>
</head>
<body>
    <?php include_once 'connection.php';?>
    <div class="container">
        <div class="row">
            <form method="POST">
                <div class="mb-3">
                    <label for="#">name</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="name" required="">
                </div>
                <div class="mb-3">
                    <label for="#">email</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="email" required="">
                </div>
                <div class="mb-3">
                    <label for="#">phone</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="phone" required="">
                </div>
                <div class="mb-3">
                    <label for="#">address</label>
                    <input type="text" class="form-control" id="exampleInputEmail1" name="address" required="">
                </div>
                <button type="submit" class="btn btn-primary" name="submit">Submit</button>
            </form>
            <?php include_once 'view.php';?>
            <div class="mb-3">
            <form action="search.php" method="POST">
                <input type="text" placeholder="tim kiem..." name="search" require>
                <input type="submit" name="btnsearch" class="btn btn-primary" value="Search">
            </form>
            <!-- <form action="home.php"></form> -->
            </div>
            <table class="table">
                <thead>
                    <tr>
                    <th scope="col">id</th>
                    <th scope="col">name</th>
                    <th scope="col">email</th>
                    <th scope="col">phone</th>
                    <th scope="col">address</th>
                    <th>
                    <a href="delete.php?delete_all=<?php echo $row['id'];?>">delete</a>
                    </th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $sql = "SELECT * FROM $table";
                        $result = $conn->query($sql);
                        
                        if ($result->num_rows > 0) {
                        // output data of each row
                        while($row = $result->fetch_assoc()) {
                    ?>

                        <tr>
                            <td><?php echo $row["id"];?></td>
                            <td><?php echo $row["name"];?></td>
                            <td><?php echo $row["email"];?></td>
                            <td><?php echo $row["phone"];?></td>
                            <td><?php echo $row["address"];?></td>
                            <td>
                                <a href="delete.php?delete_user=<?php echo $row['id'];?>">delete</a>
                            </td>
                        </tr>

                    <?php
                        }
                        } else {
                        echo "0 results";
                        }
                        $conn->close();
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>