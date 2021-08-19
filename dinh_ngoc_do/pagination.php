<?php
//Lấy ra toàn bộ data trong bảng do_test1 
$userData = "SELECT * FROM do_test1";
$result = $conn->query($userData);

//Đếm số dòng data lấy được
$resultCount = $result->num_rows;

//Chia số trang 
$pageNumber = ceil($resultCount / 5);

//Lấy trang hiện tại
if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 1;
}

$eachPage = 5;
$nextPage = ($page -1) * $eachPage;
?>