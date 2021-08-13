<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ngan Hang So Viet Nam</title>
</head>
<body>
    <?php
        require_once 'doitien.php';
    ?>
    <form action="#" method="post">
        <label>nhập vào số tiền bạn muốn đổi </label><input type="number" name="moneyinput" value="<?php if(isset($_POST[moneyinput])) { echo $_POST[moneyinput]; } ?>">
        <label>đổi từ (vnd,usd,gpb,aud,jpy)</label><input type="text" name="changefrom" value="<?php if(isset($_POST[changefrom])) { echo $_POST[changefrom]; } ?>">
        <label>đổi sang (vnd,usd,gpb,aud,jpy)</label><input type="text" name="changeto" value="<?php if(isset($_POST[changeto])) { echo $_POST[changeto]; } ?>">
        <input type="submit" value="đổi">
    </form>
    <?php
        $moneyinput = $_POST[moneyinput];
        $changefrom = $_POST[changefrom];
        $changeto   = $_POST[changeto];
        $str = $changefrom."to".$changeto;

        $loaitien = strtoupper($changefrom);
        $obj = new $loaitien($moneyinput);
        $moneyout = $obj->$str();
    ?>
    <div class="moneyout">
        <div class="left">
            <p><?php echo $loaitien; ?></p>
            <p><?php 
            if ($changefrom == "vnd") {
                echo number_format($moneyinput);
            } else {
                echo number_format($moneyinput,0,'.','.');
            }
            ?></p>
        </div>
        <div class="right">
            <p><?php echo $changeto; ?></p>
            <p><?php 
            if ($changeto == "vnd") {
                echo number_format($moneyout);
            } else {
                echo number_format($moneyout,2,'.','');
            }
            ?></p>
        </div>
    </div>
</body>
</html>