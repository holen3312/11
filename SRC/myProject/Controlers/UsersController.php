<?php

namespace MyProject\Controlers;


use MyProject\View\View;
use MyProject\Models\Users\User;
use MyProject\Exceptions\InvalidArgumentException;
use MyProject\Models\Users\UserActivationService;
use MyProject\Services\EmailSender;
use MyProject\Models\Users\UsersAuthService;

class UsersController extends AbstractController
{
//  private $view;

//  public function __construct() {
//      $this->view = new View(__DIR__ . '/../../../templates');
//  }
    public function signUp()
    {
        if (!empty($_POST)) {
            try {
                $user = User::signUp($_POST);
            } catch (InvalidArgumentException $e) {
                $this->view->renderHtml('users/signUp.php', ['error' => $e->getMessage()]);
                return;
            }
            if ($user instanceof User) {
                $code = UserActivationService::createActivationCode($user);

                EmailSender::send($user, 'Активация', 'userActivation.php', [
                    'userId' => $user->getId(),
                    'code' => $code
                ]);
                $this->view->renderHtml('users/signUpSuccessful.php');
                return;
            }
        }

        $this->view->renderHtml('users/signUp.php');
    }

    public function activate(int $userId)
    {
//        $user = User::getById($userId);
//        $isCodeValid = UserActivationService::checkActivationCode($user, $activationCode);
        try {
            $user = User:: getById($userId);
            $user->activate($userId);
            echo 'OK!';


//            if ($isCodeValid) {
//            $user->activate();

            UserActivationService::deleteActivationCode($user);
        } catch (InvalidArgumentException $e) {
            $this->view->renderHtml('erors/activation' , ['error' => $e->getMessage()]); // error v shablone
            return;
        }
    }

    public function login()
    {
        if (!empty($_POST)) {
            try {
                $user = User::login($_POST);
                UsersAuthService::createToken($user);
                header('Location: /'); // куда попадем после регистрации
                exit();
            } catch (InvalidArgumentException $e) {
                $this->view->renderHtml('users/login.php', ['error' => $e->getMessage()]);
                return;
            }
        }

        $this->view->renderHtml('users/login.php');
    }

    public function exit()
    {
        if(empty($_COOKIE['token'])) {
            UsersAuthService::deletion();
        header('Location: /');
        exit();
        }

    }

}