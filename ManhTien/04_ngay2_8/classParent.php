<?php

use Cat as GlobalCat;

class Pet{
    public $name;
    public $color;
    public $weight;

    public function __construct($name='Binz',$color='red',$weight='5kg')
    { 
        $this->name=$name;
        $this->color=$color;
        $this->weight=$weight;
    }
    public function showInfo(){
        echo $this->name .'<br>';
        echo $this->color.'<br>';
        echo $this->weight.'<br>';
    }

}

class Cat extends Pet{
    public $height;
    public function setHeight($height='0,5m')
    {
        $this->height=$height;
    }

    public function showInfo()
    {
        echo $this->name .'<br>';
        echo $this->color.'<br>';
        echo $this->weight.'<br>';
        echo $this->height.'<br>';
    }
}

$tom=new Cat('Tom','yelow','1kg');

$tom->showInfo();