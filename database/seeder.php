<?php

// Путь к базе данных SQLite
$databasePath = __DIR__ . '/../database/npadb.db';

try {
    // Подключение к базе данных SQLite
    $pdo = new PDO('sqlite:' . $databasePath);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // Создание таблицы 'users' (если она не существует)
    $createTableSql = "
    CREATE TABLE IF NOT EXISTS users (
        id INTEGER PRIMARY KEY AUTOINCREMENT,
        first_name TEXT NOT NULL,
        last_name TEXT NOT NULL,
        birthdate TEXT,
        city TEXT
    )";
    $pdo->exec($createTableSql);

    // Подготовка SQL-запроса для вставки данных
    $insertSql = "INSERT INTO users (first_name, last_name, birthdate, city) VALUES (:first_name, :last_name, :birthdate, :city)";
    $stmt = $pdo->prepare($insertSql);

    // Массив с данными пользователей
    $users = [
        ['John', 'Doe', '1990-01-01', 'New York'],
        ['Jane', 'Smith', '1992-02-02', 'Los Angeles'],
        ['Bob', 'Johnson', '1985-03-03', 'Chicago'],
        ['Alice', 'Williams', '1988-04-04', 'Houston'],
        ['Michael', 'Brown', '1995-05-05', 'Phoenix'],
        ['Linda', 'Jones', '1991-06-06', 'Philadelphia'],
        ['David', 'Garcia', '1983-07-07', 'San Antonio'],
        ['Sarah', 'Martinez', '1994-08-08', 'San Diego'],
        ['Robert', 'Rodriguez', '1989-09-09', 'Dallas'],
        ['Mary', 'Hernandez', '1993-10-10', 'San Jose'],
        ['James', 'Lopez', '1987-11-11', 'Austin'],
        ['Patricia', 'Gonzalez', '1996-12-12', 'Jacksonville'],
        ['Christopher', 'Wilson', '1990-01-13', 'Fort Worth'],
        ['Barbara', 'Anderson', '1992-02-14', 'Columbus'],
        ['Thomas', 'Thomas', '1985-03-15', 'Charlotte'],
        ['Jessica', 'Taylor', '1988-04-16', 'San Francisco'],
        ['Charles', 'Moore', '1995-05-17', 'Indianapolis'],
        ['Karen', 'Jackson', '1991-06-18', 'Seattle'],
        ['Daniel', 'Martin', '1983-07-19', 'Denver'],
        ['Nancy', 'Lee', '1994-08-20', 'Washington'],
    ];

    // Вставка данных в таблицу
    foreach ($users as $user) {
        $stmt->execute([
            ':first_name' => $user[0],
            ':last_name' => $user[1],
            ':birthdate' => $user[2],
            ':city' => $user[3],
        ]);
    }

    echo "Сидер успешно выполнен. Добавлено 20 пользователей.\n";

} catch (PDOException $e) {
    echo "Ошибка при работе с базой данных: " . $e->getMessage() . "\n";
}
