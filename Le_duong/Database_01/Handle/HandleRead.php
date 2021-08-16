<?php 
include '../connect.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") 
{
	// Handle Delete By Id
	if (isset($_POST['id']) ? $_POST['id'] : "")
	{
		$id = $_POST['id'];
		$query ="DELETE FROM accounts WHERE id='$id'";
		$account=$conn->query($query);
		// Kiểm tra xem xóa theo id thành cồng hay không
		// Nếu thanh công quay lại trang view 
		// Nếu sai hiện popup báo lỗi
		if ($account)
		{
			header('Location:../View/viewAccount.php');
		} else {
			echo "<script> alert('Delete failed') ;</script>";
		}
	}

	// Handle delete all db
	if (isset($_POST["deleteall"]) ? $_POST['deleteall'] : "")
	{
		$query = "TRUNCATE accounts";
		$removeAll = $conn->query($query);
		// Kiểm tra việc xóa tất cả thành công hay không
		if ($removeAll)
		{
			header('Location:../View/viewAccount.php');
		} else {
			echo "<script> alert('Delete database failed') ;</script>";
		}
	} 	
}

?>
