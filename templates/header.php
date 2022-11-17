<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Мой блог</title>
    <link rel="stylesheet" href="/styles.css">
</head>
<body>

<table class="layout">
    <tr>
        <td colspan="2" class="header">
            <a href="http://localhost">Мой блог</a>
        </td>
    </tr>
    <tr>
        <td colspan="2" style="text-align: right">
            <?php if (!empty($user)): ?>
                <span><?= 'Привет, ' . $user->getNickname() ?></span>
                <a href="http://localhost/users/logout"> | Выйти</a>
                <?php if ($user->getRole() == 'admin'): ?>
                    <a href="http://localhost/adminpage">| Админка</a>
                <?php endif; ?>
            <?php else: ?>
                <a href="http://localhost/users/login">Войти | </a>
                <a href="http://localhost/users/register">Зарегистрироваться</a>
            <?php endif; ?>
        </td>
    </tr>
    <tr>
        <td>