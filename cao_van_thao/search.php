<?php
    include_once 'connection.php';
    if(isset($_POST['search']) && isset($_POST['btnsearch'])) {
        $search = $_POST['search'];
        $sql = "select * from $table where id = '$search' or name like '%$search%'";

        if ($conn->query($sql)) {
            echo "<script> alert('them thanh cong');</script>";
            header('Location:http://localhost:8000/home.php');
            die('ok');
        } else {
            echo "xoa khong thanh cong: " . $conn->error;
        }
    }
?>