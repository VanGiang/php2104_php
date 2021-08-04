<html>
   
   <head>
      <title>Chuyển đổi chữ hoa chữ thường trong PHP</title>
   </head>
   <body>
   
       <?php
       $text1 = '$Test_nam=array(); '; 
        $conten = str_replace( 'array()', '[]' , $text1);
        $conten2 = [$conten];
        foreach( $conten2 as $value)
        {
            $firstChar = substr($value, 0, 2); 
            $conten3 = str_replace( $firstChar, strtolower($firstChar) , $conten);
            $conten4 = str_replace( '=', ' = ', $conten3);
            $conten5 =[$conten4];
            foreach($conten5 as $value){
              for($i=1;$i<=count($conten5);$i++){
                  $c=0;
                  if('_'==$value){
                      $b = $c;
                      $lastChar = substr($value,$b,2);
                      $conten6 = str_replace( $lastChar, strtoupper($lastChar) , $conten4);
                      echo $conten6.'<br>';
              }}
            }
        }

        echo $conten .'<br>';
        echo $firstChar.'<br>';
        
       ?>
       
   </body>
</html>