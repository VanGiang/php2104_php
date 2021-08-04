<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ví dụ về textarea</title>
    <link href="style.css" rel="stylesheet" >
</head>
<body>
    <?php 
    $text = " ";
    ?>
    <form action="" method="POST">
        <textarea name="text1" ><?php echo isset($_POST['text1']) ? $_POST['text1'] : $text; ?></textarea>
        <button>convert</button>
        <textarea ></textarea>
    </form>
    <?php 
         if(isset($_POST['text1'])){
            $text = $_POST['text1'];
            $text1 = 
        }
    ?>
</body>
</html>