<?php
    include_once 'connection.php';
//delete user
    if(isset($_GET['delete_user'])) {
        $id = $_GET['delete_user'];
        $sql = "delete from nhan_vien where id = '$id'";

        if ($conn->query($sql) === TRUE) {
            echo "<script> alert('xoa thanh cong');</script>";
            header('Location:http://localhost:8000/home.php');

        } else {
            echo "xoa khong thanh cong: " . $conn->error;
        }
    }
//delete all
    if(isset($_GET['delete_all'])) {
        $sql = "TRUNCATE nhan_vien";

        if ($conn->query($sql) === TRUE) {
            echo "<script> alert('xoa thanh cong');</script>";
            header('Location:http://localhost:8000/home.php');
            die('ok');
        } else {
            echo "xoa khong thanh cong: " . $conn->error;
        }
    }
?>
