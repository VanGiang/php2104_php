<!DOCTYPE html>
<html>
<head>
    <title>Sửa dữ lệu</title>
    <link rel="stylesheet" href="style.css"/>
</head>
<body>
    <?php
    // Kết nối Database
    include 'connect.php';
        $id=$_GET['id'];
        $query=mysqli_query($conn,"select * from `user` where id='$id'");
        $row=mysqli_fetch_assoc($query);
    ?>
    <form method="POST">
        <label>Username: <input type="text" value="<?php echo $row['name']; ?>" name="name"></label><br/>
        <label>Email: <input type="email" value="<?php echo $row['email']; ?>" name="email"></label><br/>
        <label>Phone: <input type="text" value="<?php echo $row['phone']; ?>" name="phone"></label><br/>
        <label>Address: <input type="text" value="<?php echo $row['address']; ?>" name="address"></label><br/>
        <label><input type="submit" value="Update" name="update_user" id="update"></label>
        <?php
            if (isset($_POST['update_user'])) {
                $id=$_GET['id'];
                $name=$_POST['name'];
                $email=$_POST['email'];
                $phone=$_POST['phone'];
                $address=$_POST['address'];

                 // Create connection
                $conn = new mysqli("localhost", "root", "", "test");
                // Check connection
                if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql = "UPDATE `user` SET name='$name', email='$email', phone='$phone' ,address='$address' WHERE id='$id'";

            if ($conn->query($sql) === TRUE) {
                echo "<br><h3>Record updated successfully</h3><br>";
                
            } else {
                echo "Error updating record: " . $conn->error;
                }
            $conn->close();
            }
        ?>
    </form>
    <form action="view_user.php"><button>Back</button></form>
</body>
</html>