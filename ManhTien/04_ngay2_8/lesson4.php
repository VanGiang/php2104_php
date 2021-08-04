<?php
class Cat{
    public $name;
    public $color;
    public $weight;
    public function __construct($name='Binz',$color='red',$weight='5kg')
    {
        $this->name=$name;
        $this->color=$color;
        $this->weight=$weight;
    }
    
    public function setName($name){
         $this->name=$name;
    }
    public function setColor($color){
        $this->color=$color;
    }
    public function getName(){
        return $this->name;
    }
    public function getColor(){
        return $this->color;
    }
    public function setWeight($weight){
        $this->weight=$weight;
    }
    public function getWeight(){
        return $this->weight;
    }
    public function showInfo()
    {
     
    }
    public function __destruct()
    {
        echo $this->name .'<br>';
        echo $this->color.'<br>';
        echo $this->weight.'<br>';
    }
}
$tom = new Cat('tom');

/* 
echo '<pre>';
print_r($tom);
echo '</pre>';
*/

