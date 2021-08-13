<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lession4_ConvertAmout</title>
</head>
<body>
    <h1>Convert Amout</h1>
    <form action="Lession4_ConvertAmout.php" method="POST">
        <div>
            <label for="">Input Amout</label>
            <input type="text" name="amout">
        </div>
        <select name="form" id="">
            <option value="">Amout Form</option>
            <option value="VND">VND</option>
            <option value="USD">USD</option>
        </select>
        <select name="to" id="">
            <option value="">Convert To</option>
            <option value="VND">VND</option>
            <option value="USD">USD</option>
        </select>
        <div>
            <input type="submit" name="convert">
        </div>
    </form>
    <?php 
        class Amout {
            public $amout;
            
            public function __construct($amout) {
                $this->amout = $amout;
            }

            public function getAmout() {
                return $this->amout;
            }

        }

        class Convert extends Amout {

            public function __construct($amout) {
                parent:: __construct($amout);
            }

            public function vndToUSD() {
                
                return $this->getAmout() / 23000;
            }

            public function usdToVND() {
                return $this->getAmout() * 23000;
            }
            
        }

        if (isset($_POST['convert'])) {
            $amout = $_POST['amout'];
            $form = $_POST['form'];
            $to = $_POST['to'];
            $convert = new Convert($amout);

            if ($form == 'VND' && $to == 'USD') {
                echo 'Amout value is: $' . round($convert->vndToUSD(), 2) . ' USD';
            }

            if ($form == 'USD' && $to == 'VND') {
                echo 'Amout value is: ' . $convert->usdToVND() . ' VND';
            }
        }
    ?>
</body>
</html>