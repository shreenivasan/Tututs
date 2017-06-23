<?php
/*
class Foo
{
    private $privateVariable;
    public $publicVariable;

    public function __construct($private)
    {
        $this->privateVariable = $private;
        $this->publicVariable = "I'm public!"."<br>";        
    }

    // triggered when someone tries to access a private variable from the class
    public function __get($variable)
    {
        // You can do whatever you want here, you can calculate stuff etc.
        // Right now we're only accessing a private variable
        echo "Accessing the private variable " . $variable . " of the Foo class."."<br>";

        return $this->$variable;
    }

    // triggered when someone tries to change the value of a private variable
    public function __set($variable, $value)
    {
        // If you're working with a database, you have this function execute SQL queries if you like
        echo "Setting the private variable $variable of the Foo class."."<br>";

        $this->$variable = $value;
    }

    // executed when isset() is called
    public function __isset($variable)
    {
        echo "Checking if $variable is set..."."<br>";

        return isset($this->$variable);
    }

    // executed when unset() is called
    public function __unset($variable)
    {
        echo "Unsetting $variable..."."<br>";

        unset($this->$variable);
    }
}

$obj = new Foo("hello world");
echo $obj->privateVariable;     // hello world
echo $obj->publicVariable;      // I'm public!

$obj->privateVariable = "bar";
$obj->publicVariable = "hi world";

echo $obj->privateVariable;     // bar
echo $obj->publicVariable;      // hi world!

if (isset($obj->privateVariable))
{
    echo "Hi!";
}

unset($obj->privateVariable); */
class bar
{
    private  $test;
    public function __get($test)        
    {
        echo "<br> I am in GET";
        return $this->test;
    }
    public function __set($dt,$val)        
    {
        echo "<br> I am in SET";
        return $this->$dt=$val;
    }
}
$bar=new bar();
$bar->test="111";
echo $bar->test;
