<?php
namespace MyProject\Controlers;


use myProject\Models\Articles\Article;
use myProject\View\View;
use MyProject\Services\Db;
use myProject\Models\Users\User;

class ArticlesController extends AbstractController
{
//    private $view;
//    private $db;

//    public function __construct()
//    {
//        $this->user = UsersAuthService::getUserByToken();
//        $this->view = new View(__DIR__ . '/../../../templates');
//        $this->view->setVar('user', $this->user);
//    }



    public function view(int $articleId)
    {
        $article = Article::getById($articleId);// тут подключение к бд

        if ($article === null) {
            $this->view->renderHtml('errors/404.php', [], 404);
            return;
        }
        $user = User::getById($article->getauthorId());

        $this->view->renderHtml('article/view.php', ['article' => $article]);

    }
    public function edit(int $articleId): void
    {
        $article = Article::getById($articleId);

        if ($article === null) {
            $this->view->renderHtml('errors/404.php', [], 404);
            return;
        }
        $article->setName('Новое название статьи');
        $article->setText('новый текст статьи');

        $article->save();
    }
    public function add(): void
    {
        $author = User::getById(1);

        $article = new Article();
        $article->setAuthor($author);
        $article->setName('Новое название статьи');
        $article->setText('Новый текст статьи');

        $article->save();

    var_dump($article);
    }

}