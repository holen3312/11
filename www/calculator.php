<?php
//class A
//{
//    public function metod1(){
//        return $this->metod2();
//    }
//    public function metod2(){
//        return 'A';
//    }
//}
//
//class B extends A
//{
//    public function metod2(){
//        return 'B';
//    }
//}
//
//$newB = new B();
//echo $newB->metod1();

abstract class Human
{
    private $name;
    public function __construct(string $name)
    {
        $this->name = $name;
    }

    public function getName() : string
    {
        return $this->name;
    }

    abstract public function getGritings() : string;
    abstract public function getMyNameIs() : string;

    public function introduceYourSelf() : string
    {
        return $this->getGritings() . '!' . $this->getMyNameIs() . ' ' . $this->getName() . '.';
    }
}

class A extends Human
{
     public function getGritings(): string
     {
         return 'privet';
     }
     public function getMyNameIs(): string
     {
         return 'jopa';
     }


}
$newA = new A('artem');

class B extends Human
{
    public function getGritings(): string
    {
      return 'hello';
    }
    public function getMyNameIs(): string
    {
        return 'burger';
    }
}
$newB = new B('ne artemж');

echo $newA->introduceYourSelf();
echo $newB->introduceYourSelf();