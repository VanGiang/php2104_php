<?php 
include 'connect.php';

//Delete User

if (isset($_GET['deleteuser'])) {
    $id = $_GET['deleteuser'];
    $sql = "DELETE FROM do_test1 WHERE id = '$id'";
    $result = $conn->query($sql);
    
    if ($result) {
        echo "<script> alert('Delete Successfuly'); </script>";
        header('Location: View_DB.php');
    } else {
        echo "<script> alert('Delete Failed'); </script>";
    }
}

//Delete All User

if (isset($_GET['deletealluser'])) {
    $sql = "SELECT * FROM do_test1";
    $result = $conn->query($sql);

    if ($result) {
        echo "<script> alert('Delete All User Successfuly'); </script>";
        /* header('Location: View_DB.php'); */
        /* die('ok'); */
    } else {
        echo "<script> alert('Delete All User Failed'); </script>";
    }
}

//Sreach User

?>