<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Create User</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-lg-6">
				<form action="" method="post">
					<div class="card" style="width: 18rem;">
                     <div class="card-header">Action</div>
					  <ul class="list-group list-group-flush">
					    <li class="list-group-item">
					    	<button type="submit" name="delete" class="btn btn-danger">Delete</button>
					    </li>
					   	<li class="list-group-item">
					    	<button type="submit" name="sortDesc" class="btn btn-success">Sort (DESC)</button>
					    </li>
					    <li class="list-group-item">
					    	<button type="submit" name="sortAsc" class="btn btn-primary">Sort (ASC)</button>
					    </li>
					  </ul>
					</div>
				</form>
			</div>
		</div>
		<div class='row'>
			<div class="col-lg-12">
				<table class="table table-hover mt-4">
				  <thead class="thead-dark">
				    <tr>
				      <th scope="col">ID</th>
				      <th scope="col">First_Name</th>
				      <th scope="col">Last_Name</th>
				      <th scope="col">Address</th>
				      <th scope="col">Email</th>
				      <th scope="col">Phone</th>
				    </tr>
				  </thead>
				  <tbody>
					<?php include 'viewDB.php';?>    
				  </tbody>
				</table>
			</div>
		</div>
	</div>
	

</body>
</html>