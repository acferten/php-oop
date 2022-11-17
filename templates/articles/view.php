<?php include __DIR__ . '/../header.php'; ?>
    <h1><?= $article->getName() ?></h1>
    <p><?= $article->getText() ?></p>
    <p>Автор: <?= $article->getAuthor()->getNickname() ?></p>
<?php if ($user != null): ?>
    <?php if ($user->getRole() == 'admin'): ?>
        <a href="/articles/<?= $article->getId() ?>/edit">Редактировать</a>
    <?php endif ?>
<?php endif ?>
<?php include __DIR__ . '/../articles/comments.php'; ?>
<?php include __DIR__ . '/../footer.php'; ?>