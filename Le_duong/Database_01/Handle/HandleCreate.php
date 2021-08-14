<?php 
include '../connect.php';

// Variable empty string default
$last_name = '' ;
$first_name = '' ;
$user_name = '' ;
$email = '' ;
$address = '' ;
$phone = '' ;
$gender = '' ;

// Check input user submit
if ($_SERVER["REQUEST_METHOD"] == "POST")
{

	$last_name = isset($_POST['last_name']) ? $_POST['last_name'] : "";
	$first_name = isset($_POST['first_name']) ? $_POST['first_name'] : "";
	$email = isset($_POST['email']) ? $_POST['email'] : "";
	$address = isset($_POST['address']) ? $_POST['address'] : "";
	$phone = isset($_POST['phone']) ? $_POST['phone'] : "";
	$gender = isset($_POST['gender']) ? $_POST['gender'] : "";
	$user_name = isset($_POST['user_name']) ? $_POST['user_name'] : "";

}	


// Check data input before post data  
// Kiểm tra dữ liệu đầu vào trước khi đẩy lên db
if ($last_name == "" || $first_name == "" || $email == "" || $address == "" || $phone == "" || $gender == "" || $user_name == "")
{
     echo "Dữ liệu không được để chống";
     
} else {
	$sql = "INSERT INTO accounts (last_name , first_name , email , address , phone , gender , username) 
	VALUES ('$last_name' , '$first_name' , '$email' , '$address' , '$phone' , '$gender' , '$user_name')";
	// header('Location:../View/viewAccount.php');
}

// Check data post success / failed
// Kiểm tra dữ liệu post lên db thành công hay thất bại
if ($conn->query($sql)) 
{
	echo "<script> alert('New record created successfully')</script>";
} else {
	echo "Error:";
}
 
?>