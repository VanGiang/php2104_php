<!DOCTYPE html>
<html>
<head>
    <title>Tool Beautiful Php Code Var</title>
</head>
<body>
    <?php
        $defaultCode = '$test=array();' . "\n"
            . '$my_first_name = "Nguyen";'. "\n"
            . '     $test=23;' ."\n" 
            . '$test =     "abc"              ;' . "\n"
            . "..." ;
    ?>
    <form acction="" method="post">
        <textarea name="content" rows='10' cols="30"><?php echo isset($_POST['content']) ? $_POST['content'] : $defaultCode; ?></textarea>

        <button type="submit">Convert</button>
    </form>

    <?php
        if (isset($_POST['content'])) {
            $contentArr = explode("\n", $_POST['content']); //Tach chuoi thanh 1 manng sau \n
            $text = [];

            foreach ($contentArr as $value) {
                $firstChar = substr($value, 0,2); //Lay ra 2 ki tu tinh tu vi tri 0 cua chuoi
                $lineConvert = str_replace($firstChar, strtolower($firstChar), $value);//chuyen doi chuoi ve dang chu thuong
                $replace = str_replace("(", "[", $lineConvert); 
                $replaceArr = str_replace(")", "]", $replace); //Thay the ki tu () bang []
                $arrConvert = explode('=', $replaceArr); 

                if (isset($arrConvert[0]) && isset($arrConvert[1])) {
                    $variable = explode('_', trim($arrConvert[0])); //trim() xoa ki tu o 2 dau chuoi
                    
                    if (isset($variable[1])) {
                        $replaceArr = $variable[0] . ucfirst($variable[1]) . ucfirst($variable[2]) . ' = ' . trim($arrConvert[1]); //ucfirst chuyen ki tu dau tien cua chuoi ve chu hoa
                    } else {
                        $replaceArr = trim($arrConvert[0]) . ' = ' . str_replace(" ", "", $arrConvert[1]);
                    }
                }

                $text[] = $replaceArr; 
            }

            $contentStr =   implode("\n", $text); //Tra ve 1 chuoi tu cac phan tu cua mang

            echo '<textarea name="" rows="10" cols="30">' . $contentStr . '</textarea>';
        }
    ?>
</body>
</html>
