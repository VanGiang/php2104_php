<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lession3_Fomatter</title>
</head>
<body>
    <?php
        $defaultCode = '$Test=2;' . "\n" 
            . '$first_name = \'Nguyen\';' . "\n"
            . '$test = array();' ."\n"
            . '      $test = 23' ."\n"
            . '$test =     \'abc\';' . "\n"
            . '$my_first_name = \'Nguyen\';' . "\n";
    ?>
    <form action="" method="POST">
        <textarea name="content" rows='10' cols="30"><?php echo isset($_POST['content']) ? $_POST['content'] : $defaultCode; ?></textarea>

        <button type="submit">Convert</button>
    </form>

    <?php
        if (isset($_POST['content'])) {
            $contentArr = explode("\n", $_POST['content']);
            //hàn explode dùng để chuyển đổi 1 chuỗi thành một mảng với các phần tử được tách bởi một chuỗi hay 1 ký tự con nào đó
            //biến $contentArr đã chuyển chuỗi content thành một mảng với các phần tử được tách nhau bởi "\n"
            $text = [];

            foreach ($contentArr as $value) {
                $firstChar = substr(trim($value), 0, 2);
                //hàm substr dùng để trích xuất 1 phần của chuỗi dựa trên thông số truyền vào 
                //substr($str, $start, $lent); $str là giá trị truyền vào, $start là vị trí bắt đầu, $lent là độ dài cần trích xuất
                //hàm trim dùng để xóa bỏ những ký tự bạn chỉ định khỏi phần  đầu và cuối của chuỗi 
                //biến $firstChar đã trích xuất các phần tử trong mảng $contentArr được gán là $value sau khi được hàn trim xóa bỏ 
                //khoảng trắng đầu cuối và trích xuất từ vị trí thứ 0 độ dài là 2 tức là các phần tử được chỉ định trong mảng là 0 và 1 
                $lineConvert = str_replace($firstChar, strtolower($firstChar), $value);

                $assignmentConvert = explode('=', $lineConvert);

                if (isset($assignmentConvert[0]) && isset($assignmentConvert[1])) {
                    $variable = explode('_', trim($assignmentConvert[0]));
                    $arrayConvert = str_replace('array();', '[];', trim($assignmentConvert[1]));

                    if (isset($variable[1])) {
                        $lineConvert = $variable[0] . ucfirst($variable[1]) . ucfirst($variable[2]) . ' = ' . trim($arrayConvert);
                        //hàm ucfirst chuyển ký tự đầu tiên trong chuỗi thành in hoa nếu ký tự đó là chữ cái 
                    } else {
                        $lineConvert = trim($assignmentConvert[0]) . ' = ' . trim($arrayConvert);
                    }
                }

                $text[] = $lineConvert;
            }

            $contentStr = implode("\n", $text);
            //hàm implode nối các phẩn tử của mảng thành chuỗi, hàm sẽ trả về chuỗi bao gồm các phẩn tử của mảng được ngăn cách
            //bẳng 1 ký tự nào đó được truyền vào
            // var_dump($contentStr);die;

            echo '<textarea name="" rows="10" cols="30">' . $contentStr . '</textarea>';
        }
    ?>
</body>
</html>