<?php

class FirstClass
{

    function selfTest()
    {
        $this->classCheck(); // this-> will refer to Second Class
        self::classCheck(); // self refer to the parent class
    }

    function classCheck()
    {
        echo __CLASS__ . "\n";
    }

    public static function foo()
    {
        static::who();  // PHP waits to resolve this (hence, late)!
        self::who(); // PHP binds this to A::who() right away
    }

    public static function who()
    {
        echo __CLASS__ . "\n";
    }
}

class SecondClass extends FirstClass
{
    function classCheck()
    {
        echo __CLASS__ . "\n";
    }

    public static function staticTest()
    {
        self::foo();
    }

    public static function who()
    {
        echo __CLASS__ . "\n";
    }
}

SecondClass::staticTest();
// SecondClass
// FirstClass

$var = new SecondClass();
$var->selfTest();
// SecondClass
// FirstClass
