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
	
	//Load data from database
	$result = $conn->query("SELECT * FROM users");
	
	if ($result->num_rows > 0)
	{
		while($row = $result->fetch_assoc()) 
		{
    echo "<tr>
      <th>".$row["id"]."</th>
      <td>".$row["first_name"]."</td>
      <td>".$row["last_name"]."</td>
      <td>".$row["address"]."</td>
      <td>".$row["email"]."</td>
      <td>".$row["phone"]."</td>
    	</tr>";
  		}
 	}
 	else 
 	{
  	echo "<h3>Empty!!!</h3>";
	}

	// Ation 

	if($_SERVER["REQUEST_METHOD"] == "POST")
	{

		if (isset($_POST["delete"]))
		{
			$deleteDB=$conn->query("TRUNCATE users");
		}

		if (isset($_POST["sortDesc"]))
		{
			$sortDesc=$conn->query("SELECT * FROM users ORDER BY id DESC");
			if ($sortDesc->num_rows > 0)
			{
				while($row = $sortDesc->fetch_assoc()) 
				{
		    echo "<tr>
		      <th>".$row["id"]."</th>
		      <td>".$row["first_name"]."</td>
		      <td>".$row["last_name"]."</td>
		      <td>".$row["address"]."</td>
		      <td>".$row["email"]."</td>
		      <td>".$row["phone"]."</td>
		    	</tr>";
		  		}
		 	}
		}
			
		if (isset($_POST["sortAsc"]))
		{
			$sortAsc=$conn->query("SELECT * FROM users ORDER BY id ASC");
			if ($sortAsc->num_rows > 0)
			{
				while($row = $sortAsc->fetch_assoc()) 
				{
		    echo "<tr>
		      <th>".$row["id"]."</th>
		      <td>".$row["first_name"]."</td>
		      <td>".$row["last_name"]."</td>
		      <td>".$row["address"]."</td>
		      <td>".$row["email"]."</td>
		      <td>".$row["phone"]."</td>
		    	</tr>";
		  		}
		 	}
		}

	}
		

?>