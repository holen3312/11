<?php
return [
    '~^hello/(.*)$~' => [\MyProject\Controlers\MainController::class, 'sayHello'],
    '~^$~' => [\MyProject\Controlers\MainController::class, 'main'],
    '~^articles/(\d+)$~' => [\MyProject\Controlers\ArticlesController::class, 'view'],
    '~^bye/(.*)$~' => [\MyProject\Controlers\MainController::class, 'sayBye'],
    '~^articles/(\d+)/edit$~' => [\MyProject\Controlers\ArticlesController::class, 'edit'],
    '~^articles/add$~' => [\MyProject\Controlers\ArticlesController::class, 'add'],
    '~^users/register$~' => [\MyProject\Controlers\UsersController::class, 'signUp'],
    '~^users/(\d+)/activate/(.+)$~' => [\MyProject\Controlers\UsersController::class, 'activate'],
    '~^users/login$~' => [\MyProject\Controlers\UsersController::class, 'login'],
    '~^users/exit$~' =>[\MyProject\Controlers\UsersController::class, 'exit']
];
