<?php



class Convert
{
    public $numBer;
    public function __construct($numBer)
    {
        return $this->numBer=$numBer;
    }
    
}
class Usd extends Convert
{
    public function UsdVnd()
    {
        return $this->numBer*23000;
    }
    public function UsdEuro()
    {
        return $this->numBer*0.84;
    }
}
class Vnd extends Convert
{
    public function VndUsd()
    {
        return $this->numBer/23000;
    }
    public function VndEuro()
    {
        return $this->numBer/27000;
    }
}
class Euro extends Convert
{
    public function EuroVnd()
    {
        return $this->numBer*27000;
    }
    public function EuroUsd()
    {
        return $this->numBer*1.18;
    }
}