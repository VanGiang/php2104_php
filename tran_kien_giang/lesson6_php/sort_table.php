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
    <button name="ars" value="load">Load</button>
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
                die("Không kết nối :" . $connect->connect_error);
                exit();
        }
        $name = "";
        $username = "";
        $password = "";
        $email = "";
        $phone = "";
        $search= "";
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
                if(isset($_POST["name"])) { $name = $_POST['name']; }
                if(isset($_POST["username"])) { $username = $_POST['username']; }
                if(isset($_POST["password"])) { $password = $_POST['password']; }
                if(isset($_POST["email"])) { $email = $_POST['email']; }
                if(isset($_POST["phone"])) { $phone = $_POST['phone']; }
                if(isset($_POST["search"])) { $search = $_POST['search']; }

                //Code xử lý, insert dữ liệu vào table
                $sql1 = "SELECT id, name, username, password, email, phone FROM account ORDER BY id DESC";
                $result1 = $connect->query($sql1);  
                echo "<table><tr><th>ID</th><th>Name</th><th>Username</th><th>Password</th><th>Email</th>
                <th>Phone Number</th></tr>";
                while($row = $result1->fetch_assoc()) {  
                        echo "<tr><td>" . $row["id"]. "</td><td>" . $row["name"]. "</td><td> " . $row["username"]. "</td>
                        <td> " . $row["password"]. "</td><td> " . $row["email"]. "</td>
                        <td> " . $row["phone"]. "</td></tr>";
            
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
<button class="btn btn-info"><a href="Form_taikhoan.php?id=<?php  ?>">Back</a></button> 