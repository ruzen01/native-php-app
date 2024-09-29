<?php
// Устанавливаем заголовок страницы
$title = "Home";

// Начинаем буферизацию вывода для основного контента страницы
ob_start();
?>

<h1>Welcome to the Home Page</h1>
<p>This web application is written in native PHP without any libraries or frameworks. The goal of the project is to study the basics of PHP and understand the reasons behind the development of various libraries and frameworks.</p>

<?php
// Получаем содержимое буфера и очищаем его
$content = ob_get_clean();

// Подключаем общий макет страницы
require_once __DIR__ . '/layouts/layout.php';