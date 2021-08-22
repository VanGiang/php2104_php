<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <title>Document</title>
    <style>
        .form{
            border: 1px solid black;
            width: 300px;
            height: 150px;
            margin: 150px 0 0 640px;
        }
        .form .fal{
            margin-top: 25px;
        }
        .form .fal #NameCurrency{
            margin-bottom: 27px;
        }
        button{
            margin: 5px 0 0 130px;
        }
    </style>
</head>

<body>
    <?php require_once 'currency-exchange.php';?>
    <form action="#" method="POST" class="form">
           <div class="row">
               <div class="col">
                    <div>
                        <label>nhập số tiền</label>
                        <input type="number" name="InputMoney" value="<?php if(isset($_POST['InputMoney'])) { echo $_POST['InputMoney']; } ?>">
                    </div>
                    <div>
                        <label>sang tiền</label>
                        <input type="number" name="InputMoney1" value="<?php include_once ('cur.php');?>">
                    </div>
               </div>
               <div class="col fal">
                <select name="NameCurrency" id="NameCurrency">
                    <option value="vnd" <?php if(isset($_POST['NameCurrency'])){ if($NameCurrency == 'vnd'){echo 'selected';}}?>>VNĐ</option>
                    <option value="usd" <?php if(isset($_POST['NameCurrency'])){ if($NameCurrency == 'usd'){echo 'selected';}}?>>USD</option>
                    <option value="eur" <?php if(isset($_POST['NameCurrency'])){ if($NameCurrency == 'eur'){echo 'selected';}}?>>EURO</option>
                </select>
                <select name="NameCurrency1" id="NameCurrency1" >
                    <option value="vnd" <?php if(isset($_POST['NameCurrency1'])){ if($NameCurrency1 == 'vnd'){echo 'selected';}}?>>VNĐ</option>
                    <option value="usd" <?php if(isset($_POST['NameCurrency1'])){ if($NameCurrency1 == 'usd'){echo 'selected';}}?>>USD</option>
                    <option value="eur" <?php if(isset($_POST['NameCurrency1'])){ if($NameCurrency1 == 'eur'){echo 'selected';}}?>>EURO</option>
                </select>
                </div>
           </div>
        <button name="chagne">đổi</button>
    </form>
</body>
</html>