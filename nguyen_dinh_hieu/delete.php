<?php
include_once("connect.php");

if(isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql_delete = "delete from sinh_vien where id = '$id'";
    $product = mysqli_query($conn,$sql_delete);

    if($product) {
        header('location: selectdata_mysql.php');
    } else {
        echo " Xóa không thành công!";
    }
}

?>
