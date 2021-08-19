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
            <a href="Action_ViewDB.php?deletealluser=1" class="btn btn-danger">Delete All</a>
            <form action="View_DB.php" method="POST">
                <input type="text" placeholder="Search..." name="search" require>
                <input type="submit" name="btnsearch" class="btn btn-primary" value="Search">
            </form>
            <form action="View_DB.php" method="POST">
                <select name="sort" id="">
                    <option value="asc">Sort By ID ASC</option>
                    <option value="desc">Sort By ID DESC</option>
                </select>
                <input type="submit" name="btnsort" class="btn btn-primary" value="Sort">
            </form>
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
                include 'connect.php';
                //Search User

                if (isset($_POST['search']) && isset($_POST['btnsearch'])) {
                    include 'pagination.php';

                    $search_str = $_POST['search'];
                    $sql = "SELECT * FROM do_test1 WHERE first_name LIKE '%$search_str%' OR last_name LIKE '%$search_str%' LIMIT $eachPage OFFSET $nextPage";
                    $result = $conn->query($sql);

                    if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {?>
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
                //In ra toàn bộ user

                } else if (isset($_POST['sort']) && isset($_POST['btnsort'])) {
                    $sort = $_POST['sort'];

                    if ($sort == 'asc') {
                        include 'pagination.php';

                        $sql = "SELECT * FROM do_test1 ORDER BY id ASC LIMIT $eachPage OFFSET $nextPage";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {?>
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

                    } else if ($sort == 'desc') {
                        include 'pagination.php';

                        $sql = "SELECT * FROM do_test1 ORDER BY id DESC LIMIT $eachPage OFFSET $nextPage";
                        $result = $conn->query($sql);

                        if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {?>
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
                    }

                } else {
                    include 'pagination.php';

                    $sql = "SELECT * FROM do_test1 LIMIT $eachPage OFFSET $nextPage";
                    $result = $conn->query($sql);
    
                    if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {?>
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

                }?>
            </tbody>
        </table>
        <nav aria-label="Page navigation example">
            <ul class="pagination">
                <?php 
                for ($i = 1; $i <= $pageNumber; $i++) {?>
                    <li class="page-item"><a class="page-link" href="?page=<?php echo $i ?>"><?php echo $i ?></a></li>
                <?php }
                ?>
            </ul>
        </nav>
    </div>
    <h1 style="text-align: center;">Database</h1>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
</body>
</html>