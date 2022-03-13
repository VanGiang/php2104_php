<title>Hiển Thị Dữ Liệu</title>
<style>
    .wapper {
        width: 300px;
        height: 50px;
    }
    form {
        float: left;
        margin: 10px;
    }

    button {
        width: 70px;
    }
</style>
<div class="wapper">
    <form action="search.php">
        <button>Search</button>
    </form>
    <form action="users.php">
        <button>Add</button>
    </form>
    <form action="sort.php">
        <button>Sort</button>
    </form>
</div>
<table border="1">
    <tr>
        <td>ID</td>
        <td>Name</td>
        <td>Email</td>
        <td>Phone</td>
        <td>Address</td>
        <td colspan="2">Option</td>
    </tr>

    <?php
        require 'connect.php';//truy vấn mysql
        $sql="select * from `user`";
        $query=mysqli_query($conn,$sql); //select bảng users

        while($row=mysqli_fetch_array($query)){ //lấy dữ liệu cho vào bảng
    ?>

    <tr>
        <td><?php echo $row['id']; ?></td>
        <td><?php echo $row['name']; ?></td>
        <td><?php echo $row['email']; ?></td>
        <td><?php echo $row['phone']; ?></td>
        <td><?php echo $row['address']; ?></td>
        <td><a href="edit_user.php?id=<?php echo $row['id']; ?>">Edit</a></td>
        <td><a href="delete_user.php?id=<?php echo $row['id']; ?>">Delete</a></td>
    </tr>

    <?php } ?>
    
</table>
