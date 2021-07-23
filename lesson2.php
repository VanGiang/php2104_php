<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <?php
     date_default_timezone_set("Asia/Ho_Chi_Minh");
     echo date("h:i:sa");
        $date=date("h");
        if($date < '12'){
            echo("good morning");
        }else{
            echo("good nigth");
        }
    ?>
    <p><?php
        $tuoi = '18';
        switch($tuoi){
            case '10':
                echo "thoi nien thieu";
                break;
            case '16':
                echo "thoi thieu nien";
                break;
            case '18':
                echo "thanh nien";
                break;
            case '20':
                echo "da gia";
                break;
            default:
                echo "ban khong nam trong tuoi cua toi";
        }
    ?>
    </p>
</body>

</html>