<?php
// Устанавливаем заголовок страницы
$title = "Users";

// Начинаем буферизацию вывода для основного контента страницы
ob_start();
?>

<h1>User List</h1>
<table border="1" cellpadding="10" cellspacing="0">
    <thead>
        <tr>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Birthdate</th>
            <th>City</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($users as $user): ?>
            <tr>
                <td><?= htmlspecialchars($user['first_name']); ?></td>
                <td><?= htmlspecialchars($user['last_name']); ?></td>
                <td><?= htmlspecialchars($user['birthdate']); ?></td>
                <td><?= htmlspecialchars($user['city']); ?></td>
            </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?php
// Получаем содержимое буфера и очищаем его
$content = ob_get_clean();

// Подключаем общий макет страницы
require_once __DIR__ . '/layouts/layout.php';