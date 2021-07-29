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
                . '$my_first_name_aaa_bbb_ccc_ddd = \'Nguyen\'' . "\n"
                . '      $test = 23;' . "\n"
                . '$test =     \'abc\'      ;' . "\n"
                . '         ' . "\n"
                . '$test_abc = \'abc\';';
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
            if (strpos($value, '=')) {
                $content_arr = explode('=', $value);
                $line_right_0 = trim($content_arr[0]);
                $line_right = trim($content_arr[1]);
                if (strpos($line_right, '(')) {
                    $line_right_child = explode('(', $line_right);
                    $line_right_child_substr_0 = substr($line_right_child[0], 0, 5);
                    $line_right_child_substr_1 = substr($line_right_child[1], -2, -1);
                    $line_right_child_0 = str_replace($line_right_child_substr_0, '[', $line_right_child[0]);
                    $line_right_child_1 = str_replace($line_right_child_substr_1, ']', $line_right_child[1]);
                    $text = $line_right_0 . ' = ' . $line_right_child_0 . $line_right_child_1;
                } elseif (strpos($line_right, ';') == false) {
                    $content_arr_left = explode('_', $line_right_0);
                    $text = $content_arr_left[0] . ucfirst($content_arr_left[1]) . ucfirst($content_arr_left[2]) . ucfirst($content_arr_left[3]) . ucfirst($content_arr_left[4]) . ucfirst($content_arr_left[5]) . ucfirst($content_arr_left[6]) . ' = ' . $line_right . ';';
                } elseif (strpos($line_right, ' ') == false) {
                    $text = $line_right_0 . ' = ' . $line_right;
                } else {
                    $line_right_child_remove_space = str_replace(' ', '', $line_right);
                    $text = $line_right_0 . ' = ' . $line_right_child_remove_space;
                }
            } else {
                $text = ' = ' . ';';
            }            
            $text_1[] = $text;
        }
        $content_convert = implode("\n", $text_1);
        echo '<textarea name="" rows="10" cols="60">' . $content_convert . '</textarea>';
    }
    ?>

</body>

</html>