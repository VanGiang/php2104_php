<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Change Money</title>
</head>
<body>
    
    <?php
		class ChangeMoney 
        {
            public $money;
            
            function __construct ($money)
            {
                $this->money = $money;
            }
        }

        class Vnd extends ChangeMoney
        {
            function convertToEur()
            {
                return  $this->money * 0.0000367032;
            }

            function convertToUsd()
            {
                return  $this->money * 0.0000434755;
            }
        }

        class Usd extends ChangeMoney
        {
            function convertToVnd()
            {
                return $this->money / 0.0000434755;
            }

            function convertToEur()
            {
                return $this->money * 0.85;
            }
        }

        class Eur extends ChangeMoney
        {
            function convertToUsd()
            {
                return $this->money / 0.85;
            }

            function convertToVnd()
            {
                return $this->money / 0.000037;
            }
        }

        $defaultCode = '';
        $convertNumber = '';

        if(isset($_POST['import'])) {
            $money = $_POST['import'];
			$money = floatval($money);

            if($_POST['from'] == 'VN' && $_POST['to'] == 'VN') {
                $convertNumber = number_format($money).' VNĐ';
            }

            if($_POST['from'] == 'VN' && $_POST['to'] == 'USD') {
				$money = new Vnd($money);
				$money = $money->convertToUsd();
                $convertNumber = number_format((float)$money, 2, '.', '').' USD';
            }

            if($_POST['from'] == 'VN' && $_POST['to'] == 'EUR') {
				$money = new Vnd($money);
				$money = $money->convertToEur();
                $convertNumber = number_format((float)$money, 2, '.', '').' EUR';
            }

            if($_POST['from'] == 'USD' && $_POST['to'] == 'VN') {
				$money = new Usd($money);
				$money = $money->convertToVnd();
                $convertNumber = number_format($money).' VNĐ';
            }

            if($_POST['from'] == 'USD' && $_POST['to'] == 'EUR') {
				$money = new Usd($money);
				$money = $money->convertToEur();
                $convertNumber = number_format((float)$money, 2, ',', '').' EUR';
            }

            if($_POST['from'] == 'USD' && $_POST['to'] == 'USD') {
                $money = $money;
                $convertNumber = number_format((float)$money, 2, '.', '').' USD';
            }

            if($_POST['from'] == 'EUR' && $_POST['to'] == 'EUR') {
                $money = $money;
                $convertNumber = number_format((float)$money, 2, '.', '').' EUR';
            }
            
            if($_POST['from'] == 'EUR' && $_POST['to'] == 'USD') {
				$money = new Eur($money);
				$money = $money->convertToUsd();
                $convertNumber = number_format((float)$money, 2, '.', '').' USD';
            }

            if($_POST['from'] == 'EUR' && $_POST['to'] == 'VN') {
				$money = new Eur($money);
				$money = $money->convertToVnd();
                $convertNumber = number_format($money).' VNĐ';
            }
        }
    ?>

    <form action="" method="POST">
        <div class="container">
            <div class="row">
                <div class="col-6">
                    <label for="exampleFormControlTextarea1"  class="form-label">Import:</label>
                    <div class="col-3">
                        <select class="form-select" name="from" aria-label="Default select example">
                            <option <?php if(isset($_POST['from'])) {echo ($_POST['from'] == 'VN') ? 'selected' : '' ;}?> selected value="VN">Viet Nam</option>
                            <option <?php if(isset($_POST['from'])) {echo ($_POST['from'] == 'USD') ? 'selected' : '' ;}?> value="USD">US Dollar</option>
                            <option <?php if(isset($_POST['from'])) {echo ($_POST['from'] == 'EUR') ? 'selected' : '' ;}?> value="EUR">Euro</option>
                        </select>    
                    </div>
                    <textarea name="import" class="form-control" id="exampleFormControlTextarea1" rows="6"><?php echo isset($_POST['import']) ? $_POST['import'] : $defaultCode; ?></textarea>
                    <button type="submit" class="btn btn-primary">convert </button>
                </div>
                <div class="col-6">
                    <label for="exampleFormControlTextarea2"  class="form-label">Export:</label>
                    <div class="col-3">
                        <select class="form-select" name="to" aria-label="Default select example">
                            <option <?php if(isset($_POST['to'])) {echo ($_POST['to'] == 'EUR') ? 'selected' : '' ;}?> selected value="EUR">Euro</option>
                            <option <?php if(isset($_POST['to'])) {echo ($_POST['to'] == 'VN') ? 'selected' : '' ;}?> value="VN">Viet Nam</option>
                            <option <?php if(isset($_POST['to'])) {echo ($_POST['to'] == 'USD') ? 'selected' : '' ;}?> value="USD">US Dollar</option>
                        </select>    
                    </div>
                    <textarea name="export" class="form-control" id="exampleFormControlTextarea1" rows="6"><?php echo $convertNumber?></textarea>
                </div>
            </div>
        </div>
    </form>
    
</body>
</html>
