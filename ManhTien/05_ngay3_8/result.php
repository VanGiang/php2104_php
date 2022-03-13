<?php
        if(isset($_POST['numb1'])){
            $numb1=$_POST['numb1'];
            $selOne=$_POST['selOne'];
            $selTwo=$_POST['selTwo'];
            if($selOne=='USD'){
                $tienTe=new USD($numb1);
                if($selTwo=='VND')
                {
                    echo $tienTe->UsdVnd();
                }
                else if($selTwo=='EURO')
                {
                    echo $tienTe->UsdEuro();
                } 
            }
            if($selOne=='VND'){
                $tienTe=new VND($numb1);
                if($selTwo=='USD')
                {
                    echo $tienTe->VndUsd();
                }
                else if($selTwo=='EURO')
                {
                    echo $tienTe->VndEuro();
                } 
            }
            if($selOne=='EURO'){
                $tienTe=new Euro($numb1);
                if($selTwo=='VND')
                {
                    echo $tienTe->EuroVnd();
                }
                else if($selTwo=='USD')
                {
                    echo $tienTe->EuroUsd();
                } 
            }
        }else {
          echo 0;
        }
        ?>