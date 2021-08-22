<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm dữ liệu vào mysql</title>
    <link href="style.css" rel="stylesheet">
</head>
<body>
    <form action="#" method="POST">
        <label>Name </label><input type="text" name="name" id="inp1" value="<?php if(isset($_POST['name'])) { echo $_POST['name'];} ?>">
        <label>Email </label><input type="email" name="email" id="inp2" value="<?php if(isset($_POST['email'])) { echo $_POST['email'];} ?>">
        <label>Phone </label><input type="number" name="phone" id="inp3" value="<?php if(isset($_POST['phone'])) { echo $_POST['phone'];} ?>">
        <label>Address </label><input type="text" name="address" id="inp4" value="<?php if(isset($_POST['address'])) { echo $_POST['address'];} ?>">
        <button id="btn">Add</button>
    </form>
  
           </table>
    <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "test";

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);
        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        } 
        if(isset($_POST['name'])&&isset($_POST['email'])&&isset($_POST['phone'])&&isset($_POST['address']))
        {
            $addName = $_POST['name'];
            $addPhone = $_POST['phone'];
            $addEmail = $_POST['email'];
            $addAddress = $_POST['address'];

            $sql="INSERT INTO user(name,email,phone,address) VALUES ('$addName','$addEmail','$addPhone','$addAddress');";
            if ($conn->query($sql) === TRUE) {
                echo '<label>Thêm dữ liệu thành công</label>';
        }else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

            $sql2 = "SELECT * FROM user";
            $result = $conn->query($sql2);
            
            if ($result->num_rows > 0) {
            // output data of each row
            echo '<table style="margin:auto;"><tr><td>id</td><td>Name</td><td>Email</td><td>Phone</td><td>Address</td></tr>';
            while($row = $result->fetch_assoc()) 
                {
                echo "<tr><td>" . $row["id"]. "</td><td>" . $row["name"]. "</td><td> " . $row["email"]. "</td>
                        <td> " . $row["phone"]. "</td><td> " . $row["address"]. "</td></tr>";
                }
                echo"</table>";
            } 
            else {
                echo "0 results";
            }
        }
        $conn->close();
        ?>
</body>
</html>