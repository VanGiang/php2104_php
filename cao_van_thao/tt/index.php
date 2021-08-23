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
            <table class="table">
                    <thead>
                        <tr>
                        <th scope="col">id</th>
                        <th scope="col">name</th>
                        <th scope="col">email</th>
                        <th scope="col">phone</th>
                        <th scope="col">address</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        include_once 'connection.php';
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
                                    <a href=""></a>
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
                
</body>
</html>
