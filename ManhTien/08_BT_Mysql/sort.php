<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tìm Kiếm</title>
    <style>
        table , td{
            border: 1px solid #333;
        }
    </style>
</head>
<body>
    <table >
        <tr>
            <td>ID</td>
            <td>Name</td>
            <td>Email</td>
            <td>Phone</td>
            <td>Address</td>
            <td colspan="2">Option</td>
        </tr>
<?php
    include_once('connect.php');
    if(isset($_POST['sort'])) {
        $sort = $_POST['sort'];
        if($sort=='ASC') 
        {
            $sql = "select * from user ORDER BY id ASC;";
        } 
        else 
            if($sort=='DESC') {
                $sql = "select * from user ORDER BY id DESC;";
            }
            else {
                $sql = "select * from user";
            }
    }
    else {
        $sql = "select * from user"; }
    $product = mysqli_query($conn,$sql);
    foreach ($product as $key => $value){ ?>
        <tr>
            <td><?php echo $value['id'] ?></td>
            <td><?php echo $value['name']; ?></td>
            <td><?php echo $value['email']; ?></td>
            <td><?php echo $value['phone']; ?></td>
            <td><?php echo $value['address']; ?></td>
            <td><a href="edit_user.php?id=<?php echo $value['id']; ?>">Edit</a></td>
            <td><a href="delete_user.php?id=<?php echo $value['id']; ?>">Delete</a></td>
        </tr>
        <?php }?>
    </table>
    <form method="post" >
        <select name="sort">
            <option value="option">Tùy chọn sắp xếp</option>
            <option value="DESC" <?php if(isset($_POST['sort'])){ if($sort=='DESC'){ echo 'selected';}} ?>>DESC</option>
            <option value="ASC" <?php if(isset($_POST['sort'])){ if($sort=='ASC'){ echo 'selected';}} ?>>ASC</option>
        </select>
            
            <label><button name="btn_search" type="submit">Tìm Kiếm</button></label>
    </form>
    <form action="view_user.php"><button>Back</button></form>
</body>
</html>