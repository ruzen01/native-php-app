<?php

// Простая функция для роутинга
function routeRequest($routes, $pdo) 
{
    $requestUri = $_SERVER['REQUEST_URI'];

    if (array_key_exists($requestUri, $routes)) {
        list($controller, $method) = explode('@', $routes[$requestUri]);
        require_once __DIR__ . "/../app/Controllers/$controller.php";

        // Передаем $pdo в конструктор контроллера
        $controllerInstance = new $controller($pdo);
        return $controllerInstance->$method();
    } else {
        http_response_code(404);
        echo "404 Not Found";
    }
}

// Подключаем файл маршрутов
$routes = require_once __DIR__ . '/../routes/web.php';

// Подключение к базе данных SQLite
$databasePath = __DIR__ . '/../database/npadb.db';

try {
    $pdo = new PDO('sqlite:' . $databasePath);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    throw new PDOException($e->getMessage(), (int)$e->getCode());
}

// Вызываем роутер, передавая в него маршруты и объект PDO
routeRequest($routes, $pdo);