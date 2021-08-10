<!DOCTYPE html>
<html>
<head>
    <title>Tool beautiful php code</title>
</head>
<body>
    <?php
        $defaultCode = '$Test=2;' . "\n"
            . '$fisrt_name = \'Nguyen\';' . "\n";
    ?>
    <form acction="" method="post">
        <textarea name="content" rows='10' cols="30"><?php echo isset($_POST['content']) ? $_POST['content'] : $defaultCode; ?></textarea>

        <button type="submit">Convert</button>
    </form>

    <?php
        if (isset($_POST['content'])) {
            $contentArr = explode("\n", $_POST['content']);
            $text = [];

            foreach ($contentArr as $value) {
                $firstChar = substr($value, 0, 2);
                $lineConvert = str_replace($firstChar, strtolower($firstChar), $value);

                $assignmentConvert = explode('=', $lineConvert);

                if (isset($assignmentConvert[0]) && isset($assignmentConvert[1])) {
                    $variable = explode('_', trim($assignmentConvert[0]));

                    if (isset($variable[1])) {
                        $lineConvert = $variable[0] . ucfirst($variable[1]) . ' = ' . trim($assignmentConvert[1]);
                    } else {
                        $lineConvert = trim($assignmentConvert[0]) . ' = ' . trim($assignmentConvert[1]);
                    }
                }

                $text[] = $lineConvert;
            }

            $contentStr = implode("\n", $text);
            // var_dump($contentStr);die;

            echo '<textarea name="" rows="10" cols="30">' . $contentStr . '</textarea>';
        }
    ?>
</body>
</html>
