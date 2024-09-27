<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?? 'My App'; ?></title>
    <style>
        body {
            font-family: Papyrus, sans-serif;
            margin: 0;
            padding: 0;
        }
        .container {
            display: flex;
        }
        .content {
            flex-grow: 1;
            padding: 20px;
        }
        header {
            background-color: #5F9EA0;
            color: white;
            padding: 10px;
            text-align: center;
        }
        footer {
            background-color: #f4f4f4;
            padding: 10px;
            text-align: center;
        }
    </style>
</head>
<body>

<header>
    <h1>My Application</h1>
</header>

<div class="container">
    <!-- Навигационное меню -->
    <?php require_once __DIR__ . '/navigation.php'; ?>

    <!-- Основной контент -->
    <div class="content">
        <?= $content ?? 'Welcome!'; ?>
    </div>
</div>

<footer>
    <p>&copy; <?= date('Y'); ?> My Application</p>
</footer>

</body>
</html>