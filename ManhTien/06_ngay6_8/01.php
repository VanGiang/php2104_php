<?php

class ParentClass
{
    public $attribute1;
    public $attribute2;
    private $attribute4;
    protected $attribute5;

    public function __construct()
    {
        $this->attribute1 = 'attribute1';
        $this->attribute2 = 'attribute2';
    }

    public function action1()
    {
        return 'action1' . $this->attribute1 .  '<br>';
    }

    public function action2()
    {
        return 'action2' .$this->attribute2 .'<br>';
    }


}

class ChildClass1 extends ParentClass
{
    

    public function __construct()
    {
        
    }

    private  function test1()
    {
        echo $this->attribute1;
    }

    protected function test2()
    {
        echo $this->attribute2;
    }
}
$test=new ChildClass1();
$test->action1();

