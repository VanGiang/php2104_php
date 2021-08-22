<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Bt_caculator</title>
</head>

<body>
    <h1>Caculator</h1>

    <form action="Bt_caculator.php" method="POST">
        <b>Nhap gia tri 1:</b> <input type="text" name="a"><br />
        <b>Nhap gia tri 2:</b> <input type="text" name="b"><br />
        <input type="submit" name="aaa" value=" + " onclick="Cong()" />
        <input type="submit" name="aaa" value=" - " onclick="Tru()" />
        <input type="submit" name="aaa" value=" * " onclick="Nhan()" />
        <input type="submit" name="aaa" value=" / " onclick="Chia()" />
    </form>

    <?php
    switch ($_POST['aaa']) {
        case ' + ':
            Cong();
            break;
        case ' - ':
            Tru();
            break;
        case ' * ':
            Nhan();
            break;
        case ' / ':
            Chia();
            break;
    }

    function Cong()
    {
        $a = $_POST['a'];
        $b = $_POST['b'];
        $result = 'Result = ' . ($a + $b);
        return $result;
        exit;
    }
    echo Cong();

    function Tru()
    {
        $a = $_POST['a'];
        $b = $_POST['b'];
        echo 'Result = ' . ($a - $b);
        exit;
    }

    function Nhan()
    {
        $a = $_POST['a'];
        $b = $_POST['b'];
        echo 'Result = ' . ($a * $b);
        exit;
    }

    function Chia()
    {
        $a = $_POST['a'];
        $b = $_POST['b'];
        echo 'Result = ' . ($a/$b);
        exit;
    }

    ?>

</body>

</html>