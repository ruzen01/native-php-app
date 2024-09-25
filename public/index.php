<?php

require_once __DIR__ . '/../config/config.php';

// Простая функция для роутинга
function routeRequest($routes)
{
    $requestUri = $_SERVER['REQUEST_URI'];

    if (array_key_exists($requestUri, $routes)) {
        list($controller, $method) = explode('@', $routes[$requestUri]);
        require_once __DIR__ . "/../app/Controllers/$controller.php";
        $controllerInstance = new $controller();
        return $controllerInstance->$method();
    } else {
        http_response_code(404);
        echo "404 Not Found";
    }
}

// Подключаем файл маршрутов
$routes = require_once __DIR__ . '/../routes/web.php';
routeRequest($routes);