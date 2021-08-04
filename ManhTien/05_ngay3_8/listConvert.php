<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chuyển đổi</title>
    <link href="style.css" rel="stylesheet" >
</head>
<body>
<body>
<?php
require_once('convert.php');
?>
    <div class="content">
        <h2>Chuyển đổi tiền tệ </h2>
        <form action="#" method="POST">
            <input name="numb1" type="number" value="<?php if(isset($_POST['numb1'])){ echo $_POST['numb1'];}else{ echo 0;}?>"> 
            <input name="numb2" type="number" value="<?php require_once('result.php');?>">
            <select name="selOne" id="seLOne">
                <option value="USD" <?php if(isset($_POST['selOne'])){ if($selOne=='USD'){ echo 'selected';}} ?>  >USD</option>
                <option value="VND" <?php if(isset($_POST['selOne'])){ if($selOne=='VND'){ echo 'selected';}} ?> >VND</option>
                <option value="EURO" <?php if(isset($_POST['selOne'])){ if($selOne=='EURO'){ echo 'selected';}} ?> >EURO</option>
            </select>
            <select name="selTwo" id="selTwo">
                <option value="USD" <?php if(isset($_POST['selTwo'])){ if($selTwo=='USD'){ echo 'selected';}} ?>  >USD</option>
                <option value="VND" <?php if(isset($_POST['selTwo'])){ if($selTwo=='VND'){ echo 'selected';}} ?> >VND</option>
                <option value="EURO" <?php if(isset($_POST['selTwo'])){ if($selTwo=='EURO'){ echo 'selected';}} ?> >EURO</option>
            </select>
            <button>Convert</button>
        </form>
        
    </div>
</body>
</html>
</body>
</html>