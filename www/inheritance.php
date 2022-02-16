<?php
class daddy
{
    protected $dad;

    public function __construct( string $dad)
    {
        $this->dad = $dad;
    }

    public function hello()
    {
        return 'privet' . $this->dad;
    }
}
$newDaddy = new daddy('Ben');


class kid extends daddy // наследование
{
    private $child;

    public function __construct(string $dad, string $child)
    {
      $this->dad = $dad; // или parent::__construct($dad);
      $this->child = $child;
    }

    public function setChild(string $child) // можно не юзать, а только get
    {
        $this->child = $child;
    }

    public function getChild()
    {
        return $this->child;
    }
}

$newChild = new kid( 'ben','Vasya');
echo $newChild->hello(); // можно юзать методы  с родительского класса

class Vnyk extends kid
{
    private $name;

    public function __construct(string $dad, string $child, string $name)
    {
        parent::__construct($dad, $child);
        $this->name = $name;
    }
}

$newVnyk = new Vnyk('Ben', 'vasya', 'jora');
var_dump($newVnyk);