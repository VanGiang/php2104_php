<!DOCTYPE html>
<html lang="en">
<head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
        <title>Document</title>
</head>
<body>
    
        <form action="" method="POST">
                <h1>ADD PEOPLE</h1>
                <div class= "mb-3">
                        <label class="form-label">Họ Tên</label>
                        <input class="form-control"  type="text" name="name">
                </div>

                <div class= "mb-3">
                        <label class="form-label">Username</label>
                        <input class="form-control" type="text" name="username">
                </div>

                <div class= "mb-3">
                        <label class="form-label">Password</label>
                        <input class="form-control" type="text" name="password">
                </div>

                <div class= "mb-3">
                       <label class="form-label">Email</label>
                       <input class="form-control" type="text" name="email">
                </div>

                <div class= "mb-3">
                       <label class="form-label">Số Điện Thoại</label>
                       <input class="form-control" type="text" name="phone">
                </div>
                
                <input class="btn btn-primary" type="submit" name="submit">
                <input type="text" class="search" name="search">
                <button value="search">Search</button>
        </form>
</body>
</html>

<?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "user";
        $connect = new mysqli($servername, $username, $password, $dbname);

        if ($connect->connect_error) {
            die("Không kết nối :" . $conn->connect_error);
            exit();
        }

        $name = "";
        $username = "";
        $password = "";
        $email = "";
        $phone = "";
        $search= "";

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $name = isset($_POST["name"]) ? $_POST['name'] : '';}
                $username = isset($_POST["username"]) ? $_POST['username'] : '';
                $password = isset($_POST["password"]) ? $_POST['password'] : '';
                $email = isset($_POST["email"]) ? $_POST['email'] : '';
                $phone = isset($_POST["phone"]) ? $_POST['phone'] : '';
                $search = isset($_POST["search"]) ? $_POST['search'] : '';

                $sql = "INSERT INTO account (name, username, password, email, phone)
                VALUES ('$name', '$username', '$password', '$email', '$phone')";
                $sql1 = "SELECT id, name, username, password, email, phone FROM account";
                $sql2 ="SELECT * FROM account WHERE name  LIKE '%".$search."%'";
                $result2 = $connect->query($sql2);  
                echo "<table><tr><th>ID</th><th>Name</th><th>Username</th><th>Password</th><th>Email</th>
                <th>Phone Number</th></tr>";
                while ($row = $result2->fetch_assoc()) {  
                        echo "<tr><td>" . $row["id"]. "</td><td>" . $row["name"]. "</td><td> " . $row["username"]. "</td>
                        <td> " . $row["password"]. "</td><td> " . $row["email"]. "</td>
                        <td> " . $row["phone"]. "</td></tr>";
    
                }   
                if ($connect->query($sql) === TRUE) {
                        echo "Thêm dữ liệu thành công";
                }

        } else {
                echo "0 results";
        }
        $connect->close();
?>
<style type="text/css">
        table {
                font-family: arial, sans-serif;
                border-collapse: collapse;
                width: 100%;
                height: 100px;
        }

        td, th {
                border: 1px solid green;
                text-align: left;
                padding: 8px;
                text-align: center;
        }

        tr:nth-child(even) {
                background-color: #dddddd;
        }
        h1{
                color: red;
                text-align: center;
        }
        form{
                padding :0px 20px 0px 20px;
        }
        input.search {
                margin-left: 1000px;
                margin-top: 30px;
        }
        input.btn.btn-primary {
                margin-bottom: 60px;
        }
</style>
<button class="btn btn-info"><a href="sort_table.php?id=<?php  ?>">Sort DESC</a></button>