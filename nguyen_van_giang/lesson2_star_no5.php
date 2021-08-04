<?php
    echo '<h2>Bài toán tam giác hình sao - PHP For loop</h2>';
    function star($lineNumber)
    {
        $text = '';

        $spaceNumber = $lineNumber - 1;

        for ($i = 0; $i < $lineNumber; $i++) {
            for ($y = $spaceNumber; $y > 0; $y--) {
                $text .= '&nbsp;&nbsp;';
            }

            $spaceNumber--;

            $starNumber = ($i + 1) * 2 - 1;

            for ($x = 0; $x < $starNumber; $x++)
            {
                $text .= '*';
            }

            $text .= '<br>';
        }

        return $text;
    }

    echo star(10);
?>
