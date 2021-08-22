<?php
	 //Connect server 
	$servername = 'localhost';
	$username = 'leduong';
	$password = 'Leduong.4dec';
	$dbname = 'php2104';
	$conn = new mysqli($servername, $username, $password,$dbname);

	// Check connection
	if ($conn->connect_error) 
	{
	  die("Connection failed: " . $conn->connect_error);
	}


	// Post data
	$first_name = '';
	$last_name = '';
	$address = '';
	$email = '';
	$phone = '';
	if($_SERVER["REQUEST_METHOD"] == "POST")
	{
		$first_name = isset($_POST["first_name"]) ? $_POST["first_name"] : " ";
		$last_name = isset($_POST["last_name"]) ? $_POST["last_name"] : " ";
		$address = isset($_POST["address"]) ? $_POST["address"] : " ";
		$email = isset($_POST["email"]) ? $_POST["email"] : " ";
		$phone = isset($_POST["phone"]) ? $_POST["phone"] : " ";
	}


	// Insert data
	if($first_name == "" || $last_name == "" || $address == "" || $email == "" || $phone == "")
	{
		echo '<script type="text/JavaScript"> 
		alert("Vui lòng nhập dữ liệu");
		</script>';

	}
	else
	{
		$data = "INSERT INTO users (first_name,last_name,address,email,phone) 
		VALUES ('$first_name', '$last_name', '$address', '$email', '$phone')";
	}

	if ($conn->query($data) === true) 
	{
	  echo '<script type="text/JavaScript"> 
	  alert("Thêm dữ liệu thành công");
	  </script>';
	} 
	else 
	{
	  echo "Error: " . $data. "<br>" . $conn->error;
	}

	
	$conn->close();
?>
