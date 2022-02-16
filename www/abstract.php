<?php
abstract class A
{
    abstract function sayHello();
    public function printThis()
    {
        echo 'значение' . $this->sayHello();
    }
}

class B extends A
{
    private $hello;
    public function __construct(string $hello)
    {
        $this->hello = $hello;
    }
}

$newB = new B('privet');
$newB->printThis();


// домашка

abstract class Human
{
    private $name;

    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function getName(): string
    {
        return $this->name;
    }

    abstract public function getGreetings(): string;
    abstract public function getMyNameIs(): string;

    public function introduceYourself(): string
    {
        return $this->getGreetings() . '! ' . $this->getMyNameIs() . $this->getName();
    }
}
class engPeople extends Human
{
    public function __construct(string $name)
    {
        parent::__construct($name);
    }

    public function getGritings(): string
    {
       return 'hello';
    }

    public function getMyNameIs(): string
    {
       return 'burger';
    }
}
$newEng = new engPeople('loh');
$newEng->introduceYourself();
class russPeople extends Human
{
    public function __construct(string $name)
    {
        parent::__construct($name);
    }
    public function getGreetings(): string
    {
      return 'privet';
    }
    public function getMyNameIs(): string
    {
        return 'vodka';
    }
}
$newRuss = new russPeople('stupid loh');
$newRuss->introduceYourself();

//1) логику методов с абстрактоного можно добавлять