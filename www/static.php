<?php
//class Aa
//{
//    public static function test(int $x)
//    {
//        return 'x = ' . $x;
//    }
//}
//
//echo Aa::test(10);
//
//class User
//{
//    private $role;
//    private $name;
//    public function __construct(string $role, string $name)
//    {
//        $this->role = $role;
//        $this->name = $name;
//    }
//
//    public static function createAdmin(string $name)
//    {
//            return new self('admin', $name);
//    }
//}
//
//$newAdim = User::createAdmin('Petya');
//
////$newUser = new User('admin', 'Vasya');
//var_dump($newAdim);
//
//class A
//{
//    public static $x; // static = self ; !static = $this
//
//    public function hello()
//    {
//        return self::$x;
//    }
//}
//A::$x = 5;
//var_dump(A::$x);
//A::$x = 10;
//$newA = new A();
//var_dump($newA::$x);
//
//
//class Z
//{
//    public static $x;
//
//    public function hello()
//{
//    return self::$x;
//}
//}
//Z::$x = 3;
//$newZ = new Z();
//var_dump($newZ->hello());


class Human
{
    private static $count = 0;

    public function __construct()
    {
        return self::$count++;
    }

    public static function getCount() : int // static!
    {
        return self::$count;
    }
}
echo Human::getCount(); // нет объекта = класс и двоеточие юзай. только если метод static

$newH = new Human();
echo Human::getCount();