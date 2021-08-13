<?php
include_once("connect.php");

if(isset($_GET['id'])) {
    $id=$_GET['id'];
    $query = mysqli_query($conn,"select * from sinh_vien where id='$id'");
    $product = mysqli_fetch_assoc($query);
}

if (isset($_POST['edit'])) {
    $id=$_GET['id'];
    $name=$_POST['name'];
    $sex=$_POST['sex'];
    $point=$_POST['point'];

    $sql = "UPDATE sinh_vien SET ho_ten='$name', gioi_tinh='$sex', diem='$point' WHERE id='$id'";
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
    <title>Edit data</title>
    <style>
        form.form {
            width: 30%;
            margin: auto;
        }
    </style>
</head>
<body>
    <center><h2>Sửa Thông Tin Sinh Viên</h2></center>
    <div class="container">
        <div class="row">
            <form method="POST" class="form">
                <div class="col align-self-center">
                    <label class="form-label">Tên:</label>
                    <input name="name" type="text" class="form-control" value="<?php echo $product['ho_ten']; ?>">
                    <label class="form-label">Giới Tính:</label>
                    <input name="sex" type="text" class="form-control" value="<?php echo $product['gioi_tinh']; ?>">
                    <label class="form-label">Điểm:</label>
                    <input name="point" type="text" class="form-control" value="<?php echo $product['diem']; ?>">
                </div>
                <div class="col text-center">
                    <button name="edit" type="submit" class="btn btn-primary">Edit</button>
                </div>
            </form>
        </div>
    </div>   
</body>
</html>
