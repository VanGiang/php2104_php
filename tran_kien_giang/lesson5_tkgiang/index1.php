<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
</head>
<body>
	<style type="text/css">
		div {
			width: 440px;
			font-size: 22px;
			height: 60px;
		}

		input[type="number"] {
		    	font-size: 16px;
		}

		select {
		    	font-size: 18px;
		    
		}

		input[type="submit"] {
		    	font-size: 16px;
		}
		select.from {
		    	margin-left: 55px;
		    
		}
		select.to {
		    	margin-left: 36px;
		    
		}
		div.frontpagebox {
			width: 470px;
			height: 300px;
			background-color: greenyellow;
			border: 3px solid red;
			padding: 20px 20px 20px 50px;
		}

	</style>
	
	<div class="frontpagebox currencyexchange">
		<center>
			<h2 > Chuyển Đổi Tiền Tệ</h2>
		</center>
		<form action="quydoitien.php" method="POST">
			<div>
				<span class="inplabel">Số lượng:</span>
				<input value="<?php echo isset($_POST['input']) ? $_POST['input'] : $default; ?>"  
					type="number" name="input" min="0">
					
				</input>
			</div>

			<div>
				<span class="inplabel">Từ:</span>
				<select name="from" class="from">
					<option <?php if(isset($_POST['from'])){echo ($_POST['from'] == 'GBP') ? 'selected' : '' ;} ?> 
						value="GBP">Bảng Anh (GBP)</option>
					<option <?php if(isset($_POST['from'])){echo ($_POST['from'] == 'EUR') ? 'selected' : '' ;} ?> 
						value="EUR">Euro (EUR)</option>
					<option <?php if(isset($_POST['from'])){echo ($_POST['from'] == 'CNY') ? 'selected' : '' ;} ?> 
						value="CNY">Nhân dân tệ Trung Quốc (CNY)</option>
					<option <?php if(isset($_POST['from'])){echo ($_POST['from'] == 'VND') ? 'selected' : '' ;} ?> 
						value="VND">Việt Nam Đồng (VND)</option>
					<option <?php if(isset($_POST['from'])){echo ($_POST['from'] == 'USD') ? 'selected' : '' ;} ?> 
						value="USD">Đô la Mỹ (USD)</option>
				</select>
			</div>

			<div>
				<span class="inplabel">Sang:</span>
				<select name="to" class="to">
					<option <?php if(isset($_POST['to'])){echo ($_POST['to'] == 'GBP') ? 'selected' : '' ;} ?> 
						value="GBP">Bảng Anh (GBP)</option>
					<option <?php if(isset($_POST['to'])){echo ($_POST['to'] == 'EUR') ? 'selected' : '' ;} ?> 
						value="EUR">Euro (EUR)</option>
					<option <?php if(isset($_POST['to'])){echo ($_POST['to'] == 'CNY') ? 'selected' : '' ;} ?> 
						value="CNY">Nhân dân tệ Trung Quốc (CNY)</option>
					<option <?php if(isset($_POST['to'])){echo ($_POST['to'] == 'VND') ? 'selected' : '' ;} ?> 
						value="VND">Việt Nam Đồng (VND)</option>
					<option <?php if(isset($_POST['to'])){echo ($_POST['to'] == 'USD') ? 'selected' : '' ;} ?> 
						value="USD">Đô la Mỹ (USD)</option>
				</select>
			</div>

			<div>
				<span class="inplabel"></span>
				<input type="submit" value="Chuyển đổi">

			</div>
		</form>
	</div>
</body>
</html>