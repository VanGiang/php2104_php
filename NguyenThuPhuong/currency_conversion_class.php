<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Currency Conversion</title>
    <style>
        body{
            margin:100px 0;
        }
        form{
            width: 600px;
            height: 160px;
            margin: 10px 620px;
            background-color: #CCCCCC; 
            border: 1px solid black;
            border-radius: 10px; 
        }
        .input{
            padding: 10px 50px;
            width: 200px;
            float: left;
        }
        .result{
            padding: 10px 50px;
            width: 200px;
            float: right;
        }
        
    </style>
</head>
<body>
    <h1 style=" text-align:center;">Currency Conversion</h1>
    <form action="currency_conversion_class.php" method="POST">
        <div class="input">
            <label for=""><b>Amount:</b></label>
            <div><input type="text" name="amount" value="<?php echo isset($_POST['amount']) ? $_POST['amount'] : $amount; ?>"></div>
            <label for=""><b>From:</b></label>
            <div><input type="text" name="from" value="<?php echo isset($_POST['from']) ? $_POST['from'] : $from; ?>"></div>
            <label for=""><b>To:</b></label>
            <div><input type="text" name="to" value="<?php echo isset($_POST['to']) ? $_POST['to'] : $to; ?>"></div>
            <input type="submit" value="Convert">
        </div>
    

<?php
class Convert
{
    public $amount;
    public function __construct($amount) {
        $this->amount = $amount;
    }  
}

class Vnd extends Convert
{
    public function vndCusd() {     
        return $this->amount/22945;
    }
    public function vndCjpy() {
        return $this->amount/209.19;
    }
}

class Usd extends Convert
{
    public function usdCvnd() {
        return $this->amount*22945;
    }
    public function usdCjpy() {
        return $this->amount*109.68;
    }
}
class Jpy extends Convert{
    public function jpyCvnd() {
        return $this->amount*209.19;
    }
    public function jpyCusd() {
        return $this->amount/109.68;
    }
}

$amount = $_POST['amount'];
$from = $_POST['from'];
$to = $_POST['to'];
$str = $from."C".$to;
$fromstr =  strtolower($from);
$fromType = ucfirst($fromstr);

$obj = new $fromType($amount);
$result = $obj->$str();

echo "<div class='result'"; 
    if (isset($_POST['amount']) && isset($_POST['from']) && isset($_POST['to'])) {
        if ($from == "VND") {
            echo "<p><b>Amount: </b> " . number_format($amount,1,",",",") . " " . $from . "</p>";
                 
        } else {
            echo "<p><b>Amount: </b> " . number_format($amount,1,".","."). " " . $from . "</p>";   
        }

        if ($from == "VND" && $to == "JPY") {
            echo "<p><<b>Convert: </b></p>"
                 . "<p>209 $from = 1 $to</p>";               
        } elseif ($from == "VND" && $to == "USD") {
            echo "<p><b>Convert: </b></p>"
                 . "<p>22,945 $from = 1 $to</p>";
        }
        if ($from == "JPY" && $to == "VND") {
            echo "<p><b>Convert: </b></p>"
                 . "<p>1 $from = 209 $to</p>";               
        } elseif ($from == "JPY" && $to == "USD"){
            echo "<p><b>Convert: </b></p>"
                 . "<p>109.68 $from = 1 $to</p>";
        }
        if ($from == "USD" && $to == "VND") {
            echo "<p><b>Convert: </b></p>"
                 . "<p>1 $from = 22,945 $to</p>";               
        } elseif ($from == "USD" && $to == "JPY") {
            echo "<p><b>Convert: </b></p>"
                 . "<p>1 $from = 109.68 $to</p>";
        }

        if ($to == "VND") {
            echo "<p><b>Result: </b> " .number_format($result,1,",",",") . " " .  $to . "</p>";
        } else { 
            echo "<p><b>Result: </b> " . number_format($result,2,".",".") . " " .  $to . "</p>";
        }
    }
    echo "</div>";
    echo "</form>";
?>

</form>
</body>
</html> 