<?php
class A
{

}
$newA = new A(); // добавления ОБЪЕКТОВ

class B
{
    public $name; // свойства
}
$newB = new B();
$newB->name = 'имя';

class C
{
    public $date;

    public function time() // метод
    {
        return '17:06' . $this->date . '<br>' ;
    }
}
$newC = new C();
$newC->date = 25.11;
echo $newC->time() ;

class D
{
    public $love;
    public function __construct(string $love)
    {
        $this->love = $love;
    }
    public function myLove()
    {
        return 'my love is ' . $this->love . '<br>';
    }
}
$newD = new D('Irochka'); // сюда пишем значения конструкта
echo $newD->myLove();

class E
{
    private $game;

    public function gamer()
    {
        return 'ГЕЙмеры на месте?' . $this->game . '<br>';
    }

    public function setGame(string $game)
    {
        $this->game = $game;
    }
}
$newE = new E;
$newE->setGame(' на месте');
echo $newE->gamer();

class F
{
    private $temperature;

    public function setTemperature(string $temperature)
    {
        $this->temperature = $temperature;
    }

    public function getTemperature()
    {
        return $this->temperature;
    }

    public function sad()
    {
        return 'на улице' . $this->temperature . '<br>';
    }
}
$newF = new F;
$newF->setTemperature('холодно');
echo $newF->sad();
echo $newF->getTemperature();

