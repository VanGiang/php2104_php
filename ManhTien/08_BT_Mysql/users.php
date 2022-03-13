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
        <label>Name <input type="text" name="name" id="inp1" value="<?php if(isset($_POST['name'])) { echo $_POST['name'];} ?>"></label>
        <label>Email <input type="email" name="email" id="inp2" value="<?php if(isset($_POST['email'])) { echo $_POST['email'];} ?>"></label>
        <label>Phone <input type="text" name="phone" id="inp3" value="<?php if(isset($_POST['phone'])) { echo $_POST['phone'];} ?>"></label>
        <label>Address <input type="text" name="address" id="inp4" value="<?php if(isset($_POST['address'])) { echo $_POST['address'];} ?>"></label>
        <label><button id="btn">Add</button></label>
    </form>
  
           </table>
    <?php
        require 'connect.php';
        if(isset($_POST['name'])&&isset($_POST['email'])&&isset($_POST['phone'])&&isset($_POST['address']))
        {
            $addName = $_POST['name'];
            $addPhone = $_POST['phone'];
            $addEmail = $_POST['email'];
            $addAddress = $_POST['address'];

            $sql="INSERT INTO user(name,email,phone,address) VALUES ('$addName','$addEmail','$addPhone','$addAddress');";
            if ($conn->query($sql) === TRUE) {
                echo '<h3>Thêm dữ liệu thành công</h3><a href="view_user.php"><button>Hiển Thị</button></a>';
        }else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }

        }
        $conn->close();
        ?>
        <form action="view_user.php"><button>Back</button></form>
</body>
</html>