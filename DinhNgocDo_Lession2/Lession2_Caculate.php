<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lession2_Caculate</title>
    <style>
        *{
            margin: 0;
            padding: 0;
        }
        html,body {

        }
        form{
            width: 40%;
            height: 300px;
            margin: 30px 0 0 450px;
            padding-top: 10px;
        }
        form .field{
            margin-top: 10px;
        }
        form .field label{
            padding-left: 30px;
            font-size: 18px;
            font-weight: 700;
        }
        form .field input{
            width: 35%;
            padding: 5px;
            font-size: 17px;
        }
        form .button{
            margin: 30px 0 0 60px;
            padding: 15px;
            width: 400px;
        }
        .button input{
            width: 20%;
            margin-left: 15px;
            font-size: 20px;
            color: white;
            background: lightseagreen;
        }
    </style>
</head>
<body>
    <form action="Lession2_Caculate.php" method="POST">
        <div class="field">
            <label for="">Nhập hệ số a: </label>
            <input type="text" name="a">
        </div>
        <div class="field">
            <label for="">Nhập hệ số b: </label>
            <input type="text" name="b">
        </div>
        <div class="button">
            <input type="submit" value="+" name="operation">
            <input type="submit" value="-" name="operation">
            <input type="submit" value="*" name="operation">
            <input type="submit" value="/" name="operation">
        </div>
    </form>
    <?php 
        $a = "";
        $b = "";
        $result = "";
        if (isset($_POST['a']) && isset($_POST['b']) && isset($_POST['operation'])) {

            $a = $_POST['a'];
            $b = $_POST['b'];
            $op = $_POST['operation'];

            function sum($a ,$b ,$result) {
                $result = $a + $b;
                echo $a." + ".$b." = ".$result."<br>";
            }
            function difference($a ,$b ,$result) {
                $result = $a - $b;
                echo $a." - ".$b." = ".$result."<br>";
            }
            function product($a ,$b ,$result) {
                $result = $a * $b;
                echo $a." x ".$b." = ".$result."<br>";
            }
            function quotient($a ,$b ,$result) {
                $result = $a / $b;
                echo $a." / ".$b." = ".round($result,2)."<br>";
            }

            switch($op) {
                case '+': sum($a ,$b ,$result);
                    break;
                case '-': difference($a ,$b ,$result);
                    break;
                case '*': product($a ,$b ,$result);
                    break;
                case '/': quotient($a ,$b ,$result);
                    break;
            }
        }

        /* if (is_numeric($GLOBALS['a'] && is_numeric($GLOBALS['b'])) {
                
        } else {
            echo "Giá trị nhập vào không hợp lệ";
        } */
    ?>
</body>
</html>