<?php
// Устанавливаем заголовок страницы
$title = "Users";

// Начинаем буферизацию вывода для основного контента страницы
ob_start();
?>

<h1>User List</h1>
<ul>
    <?php foreach ($users as $user): ?>
        <li><?= htmlspecialchars($user['first_name']) . ' ' . htmlspecialchars($user['last_name']) . ' ' . htmlspecialchars($user['birthdate']) . ' ' . htmlspecialchars($user['city']); ?></li>
    <?php endforeach; ?>
</ul>

<?php
// Получаем содержимое буфера и очищаем его
$content = ob_get_clean();

// Подключаем общий макет страницы
require_once __DIR__ . '/layouts/layout.php';