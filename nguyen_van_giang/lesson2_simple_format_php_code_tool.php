<!DOCTYPE html>
<html>
<head>
    <title>Tool beautiful php code</title>
</head>
<body>
    <?php
        $defaultCode = '$a=4;' . "\n"
            . 'if($a==4){' . "\n"
            . 'echo $a;' . "\n"
            . '}';
    ?>
    <form acction="" method="post">
        <textarea name="content" rows='10'><?php echo isset($_POST['content']) ? $_POST['content'] : $defaultCode; ?></textarea>

        <button type="submit">Convert</button>
    </form>

    <?php
        if (isset($_POST['content'])) {
            $content = $_POST['content'];

            $pattern = '/(\S)==(\S)/i';
            $replacement = '${1} == $2';
            $content = preg_replace($pattern, $replacement, $content);

            $pattern = '/([^=\s])=([^=\s])/i';
            $replacement = '${1} = $2';
            $content = preg_replace($pattern, $replacement, $content);

            $replaces = [
                'if(' => 'if (',
                '){' => ') {',
                '= =' => '==',
            ];
            $content = strtr($content, $replaces);

            echo '<textarea name="" rows="10">' . $content . '</textarea>';
        }
    ?>
</body>
</html>
