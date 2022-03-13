<?php

interface Person 
{
    public function setName();
}

class User implements Person
{
    public $setName;
    
    public function setName()
    {
        return $this->setName;
    }
}

class User2 implements Person
{
    public $setName;
    public $getName;

    public function setName()
    {
        return $this->setName;
    }

    public function getName()
    {
        return $this->setName;
    }
}
