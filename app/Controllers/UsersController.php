<?php

class UsersController
{
    private $pdo;

    // Конструктор принимает объект PDO
    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function index()
    {
        // Получаем всех пользователей из базы данных
        $stmt = $this->pdo->query("SELECT * FROM users");
        $users = $stmt->fetchAll();

        // Выводим пользователей (или передаем в представление)
        foreach ($users as $user) {
            echo $user['first_name'] . " " . $user['last_name'] . "<br>";
        }
    }
}