<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Management Accounts</title>
	 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" 
     integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>

<?php 
	include '../connect.php';
	// Load data from db limit
	if (isset($_GET['page']))
	{
		$page = (int)$_GET['page'];
	}
	else
	{
		$page = 1;
	}
	
	$per_begin = 5;
	$per_start = ($page - 1) * $per_begin;
	$query = "SELECT * FROM accounts LIMIT $per_start,$per_begin";
	$result = $conn->query($query);

	// Handle sort 
	if (isset($_GET["sort"]))
	{
		
		$type = $_GET["sort"];
		$ASC = "ASC";
		$DESC = "DESC";
		

		if ($type == $ASC)
		{
			$queryAsc = "SELECT * FROM accounts ORDER BY id ASC";
			// $queryAsc = "SELECT * FROM accounts ORDER BY id ASC LIMIT $per_start,$per_begin";
			$querySortAsc = $conn -> query($queryAsc);
			
			if ($querySortAsc) 
			{
				$result = $conn->query($queryAsc);
				// header('Location:../View/viewAccount.php');
			}
			else 
			{
				echo "Thất bại";
			}
			
		}

		if ($type == $DESC)
		{

			$queryDesc = "SELECT * FROM accounts ORDER BY id DESC";
			// $queryDesc = "SELECT * FROM accounts ORDER BY id DESC LIMIT $per_start,$per_begin";
			$querySortDesc = $conn -> query($queryDesc);

			if ($querySortDesc) 
			{
				$result = $conn->query($queryDesc);
				// header('Location:../View/viewAccount.php');
			}
			else 
			{
				echo "Thất bại";
			}
		}
	}
	// Handle search 
	// $search = '';
	// if ($_SERVER["REQUEST_METHOD"] == "GET")
	// {
	// 	$search = isset($_GET['search']) ? $_GET['search'] : "";
	// 	$querySearch = "SELECT * FROM accounts  WHERE last_name LIKE '$search%' or '%$search' ";
	// 	$result = $conn ->query($querySearch);
	// }

?>
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<h4 class="d-flex justify-content-center mt-4">Management Account</h4>
				<form class="form-inline" action="" method="GET">
				  <div class="form-group mx-sm-3 mb-2">
				    <input type="text" class="form-control" name="search" placeholder="Search...">
				  </div>
				  <button type="submit" class="btn btn-primary mb-2">Search</button>
				</form>
				<table class="table table-hover mt-4">
					<button class="btn btn-danger">
						<a style="text-decoration:none;color:white" href="../Handle/HandleRead.php?deleteall=<?php echo "deleteAll";?>">DELETE ALL</a>
					</button>
				  <thead>
				    <tr>
				      <th scope="col">
							<div class="btn-group" role="group">
								<button id="btnGroupDrop1" 
								type="button" 
								class="btn btn-secondary dropdown-toggle" 
								data-toggle="dropdown"
								>Id
								</button>
								<div class="dropdown-menu">
									<a class="dropdown-item" href="?sort=<?php echo "ASC" ;?>">ASC</a>
									<a class="dropdown-item" href="?sort=<?php echo "DESC" ;?>">DESC</a>
								</div>
							</div>
						</th>
				      <th scope="col">Last Name</th>
				      <th scope="col">First Name</th>
				      <th scope="col">Email</th>
				      <th scope="col">Address</th>
				      <th scope="col">Phone</th>
				      <th scope="col">Gender</th>
				      <th scope="col">User Name</th>
				      <th scope="col">Action</th>
				    </tr>
				  </thead>
				  <tbody>
				  	<?php foreach ($result as $key => $value) {?>	
					  <tr>
					  	<td><?php echo $value["id"] ;?></td>
					    <td><?php echo $value["last_name"] ?></td>
					    <td><?php echo $value["first_name"] ?></td>
					    <td><?php echo $value["email"] ?></td>
					    <td><?php echo $value["address"] ?></td>
					    <td><?php echo $value["phone"] ?></td>
					    <td><?php echo $value["gender"] ?></td>
					    <td><?php echo $value["username"] ?></td>
					    <td>
					    	<div class="btn btn-warning">
					    		<a style="text-decoration:none;color:black" href="../Handle/HandleRead.php?id=<?php echo $value["id"];?>">Delete</a>
					    	</div>
					    </td>
					  </tr>
					  <?php } ?>
				  </tbody>
				</table>
				<?php 
				$data = "SELECT * FROM accounts";
				$result = $conn ->query($data);
				// Lấy các số dòng từ db
				$count_rows = $result -> num_rows;
				// Tính số trang tương ứng
				$per_page = ceil($count_rows/5);
				?>
				<nav aria-label="Page navigation example">
				  <ul class="pagination justify-content-end">
						<?php for ($i=1;$i<=$per_page;$i++){?>
							<li class="page-item"><a class="page-link" href="?page=<?php echo $i ?>"><?php echo $i; ?></a></li>
							<?php }?>
				  </ul>
				</nav>
			</div>
		</div>
	</div>

<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" 
integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" 
integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" 
integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>