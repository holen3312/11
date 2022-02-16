<?php
interface Geometry
{
    public function scware() : float;
}




class Rera implements Geometry
{
    private $x; //svoistva
    private $y;

   public function __construct(int $x, float $y)
   {
       $this->x = $x;
       $this->y = $y;
   }


    public function scware() : float
    {
        return $this->x * $this->y;
    }

}

$x1 = new Rera(10, 20.5);


class Square implements Geometry
{
    public $x;

    public function __construct(int $x)
    {
        $this->x = $x;
    }

    public function scware() : float
    {
        return $this->x ** 2;
    }

}

    $x2 = new Square(100);

class Circle implements Geometry
{
    const PI = 3.14; // $self
    public $x;

    public function __construct(float $x)
    {
        $this->x = $x;
    }

    public function scware() : float // metod klasa
    {
        return $this->x ** 2 * self::PI;
    }

}

$x3 = new Circle(3.5);

//var_dump($x1 instanceof Geometry); proverka

$arr = [$x1, $x2, $x3];
//var_dump($arr);

foreach ($arr as $i) {
    if ($i instanceof Geometry == true) {
       echo $i->scware() . 'это объект' . get_class($i) . '<br>';
    } else{
        echo 'объект класса' . get_class($i) . 'не реализует интерфейс';
    }
}


//1)пишем интерфейс, который должен реализваться в наших классах. (implements)
//2)пишем классы с формулами вычесления и всем необходим в ООП
//3) скидываем все новые объекты в массив
//4) перебираем их foreach-ом и пишем являются они частью нашего интерфейса. в случае true - выводим их
//5) get_class возвращает имя класса, к которому принадлежит объект (в моем случае $i)