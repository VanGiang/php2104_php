<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Display_Image_star_new</title>
</head>

<body>

    <?php
    function Image_star_1()
    {
        for ($i = 1; $i <= 5; $i++) {
            for ($j = 1; $j <= $i; $j++) {
                echo ' * ';
            }
            echo "<br/>";
        }
    }
    function Image_star_2()
    {
        for ($i = 5; $i >= 1; $i--) {
            for ($j = 1; $j <= $i; $j++) {
                echo ' * ';
            }
            echo "<br/>";
        }
    }
    function Image_star_3()
    {
        for ($i = 1; $i <= 5; $i++) {
            for ($a = 1; $a <= 5 - $i; $a++) {
                echo ' &nbsp;&nbsp';
            }
            for ($j = 1; $j <= $i; $j++) {
                echo ' *';
            }
            echo "<br/>";
        }
    }
    function Image_star_4()
    {
        for ($i = 5; $i >= 1; $i--) {
            for ($a = 1; $a <= 5 - $i; $a++) {
                echo ' &nbsp;&nbsp';
            }
            for ($j = 1; $j <= $i; $j++) {
                echo ' *';
            }
            echo "<br/>";
        }
    }
    function Image_star_5()
    {
        for ($i = 1; $i <= 5; $i++) {
            for ($a = 1; $a <= 9 - ($i * 2 - 1); $a++) {
                echo ' &nbsp';
            }
            for ($j = 1; $j <= $i * 2 - 1; $j++) {
                echo ' *';
            }
            echo "<br/>";
        }
    }
    function Image_star_6()
    {
        for ($i = 5; $i >= 1; $i--) {
            for ($a = 1; $a <= 9 - ($i * 2 - 1); $a++) {
                echo ' &nbsp';
            }
            for ($j = 1; $j <= $i * 2 - 1; $j++) {
                echo ' *';
            }
            echo "<br/>";
        }
    }

    echo 'Hinh dang 1: <br>';
    echo Image_star_1();
    echo 'Hinh dang 2: <br>';
    echo Image_star_2();
    echo 'Hinh dang 3: <br>';
    echo Image_star_3();
    echo 'Hinh dang 4: <br>';
    echo Image_star_4();
    echo 'Hinh dang 5: <br>';
    echo Image_star_5();
    echo 'Hinh dang 6: <br>';
    echo Image_star_6();

    ?>

</body>

</html>