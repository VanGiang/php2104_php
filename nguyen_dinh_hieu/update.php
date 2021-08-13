<?php
include_once("connect.php");

if(isset($_POST['update'])) {
    $name=$_POST['name'];
    $sex=$_POST['sex'];
    $point=$_POST['point'];

    $sql = "insert into sinh_vien (ho_ten, gioi_tinh, diem) values ('$name', '$sex', $point);";
    $query = mysqli_query($conn,$sql);
    if($query) {
        header('Location: selectdata_mysql.php');
    } else {
        echo "Không thành công!";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <title>Update data</title>
    <style>
        form.form {
            width: 30%;
            margin: auto;
        }
    </style>
</head>
<body>
    <center><h2>Thêm Thông Tin Sinh Viên</h2></center>
    <div class="container">
        <div class="row">
            <form method="POST" class="form">
                <div class="col align-self-center">
                    <label class="form-label">Tên:</label>
                    <input name="name" type="text" class="form-control">
                    <label class="form-label">Giới Tính:</label>
                    <input name="sex" type="text" class="form-control">
                    <label class="form-label">Điểm:</label>
                    <input name="point" type="text" class="form-control">
                </div>
                <div class="col text-center">
                    <button name="update" type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>   
</body>
</html>
