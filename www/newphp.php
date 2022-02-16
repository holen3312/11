<?php
//class Cat
//{
//    private $name;
//    private $color;
//    private $ves;
//
//    public function __construct(string $name, string $color, string $ves)
//    {
//        $this->name = $name;
//        $this->color = $color;
//        $this->ves = $ves;
//    }
//
//    public function sayDarovaEbat()
//    {
//        return "Davora Ebat " . $this->name . ' я ' . $this->color . '<br>';
//    }
//    public function setName(string $name)
//    {
//        $this->name = $name;
//    }
//    public function setColor(string $color)
//    {
//        $this->color = $color;
//    }
//
//    public function getName(): string
//    {
//        return $this->name;
//    }
//
//    public function getColor(): string
//    {
//        return $this->color;
//    }
//
//    public function setVes(string $ves)
//    {
//        $this->ves = $ves;
//    }
//
//    public function getVes(): string
//    {
//        return $this->ves;
//    }
//}
////$cat1 = new Cat();
////$cat1->setColor('red');
////$cat1->setName('mamaluga');
////$cat1->ves = '3.50';
////$cat1->sayDarovaEbat();
////echo $cat1->getName();
////echo $cat1->getColor();
////
////$cat2 = new Cat();
////echo $cat2-> getName();
//
//$cat1 = new Cat('mamaluga', ' red', '3,50');
//echo $cat1->sayDarovaEbat() . '<br>';
//
//$cat2 = new Cat('jaja', 'blue', '5');
//echo $cat2->sayDarovaEbat();

//class Post
//{
//    protected $title;
//    protected $text;
//
//    public function __construct(string $title, string $text)
//    {
//        $this->title = $title;
//        $this->text = $text;
//    }
//
//    public function setTitle(string $title)
//    {
//        $this->title = $title;
//    }
//
//    public function getTitle (): string
//    {
//        return $this->title;
//    }
//
//    public function setText(string $text)
//    {
//        $this->text = $text;
//    }
//
//    public function getText(): string
//    {
//        return $this->text;
//    }
//}
//
//class Lesson extends Post
//{
//    private $homework;
//
//    public function __construct(string $title, string $text, string $homework)
//    {
//        $this->title = $title;
//        $this->text = $text;
//        $this->homework = $homework;
//    }
//
//
//    public function setHomework(sting $homework): void
//    {
//        $this->homework = $homework;
//    }
//
//    public function getHomework(): string
//    {
//        return $this->homework;
//    }
//
//
//
//}
//
//$new1 = new Lesson('123', 'aeqe', 'bada');
//echo $new1->getTitle();
//
//
//class PaidLesson extends Lesson
//{
//    private $price;
//
//    public function __construct(string $title, string $text, string $homework, int $price)
//    {
//     parent::__construct($title, $text, $homework);
//         $this->price = $price;
//    }
//
//    public function setPrice(int $price): void // не надо с конструктором
//    {
//        $this->price = $price;
//    }
//
//
//    public function getPrice(): int
//    {
//        return $this->price;
//    }
//}
//$newPaidLesson = new PaidLesson('yrok php', 'lolkek', 'spat', 99,90);
//var_dump($newPaidLesson);

$file = fopen(__DIR__ . '/file.text', 'r');
while (!feof($file)) {
    echo fgets($file);
    echo '<br>';
}
fclose($file);

//$file = fopen(__DIR__ . '/file.text', 'w');
//for ($i = 1; $i < 5; $i++) {
//    fputs($file, $i . PHP_EOL);
//}
//fclose($file);

$data = 'abc' . PHP_EOL . 'def' . PHP_EOL;
file_put_contents(__DIR__ . '/file.text', $data, FILE_APPEND);