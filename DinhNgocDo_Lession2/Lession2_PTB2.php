<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fuggles&display=swap" rel="stylesheet">
    <title>Giải Phương Trình bậc 2</title>
    <style>
        *{
            margin: 0;
            padding: 0;
            background-color: lightgreen;
        }
        h1{
            margin-top: 30px;
            text-align: center;
            color: white;
            font-size: 100px;
            font-family: 'Fuggles', cursive;
        }
        form {
            margin: 0 0 0 300px;
            padding: 30px;
        }
        form .field{
            margin-top: 15px;
            width: 60%;
        }
        form .field label{
            font-size: 50px;
            font-weight: 700;
            color: white;
            font-family: 'Fuggles', cursive;
        }
        form .field input{
            width: 100%;
            height: 30px;
            padding-left: 10px;
            border-radius: 5px;
            border-color: #3498db;
            background-color: white;
            font-size: 25px;

        }
        form .button{
            margin: 20px 0 0 280px;
            width: 15%;
        }
        form .button input{
            width: 100%;
            color: white;
            background-color: royalblue;
            border-color: #3498db;
            border-radius: 5px;
            font-size: 30px;
        }
        form .button input:hover{
            background-color: violet;
            transition: .5s;
        }
        
    </style>
</head>
<body>
    <h1>Giải Phương Trình Bậc 2</h1>
    <form action="Lession2_PTB2.php" method="POST">
        <div class="field">
            <label for="">Nhập a: </label>
            <input type="text" name="a">
        </div>
        <div class="field">
            <label for="">Nhập b: </label>
            <input type="text" name="b">
        </div>
        <div class="field">
            <label for="">Nhập c: </label>
            <input type="text" name="c">
        </div>
        <div class="button">
            <input type="submit">
        </div>
    </form>
    <?php
        $a = "";
        $b = "";
        $c = "";

        if (isset($_POST['a']) && isset($_POST['b']) && isset($_POST['c'])){

            $a = $_POST['a'];
            $b = $_POST['b'];
            $c = $_POST['c'];
    
            function Solve($a, $b, $c) {
                
                if ($a == ""){
                    $a = 0;
                }
                if ($b == ""){
                    $b = 0;
                }
                if ($c == ""){
                    $c = 0;
                }
                $delta = $b*$b - 4*$a*$c;
                $x1 = (-$b + sqrt($delta)) / 2*$a;
                $x2 = (-$b - sqrt($delta)) / 2*$a;
                $x = -$b / 2*$a;
                $x0 = -$c / $b;
                echo "Phương trình đã cho là: ".$a."x^2 +".$b."x +".$c."<br>";
                if ($a == 0){
                    if($b == 0){
                        echo "Phương trình vô nghiệm";
                    }
                    else{
                        echo "Phương trình có nghiệm đơn x = ".round($x0,2);
                    }
                    return;
                }
                if ($a != 0){
                    if ($delta > 0){
                        echo "Phương trình có 2 nghiệm x1 = ".round($x1,2)." và x2 = ".round($x2,2);
                    } else if ($delta == 0){
                        echo "Phương trình nghiệm kép là ".round($x,2);
                    } else{
                        echo "Phương trình bậc 2 vô nghiệm";
                    }
                } 
            }
    
            if (is_numeric ($GLOBALS ['a']) && is_numeric ($GLOBALS ['b']) && is_numeric ($GLOBALS ['c'])){
                Solve($GLOBALS ['a'], $GLOBALS ['b'], $GLOBALS ['c']);
            } else{
                echo "Giá trị nhập vào không hợp lệ";
            }
        }
        ?>
</body>
</html>