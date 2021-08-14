<?php 
include '../connect.php';

// Handle Delete By Id
if (isset($_GET["id"]))
{
	$id=$_GET["id"];
	$query ="DELETE FROM accounts WHERE id='$id'";
	$account=$conn->query($query);

	// Kiểm tra xem id có tồn tại hay không
	if ($account)
	{
		header('Location:../View/viewAccount.php');
	}
	else 
	{
		echo "<script> alert('Delete failed') ;</script>";
	}
}

// Handle delete all db
if (isset($_GET["deleteall"]))
{
	$query = "TRUNCATE accounts";
	$removeAll = $conn ->query($query);
	if ($removeAll)
	{
		header('Location:../View/viewAccount.php');
	}
	else 
	{
		echo "<script> alert('Delete database failed') ;</script>";
	}
}


?>
