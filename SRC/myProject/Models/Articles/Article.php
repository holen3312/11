<?php
//namespace myProject\Models\Articles;
//use myProject\Models\Users\User;
//class Article
//{
//    private $zagolovok;
//    private $text;
//    private $author;
//
//    public function __construct(string $zagolovok, string $text, User $author) // myPoject\Models\Users\User если без use
//    {
//        $this->zagolovok = $zagolovok;
//        $this->text = $text;
//        $this->author = $author;
//    }
//
//    public function getZagolovok() : string
//    {
//        return $this->zagolovok;
//    }
//
//    public function getText() : string
//    {
//        return $this->text;
//    }
//
//    public function getAuthor() : User // \myPoject\Models\Users\ или use или это
//    {
//        return $this->author;
//    }
//}

namespace myProject\Models\Articles;
use MyProject\Models\Users\User;
use MyProject\Services\Db;
use MyProject\Models\ActiveRecordEntity;
class Article extends ActiveRecordEntity

{

    /** @var string */
    protected $name;

    /** @var string */
    protected $text;

    /** @var int */
    protected $authorId;

    /** @var string */
    protected $createdAt;


    public function getName(): string
    {
        return $this->name;
    }

    public function getauthorId(): int
    {
        return $this->authorId;
    }


    public function getText(): string
    {
        return $this->text;
    }


    protected static function getTableName(): string
    {
        return 'irk.articles';
    }
    public function setName(string $name)
    {
        $this->name = $name;
    }
    public function setText(string $text)
    {
        $this->text = $text;
    }
    public function setAuthor(User $author): void
    {
    $this->authorId = $author->getId();

    }
}
