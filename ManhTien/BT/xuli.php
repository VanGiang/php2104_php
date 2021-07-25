<?php 
        if (isset($_POST["text1"])) {
            
            $text1=$_POST["text1"];
            echo '<textarea style="width:200px;height:150px"  placeholder="'.$text1.'"></textarea>';
            echo "<button>convert</button>";
        $text1 = str_replace( array('array()', '_n','$T','=2'), array ('[]', 'N','$t',' = 2') , $text1 );
        echo '<textarea style="width:200px;height:150px"  placeholder="'.$text1.'"></textarea>';
        }?>
