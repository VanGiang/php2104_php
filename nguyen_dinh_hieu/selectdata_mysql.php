<?php
include_once('connect.php');

if(isset($_POST['btn_search'])) {
    $search = $_POST['search'];
    $sql = "select * from sinh_vien where sinh_vien.ho_ten like '%$search%';";
} else {
    $sql = "SELECT * FROM sinh_vien";
}

$product = mysqli_query($conn,$sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <title>Data SQL</title>
    <style>
        .search {
            margin-left: 116px;
            display: flex;
        }

        button.btnUpdate {
            background: antiquewhite;
            margin-left: 785px;
        }

        input[type="text"] {
            margin-left: 13px;
        }

        table {
        font-family: arial, sans-serif;
        border-collapse: collapse;
        width: 83%;
        margin: auto;
        }

        td, th {
        border: 1px solid #dddddd;
        text-align: center;
        padding: 8px;
        }

        tr:nth-child(even) {
        background-color: #dddddd;
        }
    </style>
</head>
<body>
    <center><h3>Danh Sác Thông Tin Nhân Viên</h3></center>
    <div class="search">
        <form method="post">
            <button name="btn_search" type="submit">Tìm Kiếm</button>
            <input type="text" name="search">
        </form>
        <button class="btnUpdate" name="update"> <a href="update.php"> Update </a></button>
    </div>
    <table>
        <tr>
            <th>ID</th>
            <th>Tên</th>
            <th>Giới Tính</th>
            <th>Điểm</th>
            <th>Chức năng</th>
        </tr>
        <?php foreach ($product as $key => $value){ ?>
        <tr>
            <td><?php echo $key + 1; ?></td>
            <td><?php echo $value['ho_ten']; ?></td>
            <td><?php echo $value['gioi_tinh']; ?></td>
            <td><?php echo $value['diem']; ?></td>
            <td>
                <button class="btn btn-info"><a href="edit.php?id=<?php echo $value['id']; ?>">Edit</a></button> 
                <button class="btn btn-danger"><a href="delete.php?id=<?php echo $value['id']; ?>">Delete</a></button>
            </td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>
