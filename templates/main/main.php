<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <?php if ($context['title']):?>
    <title><?=$context['title']?></title>
    <?php else: ?>
    <title>Мой блог</title>
    <?php endif ?>
    <link rel="stylesheet" href="/styles.css">
</head>
<body>

<table class="layout">
    <tr>
        <td colspan="2" class="header">
            Мой блог
        </td>
    </tr>
    <tr>
        <td>
            <?$i=0?>
            <?php foreach ($context['articles'] as $article): ?>
                <h2><?= $article['name'] ?></h2>
                <p><?= $article['text'] ?></p>
                <?$i++?>
                <hr>
            <?php endforeach; ?>
        </td>

        <td width="300px" class="sidebar">
            <div class="sidebarHeader">Меню</div>
            <ul>
                <li><a href="/">Главная страница</a></li>
                <li><a href="/about-me">Обо мне</a></li>
            </ul>
        </td>
    </tr>
    <tr>
        <td class="footer" colspan="2">Все права защищены (c) Мой блог</td>
    </tr>
</table>

</body>
</html>