<?php include __DIR__ . '/../header.php'; ?>
    <h3><a href="http://localhost:80/articles/add">Добавить новую статью</a></h3>
<hr>
<?php foreach ($articles as $article): ?>
    <h2><a href="/articles/<?= $article->getId() ?>"><?= $article->getName() ?></a></h2>
    <p><?= $article->getShortText() ?></p>
    <a href="http://localhost:80/articles/<?= $article->getId()?>/edit">Редактировать</a>
    <hr>
<?php endforeach; ?>
<?php include __DIR__ . '/../footer.php'; ?>