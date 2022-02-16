<?php

namespace myProject\Controlers;
use MyProject\Services\Db;
use MyProject\View\View;
use myProject\Models\Articles\Article;
use MyProject\Models\Users\UsersAuthService;

class MainController extends AbstractController
{


    /** @var Db */
    private $db;

//    public function __construct()
//    {
//        $this->user = UsersAuthService::getUserByToken();
//        $this->view = new View(__DIR__ . '/../../../templates');
//        $this->view->setVar('user', $this->user);
//    }

    public function main() {
        $articles = Article::findAll();
        $this->view->renderHtml('main/main.php', [
            'articles' => $articles,
        ]);
    }

    public function sayBye(string $name) {
        echo 'пока, ' .  $name;
    }

    public function sayHello(string $name) {
        $title = 'Страница приветствия';
        $this->view->renderHtml('main/hello.php', ['name' => $name, 'title' => $title] );
    }
}

