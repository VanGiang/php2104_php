<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Dictionary</title>
    <style>
        body {
            text-align: center;
        }

        h1 {
            color: green;
        }

        table,
        tr,
        td,
        th {
            border: 1px solid black;
        }
    </style>
</head>

<body>

    <form action="dictionary.php" method="GET">
        <br /> Search word: <input type="text" name="word">
        <input type="submit" value="Search" onclick="Search()">
    </form>

    <?php
    echo '<h1>DICTIONARY</h1>';
    function Search()
    {
        $data = [
            ['Home', 'Nha o, Noi o'],
            ['School', 'Truong hoc'],
            ['Car', 'Xe oto'],
            ['Computer', 'May Tinh'],
            ['Phone', 'Dien Thoai'],
            ['Table', 'Cai Ban'],
            ['Book', 'Quyen sach'],
            ['Mouse', 'Con Chuot'],
            ['Clothes', 'Quan ao'],
            ['Store', 'Cua Hang, Noi ban Hang'],
        ];
        $text = "<table width='100%'>"
            . "<tr>"
            . "<th>Word</th>"
            . "<th>Mean</th>"
            . "</tr>";
        $word = $_GET['word'];
        $data_len = count($data);
        for ($i = 0; $i <= $data_len; $i++) {
            $arr = $data[$i][0];
            if (strcasecmp("$word", "$arr") == 0) {
                $mean = $data[$i][1];
            }
        }
        $text .= "<tr>";
        $text .= "<td>" . $word . "</td>";
        $text .= "<td>" . $mean . "</td>";
        $text .= "</tr>";
        $text .= "</table>";
        return $text;
    }
    echo Search();

    ?>
</body>

</html>