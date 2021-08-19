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

if (isset($_POST['search']) && isset($_POST['btnsearch'])) {
    $search_str = $_POST['search'];
    $sql = "SELECT * FROM do_test1 WHERE first_name LIKE '%$search_str%' OR last_name LIKE '%$search_str%'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
    
    while ($row = $result->fetch_assoc()) {?>
        <tr>
            <td><?php echo $row["id"]; ?></td>
            <td><?php echo $row["first_name"]; ?></td>
            <td><?php echo $row["last_name"]; ?></td>
            <td><?php echo $row["sex"]; ?></td>
            <td><?php echo $row["age"]; ?></td>
            <td><?php echo $row["email"]; ?></td>
        </tr>
    <?php }
    }
}
?>