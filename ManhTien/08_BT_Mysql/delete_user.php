<?php
    include_once('connect.php');

    if(isset($_REQUEST['id']) and $_REQUEST['id']!="") {
        $id=$_GET['id'];
        $sql = "DELETE FROM user WHERE id='$id'";
        if ($conn->query($sql) === TRUE) {
            echo "Xóa thành công<br>";
        } else {
            echo "Error updating record: " . $conn->error;
        }
    $conn->close();
    }

    echo'<a href="view_user.php"><button>Back</button></a>';
?>