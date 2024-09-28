<?php
// Подключаем файл с роутами
$routes = require __DIR__ . '/../routes/web.php';

// Цвета для терминала
define('GREEN', "\033[42m\033[30m"); // Зеленый фон с черным текстом
define('RED', "\033[41m\033[30m");   // Красный фон с черным текстом
define('RESET', "\033[0m");           // Сброс кода цвета

// Функция для проверки соответствия маршрута
function assertRoute($url, $expectedControllerAction, $routes, $message = "") {
    if (isset($routes[$url]) && $routes[$url] === $expectedControllerAction) {
        echo GREEN . "PASS:" . RESET . " " . $message . "\n";
    } else {
        $actual = $routes[$url] ?? 'undefined';
        echo RED . "FAIL: $message. Expected '$expectedControllerAction', got '$actual'" . RESET . "\n";
    }
}

// Тесты для роутов
function testHomeRoute($routes) {
    assertRoute('/', 'HomeController@index', $routes, "Home route should map to HomeController@index");
}

function testUsersRoute($routes) {
    assertRoute('/users', 'UsersController@index', $routes, "Users route should map to UsersController@index");
}

function testUndefinedRoute($routes) {
    if (!isset($routes['/undefined'])) {
        echo GREEN . "PASS:" . RESET . " " ."Undefined route should not exist" . "\n";
    } else {
        echo RED . "FAIL: Undefined route exists" . RESET . "\n";
    }
}

// Запуск тестов
testHomeRoute($routes);
testUsersRoute($routes);
testUndefinedRoute($routes);