<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        div{
            margin-left: 20px;
        }
        div h3{
            margin: 0 0 15px 0;
            margin-left: 300px;
        }
        div .display{
            width: 500px;
            height: 150px;
            margin-left: 150px;
        }
        div .display p{
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div>
        <h3>phương trình bậc 2</h3>
        <textarea class="display" name="display">
            <?php
                $a = $_POST['numbera'];
                $b = $_POST['numberb'];
                $c = $_POST['numberc'];
                if($a == 0){
                    if($b == 0){
                        if($c == 0){
                            echo ("phuong trinh vo so nghiem");
                        
                        } else{
                            echo ("phuong trinh vo nghiem");
                        }
                    } else{
                        $x1 = -$c / $b;
                        echo "phuong trinh co 1 nghiem duy nhat X1= ".$x1;
                    }
                } else{
                    $deta = ($b * $b) - (4 * $a * $c);
                    if($deta > 0){
                        $X1 = (-$b + sqrt ($deta)) / (2 * $a);
                        $X2 = (-$b - sqrt ($deta)) / (2 * $a);
                        echo " phuong trinh có 2 nghiêm x1= ".$X1." , "."x2= ".$X2; 
                    } elseif ($deta < 0){
                        echo "phuong trinh vo nghiem";
                    }else{
                        $X1 = -$b / $a;
                        echo "phuong trinh co 1 nghiem X1= ".$X1;
                    }
                }
            ?>
        </textarea>
    </div>
    
</body>
</html>
