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
				<form id="form" action="" method="post" class="mt-4">
				  <div class="form-group">
				    <label>First Name</label>
				    <input name="first_name"type="text" class="form-control" placeholder="First name" >
				  </div>
				  <div class="form-group">
				    <label >Last Name</label>
				    <input name="last_name" type="text" class="form-control" placeholder="Last name">
				  </div>
				  <div class="form-group">
				    <label >Address</label>
				    <input name="address" type="text" class="form-control" placeholder="Address">
				  </div>
				  <div class="form-group">
				    <label >Email</label>
				    <input name="email" type="text" class="form-control" placeholder="Email">
				  </div>
				  <div class="form-group">
				    <label >Phone</label>
				    <input name="phone" type="text" class="form-control" placeholder="Phone">
				  </div>
  					<button id="button_submit" type="submit" class="btn btn-primary">Create user</button>
				</form>
			</div>
		</div> 
		<?php include "connect.php" ?>
	</div>
	

</body>
</html>