<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Tool Format </title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
</head>
<body>
	<div class="container">
		<?php 
			class Money 
				{
					public $currentMoney;
					

					function __construct ($currentMoney)
					{
						$this->currentMoney=$currentMoney;

					}
				}

			class Vnd extends Money
				{
					function convertToVnd()
					{
						return  $this->currentMoney*23.955;
					}
				}

			class Usd extends Money
				{
					function convertToUsd()
					{
						return $this->currentMoney*0.000044;
					}
				}

		?>
		<div class="row mt-4">
			<!-- $ to vnd -->
			
			<div class="col-lg-6">
				<h3>Đổi từ</h3>
				<form action="" method="POST" class="mt-4">
					<div class="input-group mb-3">
					  <div class="input-group-prepend">
					    <span class="input-group-text">USD</span>
					  </div>
				  	<input type="text" class="form-control" name="inputUsd" value=<?php echo $_POST['inputUsd'] ?>>
					</div>

					<div class="input-group mb-3">
					  <div class="input-group-prepend">
					    <span class="input-group-text">VND</span>
					  </div>
				  	<input type="text" class="form-control" name="inputVnd" value=<?php echo $_POST['inputVnd'] ?>>
					</div>

				<button class='btn btn-primary' name="convertVnd">Convert USD to VND</button>
				<button class='btn btn-success' name="convertUsd">Convert VND to USD</button>
				</form>
				<h3 class="mt-4">Đổi sang</h3>
				<div class="input-group mb-3 mt-4">
				  <div class="input-group-prepend">
				    <span class="input-group-text">VND</span>
				  </div>
				  <?php 
				  $resultVnd;
				  if(isset($_POST['convertVnd']))
				  {
				  	$moneyVnd=new Vnd($_POST['inputUsd']);
				  	$resultVnd=$moneyVnd->convertToVnd();
				  	echo '<input name="outputVnd" value='.number_format($resultVnd).'>';
				  }

				  ?>

				</div>
				<div class="input-group mb-3 mt-4">
				<div class="input-group-prepend">
				    <span class="input-group-text">USD</span>
				</div>
				<?php 
				$resultUsd;

				if(isset($_POST['convertUsd']))
				{
					$moneyUsd=new USD($_POST['inputVnd']);
					$resultUsd=$moneyUsd->convertToUsd();
					echo '<input name="outputUsd" value='.number_format($resultUsd,2,".",",").'>';
				}

				?>
			</div>
			</div>

		</div>
	</div>

</body>
</html>