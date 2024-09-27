<?php
// Устанавливаем заголовок страницы
$title = "Home";

// Начинаем буферизацию вывода для основного контента страницы
ob_start();
?>

<h1>Welcome to the Home Page</h1>
<p>This is the home page content. You can navigate using the links on the left.</p>

<?php
// Получаем содержимое буфера и очищаем его
$content = ob_get_clean();

// Подключаем общий макет страницы
require_once __DIR__ . '/layouts/layout.php';