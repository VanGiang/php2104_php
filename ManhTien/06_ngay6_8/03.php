<?php

abstract class ClassPerson
{
    
    abstract protected function getName();
    abstract protected function setName($setName);
}

class UserClass1 extends ClassPerson
{
    public function getName()
    {
        echo "name : ";
    }

    public function setName($setName)
    {
        echo "{$setName}";
    }
}

$Tom = new UserClass1();
$Tom->getName();
$Tom->setName('Tom');
?>

