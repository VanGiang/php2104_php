<?php
    class change{
        public $InputMoney;
        public function __construct($InputMoney){
            $this->InputMoney = $InputMoney;
        }
    }
    class vnd extends change{
        public function VndToUsd(){
            return $this->InputMoney * 0.000044;
            
        }
        public function VndToEur(){
             return $this->InputMoney * 0.000037;
        }
    }
    class usd extends change{
        public function UsdToVnd(){
             return $this->InputMoney / 0.000044;
        }
        public function UsdToEur(){
             return $this->InputMoney * 1.18;
        }
    }
    class eur extends change{
        public function EurToVnd(){
             return $this->InputMoney / 0.000037;
        }
        public function EurToUsd(){
            return $this->InputMoney / 0.85;
        }
    }
?>