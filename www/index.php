<?php


//spl_autoload_register(function (string $className) // просто контроллер
//{
//    require_once __DIR__ . '/../SRC/' . $className . '.php';
//});
//
//$controller = new myProject\Controlers\MainController();
////$controller->main();
//
//if (!empty($_GET['name'])) {
//    $controller->sayHello($_GET['name']);
//} else {
//    $controller->main();
//}


//spl_autoload_register(function (string $className) // контроллер без routes
//{
//    require_once __DIR__ . '/../SRC/' . $className . '.php';
//});
//
//$route = $_GET['route'] ?? '';
//$pattern = '~^hello/(.*)$~';
//preg_match($pattern, $route, $matches);
//
//
//if (!empty($matches)) {
//    $controller = new myProject\Controlers\mainController();
//    $controller->sayHello($matches[1]);
//    return;
//}
//
//$pattern = '~^$~';
//preg_match($pattern, $route, $matches);
//
//if (!empty($matches)) {
//    $controller = new myProject\Controlers\mainController();
//    $controller->main();
//    return;
//}
//echo 'страница не найдена';


try {
    spl_autoload_register(function (string $className) // контроллер
    {

        require_once __DIR__ . '/../SRC/' . $className . '.php';
    });

    $route = $_GET['route'] ?? '';
    $routes = require __DIR__ . '/../SRC/routes.php';


    $isRouteFound = false;
    foreach ($routes as $pattern => $controllerAndAction) {
        preg_match($pattern, $route, $matches);
        if (!empty($matches)) {
            $isRouteFound = true;
            break;
        }
    }

    if (!$isRouteFound) {
        echo 'страница не найдена';
    }

    unset($matches[0]);

//var_dump($controllerAndAction);
//var_dump($matches);

    $controllerName = $controllerAndAction[0];
    $actionName = $controllerAndAction[1];

    $controller = new $controllerName();
    $controller->$actionName(...$matches);
} catch (\MyProject\Exception\DbException $e) {
    $view = new \MyProject\View\View(__DIR__ . '/../templates/erors');
    $view->renderHtml('500.php', ['error'=> $e->getMessage()], 500);
}


////require_once __DIR__ . '/db.php';
//$s = new MyProject\Services\Db();
