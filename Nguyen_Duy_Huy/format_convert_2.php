<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>format_convert_2</title>
    <style>
        h1 {
            text-align: center;
            color: green;
        }

        textarea,
        form {
            display: inline;
        }
    </style>
</head>

<body>
    <h1>format_convert_2</h1>
    <form action="format_convert_2.php" method="POST">
        <textarea name="content" rows="10" cols="60">
            <?php
            $default_code =
                '$test = array();' . "\n"
                . '$my_first_name = \'Nguyen\'' . "\n"
                . '      $test = 23;' . "\n"
                . '$test =     \'abc\'      ;';
            echo isset($_POST['content']) ? $_POST['content'] : $default_code;
            ?>
        </textarea>
        <button type="submit">Convert</button>
    </form>
    <?php
    if (isset($_POST['content'])) {
        $content = explode("\n", $_POST['content']);
        $text_1 = [];
        foreach ($content as $value) {
            $content_arr = explode('=', $value);
            $line_right_0 = trim($content_arr[0]);
            $line_right = trim($content_arr[1]);
            if (strpos($line_right, '(')) {
                $line_right_child = explode('(', $line_right);
                $line_right_child_substr_0 = substr($line_right_child[0], 0, 5);
                $line_right_child_substr_1 = substr($line_right_child[1], -2, -1);
                $line_right_child_0 = str_replace($line_right_child_substr_0, '[', $line_right_child[0]);
                $line_right_child_1 = str_replace($line_right_child_substr_1, ']', $line_right_child[1]);
                $text = trim($content_arr[0]) . ' = ' . $line_right_child_0 . $line_right_child_1;
            } elseif (strpos($line_right, ';') == false) {
                $content_arr_left = explode('_', trim($content_arr[0]));
                $text = $content_arr_left[0] . ucfirst($content_arr_left[1]) . ucfirst($content_arr_left[2]) . ' = ' . trim($content_arr[1]) . ';';
            } elseif (strpos($line_right, ' ') == false) {
                $text = trim($content_arr[0]) . ' = ' . trim($content_arr[1]);
            } else {
                $line_right_child_remove_space = str_replace(' ', '', $line_right);
                $text = trim($content_arr[0]) . ' = ' . $line_right_child_remove_space;
            }
            $text_1[] = $text;
        }
        $content_convert = implode("\n", $text_1);
        echo '<textarea name="" rows="10" cols="60">' . $content_convert . '</textarea>';
    }
    ?>

</body>

</html>