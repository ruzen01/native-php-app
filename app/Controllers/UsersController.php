<?php

class UsersController
{
    private $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function index()
    {
        // Получаем всех пользователей из базы данных
        $stmt = $this->pdo->query("SELECT * FROM users");
        $users = $stmt->fetchAll();

        // Подключаем вьюшку и передаем в нее данные
        $this->render('users', ['users' => $users]);
    }

    // Функция для подключения вьюшек
    private function render($view, $data = [])
    {
        extract($data); // Извлекаем переменные из массива данных
        require_once __DIR__ . "/../Views/$view.php"; // Подключаем файл вьюшки
    }
}
