<?php 
include '../MySQL/connect.php';

//Delete User

if (isset($_GET['deleteuser'])) {
    $id = $_GET['deleteuser'];
    $sql = "DELETE FROM do_test1 WHERE id = '$id'";
    $result = $conn->query($sql);
    
    if ($result) {
        echo "<script> alert('Delete Successfuly'); </script>";
        header('Location:http://localhost/Lession1/MySQL/View_DB.php');
    } else {
        echo "<script> alert('Delete Failed'); </script>";
    }
}

//Delete All User

if (isset($_GET['deletealluser'])) {
    $sql = "DELETE FROM do_test1";
    $result = $conn->query($sql);

    if ($result) {
        echo "<script> alert('Delete All User Successfuly'); </script>";
        header('Location:http://localhost/Lession1/MySQL/View_DB.php');
        /* die('ok'); */
    } else {
        echo "<script> alert('Delete All User Failed'); </script>";
    }
}

//Sreach User

if (isset($_POST['search']) && isset($_POST['btnsearch'])) {
    $search = $_POST['search'];
    $sql = "SELECT * FROM do_test1 WHERE first_name LIKE '%$search%' OR last_name LIKE '%$search%'";
    $result = $conn->query($sql);

    if ($result) {
        echo "<script> alert(Search User Successfuly'); </script>";
    } else {
        echo "<script> alert('User Not Exist'); </script>"; 
    }
}
?>