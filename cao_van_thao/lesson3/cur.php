<?php
    $InputMoney =  $_POST['InputMoney'];
    $NameCurrency = $_POST['NameCurrency'];
    $NameCurrency1 = $_POST['NameCurrency1'];
    if ($NameCurrency == 'vnd'){
        $show = new vnd($InputMoney);
        if ($NameCurrency1 == 'usd'){
            echo $show-> VndToUsd();
        }else if ($NameCurrency1 == 'eur') {
            echo $show->VndToEur();
        }
    }
    else if ($NameCurrency == 'usd'){
        $show = new usd($InputMoney);
        if ($NameCurrency1 == 'vnd'){
            echo $show->UsdToVnd();
        }else if ($NameCurrency1 == 'eur') {
            echo $show->UsdToEur();
        }
    }
    else if ($NameCurrency == 'eur'){
        $show = new eur($InputMoney);
        if ($NameCurrency1 == 'vnd'){
            echo $show->EurToVnd();
        }else if ($NameCurrency1 == 'usd') {
            echo $show->EurToUsd();
        }
    }
?>