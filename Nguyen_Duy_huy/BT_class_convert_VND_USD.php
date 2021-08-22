<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>BT_class_convert_VND_USD</title>
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous"> -->
</head>
<body>
    <h1>Convert Money</h1>
    <form action="BT_class_convert_VND_USD.php" method="POST"> 
        <label for="amount">Amount: </label>       
        <input type="number" id="amount" name="amount">
        <label for="from">From: </label>
        <select id="from" name="from[]">
            <option value="">Choose option</option>
            <option value="vnd">VND</option>
            <option value="usd">USD</option>
        </select>
        <label for="to">To: </label>
        <select id="to" name="to[]">
            <option value="">Choose option</option>
            <option value="vnd">VND</option>
            <option value="usd">USD</option>
        </select>
        <input type="submit" name="submit" value="Convert">
        <p>Ti gia: 1USD = 23,000VND</p>
        <hr>         
    </form>

    <?php
    class Convert {
        public $amount;
        public function __construct($amount) {
            $this->amount = $amount;
        }
    }   

    class vndTousd extends Convert { 
        public function vndTusd() {
            $final = $this->amount / 23000;
            return number_format($final, 2);
        }
    }
    
    class vndTovnd extends Convert { 
        public function vndTvnd() {
            $final = $this->amount;
            return number_format($final, 2);
        }
    }  

    class usdTovnd extends Convert { 
        public function usdTvnd() {
            $final = $this->amount * 23000;
            return number_format($final, 2);
        }
    }

    class usdTousd extends Convert { 
        public function usdTusd() {
            $final = $this->amount;
            return number_format($final, 2);
        }
    }
    
    if(isset($_POST['amount'])) {
        $amount = $_POST['amount'];
        if(isset($_POST['submit'])) {
            $sel_from = [];
            $sel_to = [];
            if(!empty($_POST['from']) && !empty($_POST['to'])) {                
              foreach($_POST['from'] as $sel_from_1) {
                $sel_from[] = $sel_from_1;
                // echo $sel_from[0];
              }
              foreach($_POST['to'] as $sel_to_1) {
                $sel_to[] = $sel_to_1; 
                // echo $sel_to[0];   
              }
              if(($sel_from[0] == 'vnd') && ($sel_to[0] == 'usd')) {
                $price = new vndTousd("$amount");
                echo ' Amount: ' . $price->vndTusd() . ' USD ';
                // var_dump($price->vndTusd());
              } elseif(($sel_from[0] == 'vnd') && ($sel_to[0] == 'vnd')) {
                $price = new vndTovnd("$amount");
                echo ' Amount: ' . $price->vndTvnd() . ' VND ';
              } elseif(($sel_from[0] == 'usd') && ($sel_to[0] == 'vnd')) {
                $price = new usdTovnd("$amount");
                echo ' Amount: ' . $price->usdTvnd() . ' VND ';    
              } elseif(($sel_from[0] == 'usd') && ($sel_to[0] == 'usd')) {
                $price = new usdTousd("$amount");
                echo ' Amount: ' . $price->usdTusd() . ' USD ';    
              }              
            } else {
                echo 'Please select the value.';
            }
        }
    } else {
        echo '<p style="color:red;"> Please input the value Amount </p>';
    }

    ?>






</body>
</html>